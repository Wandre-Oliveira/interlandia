INTERLANDIA LTDA - SaaS Profissional PHP + MySQL + JWT

DOMINIO:
https://interladia.infinityfreeapp.com

LOGIN PADRAO:
admin / admin123
conferente / admin123
motorista / admin123

INSTALACAO NA INFINITYFREE:
1) Entre no painel InfinityFree.
2) Abra MySQL Databases e crie/identifique o banco do dominio.
3) Abra phpMyAdmin e importe database/database.sql.
4) No GitHub, cadastre os secrets do repositorio:
   FTP_SERVER = servidor FTP da InfinityFree, normalmente ftpupload.net
   FTP_USERNAME = usuario FTP, normalmente algo como if0_12345678
   FTP_PASSWORD = senha FTP
   FTP_SERVER_DIR = /htdocs/
   DB_HOST = host MySQL informado pela InfinityFree
   DB_NAME = nome do banco MySQL
   DB_USER = usuario MySQL
   DB_PASS = senha MySQL
   JWT_SECRET = frase grande, secreta e aleatoria
5) Envie o projeto para a branch main do GitHub.
6) O GitHub Actions publicara automaticamente via FTP.

GITHUB:
Repositorio conectado:
https://github.com/Wandre-Oliveira/interlandia.git

CONFIGURACAO LOCAL:
1) Copie config/local.example.php para config/local.php.
2) Ajuste banco, usuario, senha e JWT_SECRET.
3) Importe database/database.sql no MySQL local.

OBSERVACAO DE SEGURANCA:
Em producao, troque as senhas dos usuarios padrao depois do primeiro login.
