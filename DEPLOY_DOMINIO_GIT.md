# Deploy dominio + GitHub

## Status conferido

- Dominio configurado: https://interlandia.infinityfreeapp.com
- Repositorio GitHub: https://github.com/Wandre-Oliveira/interlandia
- Deploy automatico: `.github/workflows/deploy-hostinger.yml`

## Secrets obrigatorios no GitHub

Cadastre em `Settings > Secrets and variables > Actions > New repository secret`:

- `FTP_SERVER`
- `FTP_USERNAME`
- `FTP_PASSWORD`
- `FTP_SERVER_DIR`
- `DB_HOST`
- `DB_NAME`
- `DB_USER`
- `DB_PASS`
- `JWT_SECRET`

Para InfinityFree, normalmente:

- `FTP_SERVER`: `ftpupload.net`
- `FTP_SERVER_DIR`: `/htdocs/`

## Como publicar

Depois de instalar o Git no computador:

```powershell
cd C:\Users\wandr\Downloads\interlandia-main\interlandia-main
git init
git branch -M main
git remote add origin https://github.com/Wandre-Oliveira/interlandia.git
git add .
git commit -m "Atualiza sistema Interlandia"
git push -u origin main
```

Se o remote ja existir:

```powershell
git remote set-url origin https://github.com/Wandre-Oliveira/interlandia.git
git add .
git commit -m "Atualiza sistema Interlandia"
git push
```

Ao fazer push na branch `main`, o GitHub Actions envia os arquivos para o dominio por FTP.

## Banco de dados

Antes do primeiro deploy em producao:

1. Crie o banco MySQL no painel da hospedagem.
2. Importe `database/database.sql` pelo phpMyAdmin.
3. Preencha os secrets `DB_*` com os dados do banco.

