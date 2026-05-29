<?php
require_once __DIR__.'/jwt.php';
header('Content-Type: application/json; charset=utf-8');
$method=$_SERVER['REQUEST_METHOD'];
$action=$_GET['action'] ?? '';
$body=json_decode(file_get_contents('php://input'), true) ?: $_POST;
function ok($data=[]){ echo json_encode($data, JSON_UNESCAPED_UNICODE); exit; }
function fail($msg,$code=400){ http_response_code($code); echo json_encode(['erro'=>$msg], JSON_UNESCAPED_UNICODE); exit; }
try{
 if($action==='login'){
   $u=trim($body['username']??''); $p=$body['password']??'';
   $st=db()->prepare('SELECT * FROM usuarios WHERE username=? AND ativo=1 LIMIT 1'); $st->execute([$u]); $user=$st->fetch();
   if(!$user || !password_verify($p,$user['password_hash'])) fail('Usuário ou senha inválidos',401);
   $payload=['uid'=>$user['id'],'tenant_id'=>$user['tenant_id'],'nome'=>$user['nome'],'role'=>$user['role'],'exp'=>time()+60*60*12];
   ok(['token'=>jwt_encode($payload),'user'=>$payload]);
 }
 $user=require_user(); $tenant=$user['tenant_id'];
 if($action==='me') ok(['user'=>$user]);
 if($action==='dashboard'){
   $q=db()->prepare("SELECT status, COUNT(*) qtd, COALESCE(SUM(qtde),0) paletes, COALESCE(SUM(valor_total),0) valor FROM cargas WHERE tenant_id=? GROUP BY status"); $q->execute([$tenant]);
   $porStatus=$q->fetchAll();
   $q=db()->prepare("SELECT cliente_nome, COALESCE(SUM(qtde),0) paletes, COUNT(*) cargas FROM cargas WHERE tenant_id=? GROUP BY cliente_nome ORDER BY paletes DESC"); $q->execute([$tenant]);
   $porCliente=$q->fetchAll();
   ok(['status'=>$porStatus,'clientes'=>$porCliente]);
 }
 if($action==='listas'){
   $out=[]; foreach(['clientes','transportadoras','representantes','usuarios'] as $t){ $st=db()->prepare("SELECT * FROM $t WHERE tenant_id=? ORDER BY id DESC"); $st->execute([$tenant]); $out[$t]=$st->fetchAll(); }
   ok($out);
 }
 if($action==='cargas'){
   if($method==='GET'){
     $st=db()->prepare('SELECT * FROM cargas WHERE tenant_id=? ORDER BY id DESC'); $st->execute([$tenant]); ok(['cargas'=>$st->fetchAll()]);
   }
   $motorista=trim($body['motorista']??'');
   if(!$motorista) fail('Motorista obrigatório');
   $st=db()->prepare("SELECT id,nota_fiscal FROM cargas WHERE tenant_id=? AND motorista=? AND status='ABERTO' LIMIT 1"); $st->execute([$tenant,$motorista]);
   if($st->fetch()) fail('Este motorista já possui carga em ABERTO. Finalize o retorno antes de criar outra carga.');
   $sql='INSERT INTO cargas(tenant_id,nota_fiscal,sap,cliente_nome,cnpj,uf,endereco,motorista,placa,transportadora_nome,representante_nome,tipo,qtde,marcar_c,valor_unitario,valor_total,status,data_carga,observacoes) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
   $qt=(int)($body['qtde']??0); $vu=(float)($body['valor_unitario']??0); $marcar=(int)($body['marcar_c']??0);
   db()->prepare($sql)->execute([$tenant,$body['nota_fiscal']??'', $body['sap']??'', $body['cliente_nome']??'', $body['cnpj']??'', strtoupper($body['uf']??''), $body['endereco']??'', $motorista, strtoupper($body['placa']??''), $body['transportadora_nome']??'', $body['representante_nome']??'', $body['tipo']??'paletizada', $qt, $marcar, $vu, $qt*$vu, 'ABERTO', date('Y-m-d'), $body['observacoes']??'']);
   ok(['sucesso'=>true,'id'=>db()->lastInsertId()]);
 }
 if($action==='retorno'){
   $id=(int)($body['id']??0); $status=$body['status']??'CONCLUÍDO';
   if(!in_array($status,['CONCLUÍDO','VALE PALLETE','EM COLETA','ABERTO'])) fail('Status inválido');
   db()->prepare('UPDATE cargas SET status=?, data_retorno=?, motivo_vale=? WHERE id=? AND tenant_id=?')->execute([$status,date('Y-m-d'),$body['motivo_vale']??'', $id,$tenant]);
   ok(['sucesso'=>true]);
 }
 if($action==='coleta'){
   $id=(int)($body['id']??0); $tipo=$body['tipo']??'saida';
   if($tipo==='saida') db()->prepare("UPDATE cargas SET status='EM COLETA', data_saida_coleta=? WHERE id=? AND tenant_id=?")->execute([date('Y-m-d'),$id,$tenant]);
   else db()->prepare("UPDATE cargas SET status='CONCLUÍDO', data_retorno_coleta=?, motivo_nao_coletado=? WHERE id=? AND tenant_id=?")->execute([date('Y-m-d'),$body['motivo']??'',$id,$tenant]);
   ok(['sucesso'=>true]);
 }
 if(in_array($action,['clientes','transportadoras','representantes','usuarios'])){
   require_master($user);
   if($method==='POST'){
     if($action==='usuarios'){
       $role=$body['role']??'conferente'; if(!in_array($role,['master','motorista','conferente'])) fail('Cargo inválido');
       db()->prepare('INSERT INTO usuarios(tenant_id,nome,username,password_hash,role,ativo) VALUES(?,?,?,?,?,1)')->execute([$tenant,$body['nome'],$body['username'],password_hash($body['password']??'123456', PASSWORD_DEFAULT),$role]); ok(['sucesso'=>true]);
     }
     $map=['clientes'=>['razao','cnpj','telefone','endereco','cidade','uf'],'transportadoras'=>['nome','cnpj','telefone','contato'],'representantes'=>['nome','telefone','email','regiao']];
     $cols=$map[$action]; $vals=array_map(fn($c)=>$body[$c]??'', $cols);
     $sql='INSERT INTO '.$action.'(tenant_id,'.implode(',',$cols).') VALUES(?'.str_repeat(',?',count($cols)).')'; db()->prepare($sql)->execute(array_merge([$tenant],$vals)); ok(['sucesso'=>true]);
   }
 }
 if($action==='importar'){
   // Recebe linhas vindas do SheetJS no navegador.
   $linhas=$body['linhas']??[]; $n=0;
   foreach($linhas as $r){
     if(empty($r['nota_fiscal']) || empty($r['motorista'])) continue;
     $qt=(int)($r['qtde']??0); $vu=(float)($r['valor_unitario']??0);
     db()->prepare('INSERT INTO cargas(tenant_id,nota_fiscal,sap,cliente_nome,cnpj,uf,motorista,placa,transportadora_nome,tipo,qtde,marcar_c,valor_unitario,valor_total,status,data_carga) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)')
       ->execute([$tenant,$r['nota_fiscal'],$r['sap']??'',$r['cliente_nome']??'',$r['cnpj']??'',strtoupper($r['uf']??''),$r['motorista'],strtoupper($r['placa']??''),$r['transportadora_nome']??'','paletizada',$qt,(int)($r['marcar_c']??0),$vu,$qt*$vu,'ABERTO',date('Y-m-d')]); $n++;
   }
   ok(['sucesso'=>true,'importados'=>$n]);
 }
 fail('Ação não encontrada',404);
}catch(Throwable $e){ fail($e->getMessage(),500); }
