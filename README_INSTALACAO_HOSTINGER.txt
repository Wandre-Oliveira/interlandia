INTERLANDIA LTDA - SaaS Profissional PHP + MySQL + JWT

LOGIN PADRAO:
admin / admin123
conferente / admin123
motorista / admin123

INSTALACAO NA HOSTINGER:
1) Entre no hPanel > Banco de Dados MySQL.
2) Crie banco, usuario e senha.
3) Abra phpMyAdmin e importe database/database.sql.
4) No GitHub, cadastre os secrets do repositorio:
   FTP_SERVER = servidor FTP da Hostinger
   FTP_USERNAME = usuario FTP
   FTP_PASSWORD = senha FTP
   FTP_SERVER_DIR = /public_html/ ou /public_html/interlandia/
   DB_HOST = host MySQL informado pela Hostinger
   DB_NAME = nome do banco
   DB_USER = usuario do banco
   DB_PASS = senha do banco
   JWT_SECRET = frase grande, secreta e aleatoria
5) Envie o projeto para a branch main do GitHub.
6) O GitHub Actions publicara automaticamente via FTP.

DOMINIO:
- Se o dominio usa nameservers da Hostinger, aponte o dominio para a hospedagem no hPanel.
- Se o DNS fica em outro provedor, crie/ajuste:
  A     @    IP da hospedagem Hostinger
  CNAME www  seu-dominio.com
- Aguarde a propagacao DNS e acesse https://seu-dominio.com.

CONFIGURACAO LOCAL:
1) Copie config/local.example.php para config/local.php.
2) Ajuste banco, usuario, senha e JWT_SECRET.
3) Importe database/database.sql no MySQL local.

OBSERVACAO DE SEGURANCA:
Em producao, troque as senhas dos usuarios padrao depois do primeiro login.
