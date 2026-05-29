<?php
// Configuracao segura para ambiente local e producao.
// Ordem de carregamento:
// 1) config/production.php gerado pelo GitHub Actions no deploy.
// 2) config/local.php criado manualmente no servidor/desenvolvimento.
// 3) Variaveis de ambiente.
foreach ([__DIR__.'/production.php', __DIR__.'/local.php'] as $override) {
  if (is_file($override)) {
    require_once $override;
  }
}

function env_or_default($name, $default = '') {
  $value = getenv($name);
  return $value === false ? $default : $value;
}

defined('DB_HOST') || define('DB_HOST', env_or_default('DB_HOST', 'localhost'));
defined('DB_NAME') || define('DB_NAME', env_or_default('DB_NAME', 'interlandia_saas'));
defined('DB_USER') || define('DB_USER', env_or_default('DB_USER', 'root'));
defined('DB_PASS') || define('DB_PASS', env_or_default('DB_PASS', ''));
defined('JWT_SECRET') || define('JWT_SECRET', env_or_default('JWT_SECRET', 'TROQUE_ESTA_CHAVE_SECRETA_INTERLANDIA_2026'));
define('APP_NAME', 'interlandia_saas_profissional');
define('APP_VERSION', 'SaaS 1.0');

header('X-Content-Type-Options: nosniff');

function db(){
  static $pdo=null;
  if($pdo===null){
    $dsn='mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8mb4';
    $pdo=new PDO($dsn, DB_USER, DB_PASS, [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC]);
  }
  return $pdo;
}
