<?php
require_once __DIR__.'/../config/config.php';
function b64url($data){ return rtrim(strtr(base64_encode($data), '+/', '-_'), '='); }
function jwt_encode($payload){
  $header=['typ'=>'JWT','alg'=>'HS256'];
  $p=b64url(json_encode($header)).'.'.b64url(json_encode($payload));
  return $p.'.'.b64url(hash_hmac('sha256',$p,JWT_SECRET,true));
}
function jwt_decode_token($jwt){
  $parts=explode('.',$jwt); if(count($parts)!==3) return null;
  [$h,$p,$s]=$parts; $valid=b64url(hash_hmac('sha256',$h.'.'.$p,JWT_SECRET,true));
  if(!hash_equals($valid,$s)) return null;
  $payload=json_decode(base64_decode(strtr($p,'-_','+/')), true);
  if(!$payload || ($payload['exp']??0)<time()) return null;
  return $payload;
}
function current_user(){
  $hdr=$_SERVER['HTTP_AUTHORIZATION'] ?? '';
  if(preg_match('/Bearer\s+(.*)$/i',$hdr,$m)) return jwt_decode_token($m[1]);
  return null;
}
function require_user(){ $u=current_user(); if(!$u){ http_response_code(401); echo json_encode(['erro'=>'Token inválido ou expirado']); exit; } return $u; }
function require_master($u){ if(($u['role']??'')!=='master'){ http_response_code(403); echo json_encode(['erro'=>'Acesso restrito ao Master']); exit; } }
