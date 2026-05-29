<?php
require_once __DIR__.'/../config/config.php';

header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store');

function respond($data, $code = 200) {
  http_response_code($code);
  echo json_encode($data, JSON_UNESCAPED_UNICODE);
  exit;
}

function ensure_sync_table() {
  db()->exec("
    CREATE TABLE IF NOT EXISTS app_sync_state (
      id TINYINT UNSIGNED NOT NULL PRIMARY KEY,
      dados LONGTEXT NOT NULL,
      atualizado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
  ");
}

try {
  ensure_sync_table();
  $acao = $_GET['acao'] ?? '';

  if ($acao === 'carregar') {
    $st = db()->query('SELECT dados FROM app_sync_state WHERE id = 1 LIMIT 1');
    $row = $st->fetch();
    respond(['ok' => true, 'dados' => $row ? json_decode($row['dados'], true) : null]);
  }

  if ($acao === 'salvar') {
    $body = json_decode(file_get_contents('php://input'), true);
    if (!is_array($body) || !array_key_exists('dados', $body)) {
      respond(['ok' => false, 'erro' => 'Payload invalido'], 400);
    }

    $json = json_encode($body['dados'], JSON_UNESCAPED_UNICODE);
    db()->prepare('
      INSERT INTO app_sync_state (id, dados) VALUES (1, ?)
      ON DUPLICATE KEY UPDATE dados = VALUES(dados)
    ')->execute([$json]);

    respond(['ok' => true]);
  }

  respond(['ok' => false, 'erro' => 'Acao nao encontrada'], 404);
} catch (Throwable $e) {
  respond(['ok' => false, 'erro' => $e->getMessage()], 500);
}
