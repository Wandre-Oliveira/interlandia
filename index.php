<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>INTERLANDIA LTDA | Controle de Cargas e Vale Palete</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        body { 
            font-family: 'Inter', sans-serif; 
            background: linear-gradient(135deg, #0a1628 0%, #1a2a4a 100%); 
            min-height: 100vh; 
            color: #e0e0e0;
        }

        /* Login Screen */
        .login-screen { 
            position: fixed; 
            top: 0; 
            left: 0; 
            width: 100%; 
            height: 100%; 
            background: linear-gradient(135deg, #0a1628 0%, #1a2a4a 100%); 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            z-index: 2000; 
        }
        .login-card { 
            background: #1e2a3a; 
            border-radius: 24px; 
            padding: 40px; 
            width: 450px; 
            max-width: 90%; 
            box-shadow: 0 20px 60px rgba(0,0,0,0.5); 
            border: 1px solid rgba(218,165,32,0.3); 
        }
        .login-logo { text-align: center; margin-bottom: 32px; }
        .logo-placeholder { 
            width: 100px; 
            height: 100px; 
            background: linear-gradient(135deg, #daa520, #b8860b); 
            border-radius: 50%; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            margin: 0 auto 15px; 
        }
        .logo-placeholder i { font-size: 50px; color: #0a1628; }
        .login-logo h2 { color: #daa520; margin-top: 12px; }
        .input-group { margin-bottom: 20px; }
        .input-group label { display: block; margin-bottom: 8px; font-weight: 500; color: #c0cbd8; font-size: 14px; }
        .input-group input { 
            width: 100%; 
            padding: 12px 16px; 
            border: 1px solid #2a3a4a; 
            border-radius: 10px; 
            font-size: 15px; 
            background: #0f1a24; 
            color: #e0e0e0; 
        }
        .input-group input:focus { outline: none; border-color: #daa520; }
        .btn-login { 
            width: 100%; 
            padding: 14px; 
            background: linear-gradient(135deg, #daa520, #b8860b); 
            color: #0a1628; 
            border: none; 
            border-radius: 10px; 
            font-size: 16px; 
            font-weight: 600; 
            cursor: pointer; 
            margin-top: 8px; 
        }
        .btn-login:hover { transform: translateY(-2px); }
        .credenciais-info { margin-top: 24px; padding: 16px; background: #0f1a24; border-radius: 10px; font-size: 12px; }
        .error-msg { color: #ef476f; text-align: center; margin-top: 16px; }

        /* Main App */
        .app-container { display: none; }
        .main-wrapper { max-width: 1600px; margin: 20px auto; padding: 0 20px; }
        
        /* Header */
        .app-header { 
            background: #1e2a3a; 
            border-radius: 16px; 
            padding: 15px 25px; 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
            margin-bottom: 20px; 
            flex-wrap: wrap; 
            gap: 15px; 
            border: 1px solid rgba(218,165,32,0.2); 
        }
        .logo-area { display: flex; align-items: center; gap: 15px; }
        .logo-area .logo-placeholder { 
            width: 45px; 
            height: 45px; 
            background: linear-gradient(135deg, #daa520, #b8860b); 
            border-radius: 50%; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
        }
        .logo-area .logo-placeholder i { font-size: 22px; color: #0a1628; }
        .logo-area h1 { font-size: 20px; color: #daa520; }
        .user-area { display: flex; align-items: center; gap: 15px; }
        .user-avatar { 
            width: 40px; 
            height: 40px; 
            background: linear-gradient(135deg, #daa520, #b8860b); 
            border-radius: 50%; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            color: #0a1628; 
            font-weight: 600; 
        }
        .btn-logout { 
            background: #2a3a4a; 
            border: none; 
            padding: 6px 14px; 
            border-radius: 8px; 
            cursor: pointer; 
            color: #e0e0e0; 
        }
        .btn-logout:hover { background: #ef476f; color: white; }

        /* Admin Bar */
        .admin-bar { 
            background: #0f1a24; 
            border-radius: 12px; 
            padding: 12px 20px; 
            display: flex; 
            gap: 12px; 
            flex-wrap: wrap; 
            margin-bottom: 20px; 
            border: 1px solid #2a3a4a;
        }
        .btn-admin { 
            background: #daa520; 
            color: #0a1628; 
            border: none; 
            padding: 8px 18px; 
            border-radius: 8px; 
            cursor: pointer; 
            font-weight: 500;
            font-size: 13px;
            transition: 0.3s;
        }
        .btn-admin:hover { background: #b8860b; transform: translateY(-1px); }

        /* Action Buttons */
        .action-buttons { 
            display: grid; 
            grid-template-columns: repeat(auto-fit, minmax(160px, 1fr)); 
            gap: 12px; 
            margin-bottom: 20px; 
        }
        .btn-action { 
            padding: 12px 15px; 
            border: none; 
            border-radius: 10px; 
            font-weight: 600; 
            cursor: pointer; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            gap: 8px; 
            font-size: 12px; 
            transition: 0.3s; 
        }
        .btn-action-primary { background: #daa520; color: #0a1628; }
        .btn-action-success { background: #28a745; color: white; }
        .btn-action-warning { background: #ffc107; color: #0a1628; }
        .btn-action-secondary { background: #6c757d; color: white; }
        .btn-action-purple { background: #8b5cf6; color: white; }
        .btn-action-info { background: #17a2b8; color: white; }
        .btn-action:hover { transform: translateY(-2px); box-shadow: 0 5px 15px rgba(0,0,0,0.3); }

        /* Busca Rápida */
        .busca-rapida { 
            background: #1e2a3a; 
            border-radius: 12px; 
            padding: 15px 20px; 
            margin-bottom: 20px; 
            border: 1px solid rgba(218,165,32,0.2);
        }
        .busca-grid { 
            display: grid; 
            grid-template-columns: 1fr auto; 
            gap: 12px; 
            align-items: center; 
        }
        .busca-grid input { 
            padding: 12px; 
            border: 1px solid #2a3a4a; 
            border-radius: 8px; 
            background: #0f1a24; 
            color: #e0e0e0; 
            font-size: 14px;
        }
        .btn-buscar { 
            background: #daa520; 
            color: #0a1628; 
            border: none; 
            padding: 12px 24px; 
            border-radius: 8px; 
            cursor: pointer; 
            font-weight: 600;
        }

        /* Dashboard Cards - HORIZONTAL */
        .dashboard-horizontal { 
            display: flex;
            flex-wrap: wrap;
            gap: 16px;
            margin-bottom: 20px;
            overflow-x: auto;
            padding-bottom: 8px;
        }
        .stat-card {
            background: #1e2a3a;
            border-radius: 16px;
            padding: 20px;
            min-width: 200px;
            flex: 1;
            border: 1px solid rgba(218,165,32,0.2);
            transition: 0.3s;
        }
        .stat-card:hover { transform: translateY(-3px); border-color: #daa520; }
        .stat-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px; }
        .stat-header i { font-size: 28px; color: #daa520; }
        .stat-title { font-size: 12px; color: #8a9dc0; text-transform: uppercase; letter-spacing: 1px; }
        .stat-value { font-size: 32px; font-weight: 700; margin-top: 5px; color: #e0e0e0; }
        .stat-detalhe { font-size: 11px; margin-top: 8px; color: #8a9dc0; }
        .stat-cliente-item { 
            display: flex; 
            justify-content: space-between; 
            align-items: center;
            padding: 6px 0;
            border-bottom: 1px solid #2a3a4a;
            font-size: 12px;
        }
        .stat-cliente-nome { font-weight: 600; color: #daa520; }
        .stat-cliente-valor { font-weight: 600; }
        .stat-palete-dist { 
            display: flex; 
            gap: 8px; 
            flex-wrap: wrap;
            margin-top: 8px;
            font-size: 11px;
        }
        .stat-palete-item { 
            background: #0f1a24; 
            padding: 3px 8px; 
            border-radius: 12px; 
        }
        .card-destaque { background: linear-gradient(135deg, #1e2a3a, #2a3a4a); border-left: 3px solid #daa520; }

        /* Filtros */
        .filtros-container { 
            background: #1e2a3a; 
            border-radius: 12px; 
            padding: 15px 20px; 
            margin-bottom: 20px; 
            border: 1px solid rgba(218,165,32,0.2);
        }
        .filtros-grid { 
            display: grid; 
            grid-template-columns: repeat(auto-fit, minmax(160px, 1fr)); 
            gap: 12px; 
            margin-bottom: 15px;
        }
        .filtros-grid select, .filtros-grid input { 
            padding: 10px; 
            border: 1px solid #2a3a4a; 
            border-radius: 8px; 
            background: #0f1a24; 
            color: #e0e0e0; 
            font-size: 13px;
        }
        .filtros-botoes {
            display: flex;
            gap: 12px;
            justify-content: flex-end;
        }
        .btn-filtrar { 
            background: #daa520; 
            color: #0a1628; 
            border: none; 
            padding: 10px 24px; 
            border-radius: 8px; 
            cursor: pointer; 
            font-weight: 600;
        }
        .btn-limpar { 
            background: #6c757d; 
            color: white; 
            border: none; 
            padding: 10px 24px; 
            border-radius: 8px; 
            cursor: pointer; 
            font-weight: 600;
        }

        /* Tabela */
        .table-container { 
            background: #1e2a3a; 
            border-radius: 12px; 
            overflow-x: auto; 
            max-height: 450px; 
            overflow-y: auto; 
        }
        table { 
            width: 100%; 
            border-collapse: collapse; 
            font-size: 11px; 
            min-width: 1400px; 
        }
        th { 
            background: #0f1a24; 
            padding: 12px 8px; 
            text-align: left; 
            font-weight: 600; 
            color: #daa520; 
            position: sticky; 
            top: 0; 
        }
        td { padding: 10px 8px; border-bottom: 1px solid #2a3a4a; color: #c0cbd8; }
        tr:hover { background: #2a3a4a; cursor: pointer; }

        /* Badges */
        .badge { display: inline-block; padding: 3px 8px; border-radius: 20px; font-size: 10px; font-weight: 600; }
        .badge-aberto { background: #ffc107; color: #0a1628; }
        .badge-vale { background: #8b5cf6; color: white; }
        .badge-concluido { background: #28a745; color: white; }
        .badge-em-coleta { background: #17a2b8; color: white; }
        .badge-batida { background: #dc3545; color: white; }

        /* Modais */
        .modal { 
            display: none; 
            position: fixed; 
            top: 0; 
            left: 0; 
            width: 100%; 
            height: 100%; 
            background: rgba(0,0,0,0.7); 
            z-index: 1500; 
            justify-content: center; 
            align-items: center; 
        }
        .modal-content { 
            background: #1e2a3a; 
            border-radius: 16px; 
            width: 650px; 
            max-width: 90%; 
            max-height: 85%; 
            overflow-y: auto; 
            border: 1px solid rgba(218,165,32,0.3);
        }
        .modal-header { 
            padding: 15px 20px; 
            border-bottom: 1px solid #2a3a4a; 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
        }
        .modal-header h2 { font-size: 16px; color: #daa520; }
        .modal-close { cursor: pointer; font-size: 22px; color: #8a9dc0; }
        .modal-body { padding: 20px; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: 600; font-size: 12px; }
        .form-group input, .form-group select, .form-group textarea { 
            width: 100%; 
            padding: 10px; 
            border: 1px solid #2a3a4a; 
            border-radius: 8px; 
            background: #0f1a24; 
            color: #e0e0e0; 
        }
        .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; }
        .required:after { content: " *"; color: #dc3545; }

        .quantidade-container { display: flex; align-items: center; gap: 10px; }

        .qtde-celula { display:flex; flex-direction:column; align-items:center; justify-content:center; line-height:1.05; min-width:42px; }
        .qtde-numero { font-weight:800; color:#e0e0e0; font-size:13px; }
        .qtde-c { margin-top:4px; width:20px; height:20px; border-radius:999px; display:inline-flex; align-items:center; justify-content:center; background:linear-gradient(135deg,#daa520,#b8860b); color:#0a1628; font-size:12px; font-weight:900; box-shadow:0 0 14px rgba(218,165,32,.35); }
        .qtde-sem-c { color:#8a9dc0; font-size:10px; opacity:.25; height:20px; margin-top:4px; }
        .indicador-c { 
            background: #daa520; 
            color: #0a1628; 
            border-radius: 50%; 
            width: 28px; 
            height: 28px; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            font-weight: bold; 
        }

        .opcoes-retorno { display: grid; grid-template-columns: repeat(auto-fit, minmax(160px, 1fr)); gap: 15px; margin: 20px 0; }
        .opcao-retorno { 
            padding: 20px; 
            border: 2px solid #2a3a4a; 
            border-radius: 12px; 
            cursor: pointer; 
            text-align: center; 
            transition: 0.3s; 
        }
        .opcao-retorno:hover { border-color: #daa520; background: #2a3a4a; }
        .opcao-retorno.selected { border-color: #28a745; background: #1a3a2a; }
        .opcao-retorno i { font-size: 32px; margin-bottom: 10px; display: block; }

        .toast { 
            position: fixed; 
            bottom: 20px; 
            right: 20px; 
            background: #1e2a3a; 
            color: white; 
            padding: 12px 24px; 
            border-radius: 8px; 
            z-index: 2000; 
            animation: slideInRight 0.3s ease; 
            border: 1px solid #daa520; 
        }
        @keyframes slideInRight { from { transform: translateX(100%); opacity: 0; } to { transform: translateX(0); opacity: 1; } }

        .btn-acao { padding: 4px 8px; border-radius: 4px; cursor: pointer; font-size: 10px; margin: 2px; border: none; }
        .btn-retorno { background: #28a745; color: white; }
        .btn-saida-coleta { background: #8b5cf6; color: white; }
        .btn-retorno-coleta { background: #ffc107; color: #0a1628; }
        .btn-editar { background: #daa520; color: #0a1628; }
        .btn-detalhes { background: #17a2b8; color: white; }




        .company-logo {
            width: 100%;
            height: 100%;
            object-fit: contain;
            border-radius: 50%;
            display: block;
        }
        .login-logo .logo-placeholder {
            background: transparent !important;
            box-shadow: 0 12px 35px rgba(87,255,0,.18);
        }
        .logo-area .logo-placeholder {
            background: transparent !important;
            box-shadow: 0 8px 22px rgba(87,255,0,.13);
            overflow: hidden;
        }
        .clientes-horizontal {
            grid-column: 1 / -1;
        }
        .clientes-horizontal .clientes-row {
            display: flex;
            gap: 12px;
            overflow-x: auto;
            padding: 6px 2px 10px;
            scroll-snap-type: x mandatory;
        }
        .cliente-palete-card {
            min-width: 220px;
            background: #0f1a24;
            border: 1px solid #2a3a4a;
            border-radius: 14px;
            padding: 12px;
            scroll-snap-align: start;
        }
        .cliente-palete-card:hover { border-color: #daa520; }
        .cliente-palete-card .stat-cliente-item {
            border-bottom: 0;
            padding: 0 0 8px;
            display: block;
        }
        .cliente-palete-card .stat-cliente-nome {
            display: block;
            font-size: 12px;
            margin-bottom: 5px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .cliente-palete-card .stat-cliente-valor {
            display: block;
            font-size: 22px;
            color: #e0e0e0;
        }
        .cliente-palete-card .stat-palete-dist { justify-content: space-between; }

        /* ===== MELHORIAS VISUAIS E DE USABILIDADE ===== */
        body::before {
            content: "";
            position: fixed;
            inset: 0;
            pointer-events: none;
            background:
                radial-gradient(circle at 15% 10%, rgba(218,165,32,.10), transparent 28%),
                radial-gradient(circle at 85% 0%, rgba(139,92,246,.13), transparent 32%),
                radial-gradient(circle at 55% 100%, rgba(23,162,184,.08), transparent 38%);
            z-index: -1;
        }
        .main-wrapper { max-width: 1760px; }
        .app-header, .admin-bar, .busca-rapida, .filtros-container, .table-container, .stat-card, .modal-content, .login-card {
            box-shadow: 0 18px 50px rgba(0,0,0,.22);
            backdrop-filter: blur(10px);
        }
        .app-header { position: sticky; top: 12px; z-index: 800; }
        .logo-area h1::after { content: "Controle de Cargas • Vale Palete"; display:block; color:#8a9dc0; font-size:11px; font-weight:500; margin-top:2px; }
        .admin-bar { align-items:center; }
        .admin-bar::before { content:"Administração"; color:#8a9dc0; font-size:12px; font-weight:700; text-transform:uppercase; letter-spacing:.12em; margin-right:6px; }
        .action-buttons { grid-template-columns: repeat(auto-fit, minmax(190px, 1fr)); }
        .btn-action, .btn-admin, .btn-login, .btn-buscar, .btn-filtrar, .btn-limpar, .btn-acao { transition: transform .18s ease, box-shadow .18s ease, filter .18s ease; }
        .btn-action:active, .btn-admin:active, .btn-login:active, .btn-buscar:active, .btn-filtrar:active, .btn-limpar:active { transform: scale(.98); }
        input, select, textarea { transition: border-color .18s ease, box-shadow .18s ease; }
        input:focus, select:focus, textarea:focus { outline: none; border-color: #daa520 !important; box-shadow: 0 0 0 3px rgba(218,165,32,.13); }
        .dashboard-horizontal { display:grid; grid-template-columns: repeat(auto-fit, minmax(215px, 1fr)); overflow:visible; }
        .stat-card { min-width: 0; }
        .table-container { border: 1px solid rgba(218,165,32,.16); }
        table { font-size: 12px; }
        th { z-index: 2; }
        tbody tr:nth-child(even) { background: rgba(15,26,36,.35); }
        .badge { white-space:nowrap; }
        .modal { padding: 18px; }
        .modal-content { animation: modalIn .18s ease-out; }
        @keyframes modalIn { from { transform: translateY(18px) scale(.98); opacity:0; } to { transform: translateY(0) scale(1); opacity:1; } }
        .loading { text-align:center; padding:28px !important; color:#8a9dc0; }
        .registro-card { padding:10px; border:1px solid #2a3a4a; border-radius:10px; margin-bottom:8px; cursor:pointer; background:#0f1a24; }
        .registro-card:hover { border-color:#daa520; background:#162232; }
        .toolbar-extra { display:flex; gap:10px; flex-wrap:wrap; margin-top:12px; }
        .btn-mini { background:#0f1a24; color:#c0cbd8; border:1px solid #2a3a4a; border-radius:8px; padding:8px 12px; cursor:pointer; font-weight:600; }
        .btn-mini:hover { border-color:#daa520; color:#daa520; }
        .danger-text { color:#ef476f; font-size:12px; margin-top:5px; }

        /* ===== NOVA IDENTIDADE VISUAL RESPONSIVA ===== */
        :root {
            --bg-page: #0b1117;
            --bg-surface: rgba(18, 26, 34, .94);
            --bg-surface-2: rgba(24, 35, 44, .96);
            --bg-field: #0e171d;
            --line-soft: rgba(148, 163, 184, .18);
            --line-strong: rgba(218, 165, 32, .36);
            --text-main: #f2f6f8;
            --text-soft: #a9b7c2;
            --gold: #d7a72d;
            --gold-2: #f2c94c;
            --green: #22c55e;
            --cyan: #38bdf8;
            --red: #ef4444;
            --shadow-panel: 0 18px 45px rgba(0, 0, 0, .28);
        }

        body {
            background:
                linear-gradient(145deg, rgba(11,17,23,1) 0%, rgba(16,24,28,1) 46%, rgba(24,27,22,1) 100%);
            color: var(--text-main);
            letter-spacing: 0;
        }
        body::before {
            background:
                linear-gradient(180deg, rgba(215,167,45,.08), transparent 34%),
                linear-gradient(90deg, rgba(34,197,94,.05), transparent 42%),
                linear-gradient(270deg, rgba(56,189,248,.06), transparent 48%);
        }
        .main-wrapper {
            width: min(100%, 1780px);
            margin: 0 auto;
            padding: 18px;
        }
        .login-screen {
            background:
                linear-gradient(145deg, rgba(11,17,23,.98), rgba(24,27,22,.98));
            padding: 18px;
        }
        .login-card,
        .app-header,
        .admin-bar,
        .busca-rapida,
        .filtros-container,
        .table-container,
        .stat-card,
        .modal-content {
            background: var(--bg-surface);
            border: 1px solid var(--line-soft);
            border-radius: 10px;
            box-shadow: var(--shadow-panel);
        }
        .login-card {
            width: min(430px, calc(100vw - 28px));
            max-width: calc(100vw - 28px);
            padding: 30px;
        }
        .login-logo h2,
        .logo-area h1,
        .modal-header h2,
        th {
            color: var(--gold-2);
        }
        .login-logo p,
        .stat-detalhe,
        .input-group label,
        .form-group label {
            color: var(--text-soft);
        }
        .app-header {
            top: 10px;
            padding: 14px 18px;
            align-items: center;
        }
        .logo-area h1 {
            font-size: 19px;
            line-height: 1.15;
        }
        .logo-area h1::after {
            color: var(--text-soft);
            letter-spacing: 0;
        }
        .user-area {
            flex-wrap: wrap;
            justify-content: flex-end;
        }
        .user-badge {
            display: flex;
            align-items: center;
            gap: 10px;
            background: rgba(255,255,255,.04);
            border: 1px solid var(--line-soft);
            border-radius: 8px;
            padding: 7px 10px;
        }
        .user-info h4 {
            font-size: 13px;
            line-height: 1.15;
            color: var(--text-main);
        }
        .user-info span {
            color: var(--text-soft);
            font-size: 11px;
        }
        #mysqlStatus {
            background: rgba(250, 204, 21, .1);
            border: 1px solid rgba(250, 204, 21, .22);
            border-radius: 8px;
            padding: 7px 10px;
        }
        .admin-bar,
        .action-buttons,
        .busca-rapida,
        .dashboard-horizontal,
        .filtros-container {
            margin-bottom: 14px;
        }
        .admin-bar {
            padding: 10px;
        }
        .admin-bar::before {
            color: var(--gold-2);
            letter-spacing: .08em;
        }
        .action-buttons {
            grid-template-columns: repeat(auto-fit, minmax(210px, 1fr));
            gap: 10px;
        }
        .btn-action,
        .btn-admin,
        .btn-login,
        .btn-buscar,
        .btn-filtrar,
        .btn-limpar,
        .btn-acao,
        .btn-mini,
        .btn-logout {
            border-radius: 8px;
            min-height: 38px;
            box-shadow: none;
            letter-spacing: 0;
        }
        .btn-action {
            justify-content: flex-start;
            padding: 12px 14px;
            font-size: 12px;
            border: 1px solid rgba(255,255,255,.08);
        }
        .btn-action i,
        .btn-admin i {
            width: 18px;
            text-align: center;
        }
        .btn-action-primary,
        .btn-login,
        .btn-buscar,
        .btn-filtrar,
        .btn-admin {
            background: linear-gradient(135deg, var(--gold-2), var(--gold));
            color: #10151a;
        }
        .btn-action-warning { background: #f59e0b; color: #10151a; }
        .btn-action-purple { background: #6d5dfc; color: #fff; }
        .btn-action-info { background: #0891b2; color: #fff; }
        .btn-action-secondary,
        .btn-limpar,
        .btn-logout {
            background: #24313b;
            color: var(--text-main);
        }
        .btn-action:hover,
        .btn-admin:hover,
        .btn-login:hover,
        .btn-buscar:hover,
        .btn-filtrar:hover,
        .btn-limpar:hover,
        .btn-mini:hover,
        .btn-logout:hover {
            transform: translateY(-1px);
            filter: brightness(1.06);
            box-shadow: 0 10px 26px rgba(0,0,0,.22);
        }
        .busca-grid {
            grid-template-columns: minmax(0, 1fr) auto;
        }
        input,
        select,
        textarea,
        .busca-grid input,
        .filtros-grid select,
        .filtros-grid input,
        .form-group input,
        .form-group select,
        .form-group textarea,
        .input-group input {
            background: var(--bg-field);
            border: 1px solid var(--line-soft);
            border-radius: 8px;
            color: var(--text-main);
        }
        input::placeholder,
        textarea::placeholder {
            color: #6f7e89;
        }
        input:focus,
        select:focus,
        textarea:focus {
            border-color: var(--gold-2) !important;
            box-shadow: 0 0 0 3px rgba(215, 167, 45, .16);
        }
        .dashboard-horizontal {
            grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
            gap: 12px;
        }
        .stat-card {
            padding: 16px;
            border-left: 3px solid transparent;
        }
        .stat-card:hover {
            transform: translateY(-2px);
            border-color: var(--line-strong);
        }
        .card-destaque {
            background: linear-gradient(135deg, rgba(30,42,58,.96), rgba(31,44,35,.96));
            border-left-color: var(--gold-2);
        }
        .stat-header {
            margin-bottom: 10px;
        }
        .stat-header i {
            color: var(--gold-2);
            font-size: 22px;
        }
        .stat-title {
            color: var(--text-soft);
            font-size: 11px;
            letter-spacing: .08em;
            line-height: 1.35;
        }
        .stat-value {
            font-size: 30px;
            line-height: 1;
        }
        .stat-palete-item,
        .btn-mini,
        .cliente-palete-card {
            background: rgba(255,255,255,.04);
            border: 1px solid var(--line-soft);
        }
        .cliente-palete-card {
            min-width: 235px;
            border-radius: 8px;
        }
        .cliente-palete-card:hover {
            border-color: var(--gold-2);
        }
        .filtros-container {
            padding: 14px;
        }
        .filtros-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 12px;
        }
        .filtros-header h3 {
            color: var(--gold-2);
            font-size: 14px;
            font-weight: 800;
            letter-spacing: 0;
        }
        .filtros-header span {
            color: var(--text-soft);
            font-size: 12px;
        }
        .filtros-grid {
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            align-items: end;
            gap: 10px;
        }
        .filtro-field {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }
        .filtro-field label {
            color: var(--text-soft);
            font-size: 11px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: .08em;
        }
        .table-container {
            max-height: 520px;
            border-radius: 10px;
        }
        table {
            min-width: 1500px;
            font-size: 12px;
        }
        th {
            background: #121b22;
            padding: 12px 10px;
            border-bottom: 1px solid var(--line-soft);
        }
        td {
            padding: 10px;
            border-bottom: 1px solid rgba(148,163,184,.12);
        }
        tbody tr:nth-child(even) {
            background: rgba(255,255,255,.025);
        }
        tr:hover {
            background: rgba(215,167,45,.08);
        }
        .badge {
            border-radius: 999px;
            padding: 4px 9px;
            font-size: 10px;
        }
        .badge-aberto { background: rgba(245,158,11,.18); color: #fbbf24; }
        .badge-vale { background: rgba(109,93,252,.18); color: #c4b5fd; }
        .badge-concluido { background: rgba(34,197,94,.16); color: #86efac; }
        .badge-em-coleta { background: rgba(56,189,248,.16); color: #7dd3fc; }
        .badge-batida { background: rgba(239,68,68,.18); color: #fca5a5; }
        .modal {
            align-items: flex-start;
            overflow-y: auto;
        }
        .modal-content {
            width: min(720px, 100%);
            max-width: 100%;
            max-height: none;
            margin: 24px auto;
        }
        .modal-header {
            background: rgba(255,255,255,.025);
            padding: 14px 18px;
        }
        .modal-body {
            padding: 18px;
        }
        .modal-close {
            width: 34px;
            height: 34px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
        }
        .modal-close:hover {
            background: rgba(239,68,68,.14);
            color: #fca5a5;
        }
        .opcao-retorno {
            border: 1px solid var(--line-soft);
            border-radius: 8px;
            background: rgba(255,255,255,.035);
        }
        .opcao-retorno.selected {
            border-color: var(--green);
            background: rgba(34,197,94,.14);
        }
        .toast {
            border-radius: 8px;
            border-color: var(--line-strong);
            box-shadow: var(--shadow-panel);
        }

        @media (max-width: 1024px) {
            .main-wrapper { padding: 14px; }
            .app-header { align-items: flex-start; }
            .user-area { width: 100%; justify-content: flex-start; }
            .dashboard-horizontal { grid-template-columns: repeat(auto-fit, minmax(210px, 1fr)); }
            .table-container { max-height: 62vh; }
        }

        @media (max-width: 768px) {
            .main-wrapper { padding: 10px; }
            .app-header {
                position: static;
                flex-direction: column;
                align-items: stretch;
                gap: 12px;
            }
            .logo-area {
                justify-content: flex-start;
                text-align: left;
            }
            .user-area,
            .admin-bar,
            .filtros-botoes {
                justify-content: stretch;
            }
            .user-badge,
            #mysqlStatus,
            .btn-logout {
                width: 100%;
            }
            .admin-bar {
                display: grid !important;
                grid-template-columns: 1fr;
            }
            .admin-bar[style*="none"] {
                display: none !important;
            }
            .admin-bar::before {
                margin: 0 0 2px;
            }
            .action-buttons,
            .dashboard-horizontal,
            .filtros-grid,
            .form-row,
            .busca-grid {
                grid-template-columns: 1fr;
            }
            .btn-action {
                justify-content: center;
                min-height: 46px;
            }
            .filtros-botoes {
                display: grid;
                grid-template-columns: 1fr;
            }
            .filtros-header {
                align-items: flex-start;
                flex-direction: column;
            }
            .clientes-horizontal .clientes-row {
                display: grid;
                grid-template-columns: 1fr;
                overflow: visible;
            }
            .cliente-palete-card {
                min-width: 0;
            }
            .modal {
                padding: 10px;
            }
            .modal-content {
                margin: 8px auto;
            }
            .modal-body {
                padding: 14px;
            }
            .opcoes-retorno {
                grid-template-columns: 1fr;
            }
            .toast {
                left: 10px;
                right: 10px;
                bottom: 10px;
                text-align: center;
            }
        }

        @media (max-width: 520px) {
            .login-screen { padding: 14px; overflow-x: hidden; }
            .login-card { width: 300px !important; max-width: calc(100vw - 56px) !important; padding: 22px; }
            .login-logo .logo-placeholder { width: 86px; height: 86px; }
            .logo-area .logo-placeholder { width: 42px; height: 42px; }
            .logo-area h1 { font-size: 17px; }
            .stat-card { padding: 14px; }
            .stat-value { font-size: 26px; }
            .table-container {
                border-radius: 8px;
                margin-left: -2px;
                margin-right: -2px;
            }
            th, td {
                padding: 9px 8px;
            }
        }

        /* ===== TEMA CLARO PROFISSIONAL ===== */
        :root {
            --page-bg: #f4f7fb;
            --panel: #ffffff;
            --panel-muted: #f8fafc;
            --panel-soft: #eef4f8;
            --border: #d8e1ea;
            --border-strong: #bfd0dd;
            --text: #152331;
            --muted: #617181;
            --brand: #c99322;
            --brand-strong: #9f7318;
            --blue: #2563eb;
            --green: #15803d;
            --cyan: #0e7490;
            --purple: #6d28d9;
            --amber: #d97706;
            --red: #dc2626;
            --shadow-soft: 0 10px 28px rgba(21, 35, 49, .08);
            --shadow-hover: 0 16px 36px rgba(21, 35, 49, .13);
        }

        html {
            background: var(--page-bg);
        }

        body {
            background:
                linear-gradient(180deg, #f9fbfd 0%, #f4f7fb 46%, #eef4f8 100%) !important;
            color: var(--text) !important;
        }

        body::before {
            display: none !important;
        }

        .main-wrapper {
            width: min(100%, 1840px);
            padding: 18px 22px 28px;
        }

        .login-screen {
            background:
                linear-gradient(180deg, rgba(255,255,255,.92), rgba(238,244,248,.95)),
                linear-gradient(135deg, #f9fbfd, #e9f0f6) !important;
        }

        .login-card,
        .app-header,
        .admin-bar,
        .busca-rapida,
        .filtros-container,
        .table-container,
        .stat-card,
        .modal-content {
            background: var(--panel) !important;
            border: 1px solid var(--border) !important;
            box-shadow: var(--shadow-soft) !important;
            color: var(--text) !important;
        }

        .login-card {
            border-top: 4px solid var(--brand) !important;
        }

        .login-logo h2,
        .logo-area h1,
        .modal-header h2,
        .filtros-header h3,
        th {
            color: var(--text) !important;
        }

        .login-logo p,
        .credenciais-info,
        .stat-detalhe,
        .input-group label,
        .form-group label,
        .filtros-header span,
        .user-info span {
            color: var(--muted) !important;
        }

        .logo-placeholder,
        .login-logo .logo-placeholder,
        .logo-area .logo-placeholder {
            background: #ffffff !important;
            border: 1px solid var(--border) !important;
            box-shadow: 0 8px 20px rgba(21, 35, 49, .09) !important;
        }

        .company-logo {
            background: #ffffff;
        }

        .app-header {
            top: 12px;
            border-radius: 12px !important;
        }

        .logo-area h1::after {
            color: var(--muted) !important;
        }

        .user-badge,
        #mysqlStatus,
        .credenciais-info,
        .stat-palete-item,
        .cliente-palete-card,
        .btn-mini,
        [style*="background:#0f1a24"],
        [style*="background:#1e2a3a"],
        [style*="background:#1a3a2a"],
        [style*="background:#2a1a1a"] {
            background: var(--panel-muted) !important;
            border: 1px solid var(--border) !important;
            color: var(--text) !important;
        }

        #mysqlStatus {
            color: var(--green) !important;
            background: #ecfdf3 !important;
            border-color: #b7e4c7 !important;
        }

        .user-avatar {
            background: linear-gradient(135deg, var(--brand), #f1c85b) !important;
            color: #1f2933 !important;
        }

        .admin-bar {
            align-items: center;
            border-left: 4px solid var(--brand) !important;
        }

        .admin-bar::before {
            color: var(--brand-strong) !important;
        }

        .action-buttons {
            gap: 12px;
        }

        .btn-action,
        .btn-admin,
        .btn-login,
        .btn-buscar,
        .btn-filtrar,
        .btn-limpar,
        .btn-acao,
        .btn-mini,
        .btn-logout {
            border-radius: 8px !important;
            box-shadow: none !important;
            font-weight: 800 !important;
        }

        .btn-login,
        .btn-action-primary,
        .btn-admin,
        .btn-buscar,
        .btn-filtrar {
            background: linear-gradient(135deg, #f4c95d, var(--brand)) !important;
            color: #17202a !important;
            border: 1px solid #d5a23b !important;
        }

        .btn-action-warning {
            background: #fff7ed !important;
            color: #9a3412 !important;
            border: 1px solid #fed7aa !important;
        }

        .btn-action-purple {
            background: #f5f3ff !important;
            color: var(--purple) !important;
            border: 1px solid #ddd6fe !important;
        }

        .btn-action-info {
            background: #ecfeff !important;
            color: var(--cyan) !important;
            border: 1px solid #a5f3fc !important;
        }

        .btn-action-success {
            background: #ecfdf3 !important;
            color: var(--green) !important;
            border: 1px solid #bbf7d0 !important;
        }

        .btn-action-secondary,
        .btn-limpar,
        .btn-logout {
            background: #f1f5f9 !important;
            color: #334155 !important;
            border: 1px solid var(--border) !important;
        }

        .btn-action:hover,
        .btn-admin:hover,
        .btn-login:hover,
        .btn-buscar:hover,
        .btn-filtrar:hover,
        .btn-limpar:hover,
        .btn-mini:hover,
        .btn-logout:hover,
        .stat-card:hover,
        .cliente-palete-card:hover {
            transform: translateY(-1px);
            box-shadow: var(--shadow-hover) !important;
            filter: none !important;
        }

        .busca-rapida,
        .filtros-container {
            padding: 16px !important;
        }

        input,
        select,
        textarea,
        .busca-grid input,
        .filtros-grid select,
        .filtros-grid input,
        .form-group input,
        .form-group select,
        .form-group textarea,
        .input-group input {
            background: #ffffff !important;
            color: var(--text) !important;
            border: 1px solid var(--border-strong) !important;
        }

        input::placeholder,
        textarea::placeholder {
            color: #8a98a8 !important;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: var(--brand) !important;
            box-shadow: 0 0 0 3px rgba(201, 147, 34, .16) !important;
        }

        .dashboard-horizontal {
            gap: 14px;
        }

        .stat-card {
            border-radius: 10px !important;
            border-left: 4px solid transparent !important;
        }

        .card-destaque {
            background: linear-gradient(180deg, #ffffff, #fffaf0) !important;
            border-left-color: var(--brand) !important;
        }

        .stat-header i {
            color: var(--brand) !important;
        }

        .stat-title {
            color: var(--muted) !important;
            letter-spacing: .05em !important;
        }

        .stat-value,
        .stat-cliente-valor,
        .qtde-numero {
            color: var(--text) !important;
        }

        .stat-cliente-nome {
            color: var(--brand-strong) !important;
        }

        .cliente-palete-card {
            border-radius: 8px !important;
        }

        .table-container {
            border-radius: 10px !important;
            max-height: 560px !important;
            overflow: auto;
        }

        table {
            background: #ffffff !important;
            color: var(--text) !important;
        }

        th {
            background: #edf3f8 !important;
            border-bottom: 1px solid var(--border-strong) !important;
        }

        td {
            color: #334155 !important;
            border-bottom: 1px solid #e5edf3 !important;
        }

        tbody tr:nth-child(even) {
            background: #f8fafc !important;
        }

        tr:hover {
            background: #fff8e6 !important;
        }

        .badge {
            border-radius: 999px !important;
            border: 1px solid transparent;
        }

        .badge-aberto { background: #fff7ed !important; color: #9a3412 !important; border-color: #fed7aa; }
        .badge-vale { background: #f5f3ff !important; color: #5b21b6 !important; border-color: #ddd6fe; }
        .badge-concluido { background: #ecfdf3 !important; color: #166534 !important; border-color: #bbf7d0; }
        .badge-em-coleta { background: #ecfeff !important; color: #155e75 !important; border-color: #a5f3fc; }
        .badge-batida { background: #fef2f2 !important; color: #991b1b !important; border-color: #fecaca; }
        .badge-baixado-pendente {
            background: #ecfdf3 !important;
            color: #166534 !important;
            border-color: #bbf7d0 !important;
            display: inline-flex !important;
            flex-direction: column;
            align-items: center;
            gap: 2px;
            line-height: 1.1;
        }
        .badge-baixado-pendente small {
            color: #9a3412;
            font-size: 10px;
            font-weight: 900;
        }

        .modal {
            background: rgba(15, 23, 42, .38) !important;
            backdrop-filter: blur(4px);
        }

        .modal-header {
            background: #f8fafc !important;
            border-bottom: 1px solid var(--border) !important;
        }

        .opcao-retorno {
            background: #ffffff !important;
            border: 1px solid var(--border) !important;
            color: var(--text) !important;
        }

        .opcao-retorno:hover,
        .opcao-retorno.selected {
            background: #ecfdf3 !important;
            border-color: #86efac !important;
        }

        .toast {
            background: #ffffff !important;
            color: var(--text) !important;
            border: 1px solid var(--border-strong) !important;
        }

        .qtde-c {
            background: linear-gradient(135deg, #f4c95d, var(--brand)) !important;
            color: #17202a !important;
        }

        .modal-close:hover,
        .btn-logout:hover {
            background: #fef2f2 !important;
            color: var(--red) !important;
            border-color: #fecaca !important;
        }

        .error-msg,
        .danger-text {
            color: var(--red) !important;
        }

        .agenda-panel {
            display: none;
            background: var(--panel) !important;
            border: 1px solid var(--border) !important;
            border-radius: 10px;
            box-shadow: var(--shadow-soft);
            margin-bottom: 14px;
            overflow: hidden;
        }

        .agenda-panel.active {
            display: block;
        }

        .agenda-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 16px;
            background: #f8fafc;
            border-bottom: 1px solid var(--border);
            flex-wrap: wrap;
        }

        .agenda-header h3 {
            color: var(--text);
            font-size: 16px;
            margin-bottom: 3px;
        }

        .agenda-header span {
            color: var(--muted);
            font-size: 12px;
        }

        .agenda-summary {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 10px;
            padding: 14px 16px 0;
        }

        .agenda-summary-card {
            background: var(--panel-muted);
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: 10px 12px;
        }

        .agenda-summary-card span,
        .agenda-summary-card small {
            display: block;
            color: var(--muted);
            font-weight: 800;
            text-transform: uppercase;
            font-size: 10px;
            letter-spacing: .05em;
        }

        .agenda-summary-card strong {
            display: block;
            color: var(--text);
            font-size: 22px;
            margin-top: 4px;
        }

        .agenda-table-wrap {
            padding: 16px;
            overflow-x: auto;
        }

        .agenda-table {
            min-width: 1200px;
        }

        .agenda-status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            border-radius: 999px;
            padding: 4px 9px;
            font-size: 10px;
            font-weight: 800;
            border: 1px solid var(--border);
        }

        .agenda-status.pendente {
            background: #fff7ed;
            color: #9a3412;
            border-color: #fed7aa;
        }

        .agenda-status.baixado {
            background: #ecfdf3;
            color: #166534;
            border-color: #bbf7d0;
        }

        .agenda-empty {
            padding: 22px;
            color: var(--muted);
            text-align: center;
            background: var(--panel-muted);
            border: 1px dashed var(--border);
            border-radius: 8px;
        }

        .agenda-board {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 12px;
            padding: 14px 16px 0;
        }

        .agenda-board-section {
            background: var(--panel-muted);
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: 12px;
        }

        .agenda-board-section h4 {
            color: var(--text);
            font-size: 13px;
            margin-bottom: 8px;
        }

        .agenda-board-list {
            display: grid;
            gap: 8px;
            max-height: 180px;
            overflow-y: auto;
        }

        .agenda-board-item {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: 8px;
            color: var(--muted);
            font-size: 12px;
        }

        .agenda-board-item strong {
            color: var(--text);
        }

        @media (max-width: 768px) {
            .main-wrapper {
                padding: 10px;
            }

            .app-header,
            .login-card,
            .admin-bar,
            .busca-rapida,
            .filtros-container,
            .table-container,
            .stat-card {
                border-radius: 8px !important;
            }

            .agenda-header {
                align-items: stretch;
                flex-direction: column;
            }
        }

        /* ===== TEMA PROFISSIONAL CLARO ===== */
        :root {
            --page-bg: #f3f6fa;
            --surface: #ffffff;
            --surface-soft: #f8fafc;
            --surface-muted: #eef2f7;
            --border: #d9e2ec;
            --border-strong: #c7d2df;
            --text: #17202a;
            --muted: #637083;
            --accent: #b88412;
            --accent-dark: #8a640c;
            --blue: #2563eb;
            --cyan: #0284c7;
            --green: #16803c;
            --red: #c2413a;
            --purple: #6d4fd8;
            --shadow-sm: 0 1px 2px rgba(15, 23, 42, .06);
            --shadow-md: 0 10px 28px rgba(15, 23, 42, .10);
            --shadow-lg: 0 24px 60px rgba(15, 23, 42, .16);
        }

        html {
            background: var(--page-bg);
        }

        body {
            background: var(--page-bg) !important;
            color: var(--text) !important;
        }

        body::before {
            display: none !important;
        }

        .login-screen {
            background:
                linear-gradient(180deg, rgba(243,246,250,.96), rgba(232,238,246,.96)),
                url("assets/logo_dragao.jpg") center/240px auto no-repeat !important;
        }

        .main-wrapper {
            max-width: 1780px !important;
            margin: 0 auto !important;
            padding: 18px !important;
        }

        .login-card,
        .app-header,
        .admin-bar,
        .busca-rapida,
        .filtros-container,
        .table-container,
        .stat-card,
        .modal-content,
        .agenda-panel,
        .agenda-board-section,
        .agenda-summary-card,
        .cliente-palete-card {
            background: var(--surface) !important;
            border: 1px solid var(--border) !important;
            color: var(--text) !important;
            box-shadow: var(--shadow-sm) !important;
            backdrop-filter: none !important;
        }

        .login-card,
        .modal-content {
            box-shadow: var(--shadow-lg) !important;
        }

        .app-header {
            border-radius: 10px !important;
            padding: 14px 18px !important;
            top: 10px !important;
            box-shadow: var(--shadow-md) !important;
        }

        .logo-area h1,
        .login-logo h2,
        .modal-header h2,
        .filtros-header h3,
        .agenda-header h3 {
            color: var(--text) !important;
            letter-spacing: 0 !important;
        }

        .logo-area h1::after {
            color: var(--muted) !important;
        }

        .user-badge {
            background: var(--surface-soft);
            border: 1px solid var(--border);
            border-radius: 999px;
            padding: 5px 10px 5px 5px;
        }

        .user-info h4,
        .stat-value,
        .cliente-palete-card .stat-cliente-valor,
        .qtde-numero,
        .agenda-summary-card strong,
        .agenda-board-item strong {
            color: var(--text) !important;
        }

        .user-info span,
        .input-group label,
        .form-group label,
        .stat-title,
        .stat-detalhe,
        .agenda-header span,
        .filtros-header span,
        .agenda-summary-card span,
        .agenda-summary-card small,
        .modal-close,
        .loading,
        .agenda-empty {
            color: var(--muted) !important;
        }

        .logo-placeholder,
        .user-avatar,
        .qtde-c {
            background: linear-gradient(135deg, #f6d365, var(--accent)) !important;
            color: #1f2937 !important;
            box-shadow: none !important;
        }

        .company-logo {
            background: #fff;
            border: 1px solid var(--border);
        }

        .admin-bar,
        .busca-rapida,
        .filtros-container,
        .agenda-panel {
            border-radius: 10px !important;
            margin-bottom: 16px !important;
        }

        .admin-bar {
            background: var(--surface-soft) !important;
            align-items: center !important;
        }

        .admin-bar::before {
            color: var(--muted) !important;
        }

        .action-buttons {
            grid-template-columns: repeat(auto-fit, minmax(190px, 1fr)) !important;
            gap: 10px !important;
            margin-bottom: 16px !important;
        }

        .btn-action,
        .btn-admin,
        .btn-login,
        .btn-buscar,
        .btn-filtrar,
        .btn-limpar,
        .btn-mini,
        .btn-logout,
        .btn-acao {
            border-radius: 8px !important;
            box-shadow: none !important;
            font-weight: 700 !important;
            letter-spacing: 0 !important;
        }

        .btn-action {
            min-height: 44px !important;
            padding: 10px 14px !important;
            border: 1px solid transparent !important;
        }

        .btn-action:hover,
        .btn-admin:hover,
        .btn-login:hover,
        .btn-buscar:hover,
        .btn-filtrar:hover,
        .btn-limpar:hover,
        .btn-mini:hover,
        .btn-acao:hover {
            transform: translateY(-1px) !important;
            filter: brightness(.98) !important;
            box-shadow: var(--shadow-sm) !important;
        }

        .btn-action-primary,
        .btn-admin,
        .btn-login,
        .btn-buscar,
        .btn-filtrar,
        .btn-editar {
            background: var(--accent) !important;
            color: #ffffff !important;
        }

        .btn-action-success,
        .btn-retorno {
            background: var(--green) !important;
            color: #ffffff !important;
        }

        .btn-action-warning,
        .btn-retorno-coleta {
            background: #f59e0b !important;
            color: #1f2937 !important;
        }

        .btn-action-purple,
        .btn-saida-coleta {
            background: var(--purple) !important;
            color: #ffffff !important;
        }

        .btn-action-info,
        .btn-detalhes {
            background: var(--cyan) !important;
            color: #ffffff !important;
        }

        .btn-action-secondary,
        .btn-limpar,
        .btn-logout,
        .btn-mini {
            background: var(--surface) !important;
            color: var(--text) !important;
            border: 1px solid var(--border-strong) !important;
        }

        input,
        select,
        textarea,
        .input-group input,
        .form-group input,
        .form-group select,
        .form-group textarea,
        .busca-grid input,
        .filtros-grid input,
        .filtros-grid select {
            background: var(--surface) !important;
            color: var(--text) !important;
            border: 1px solid var(--border-strong) !important;
            border-radius: 8px !important;
            box-shadow: none !important;
        }

        input::placeholder,
        textarea::placeholder {
            color: #94a3b8 !important;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: var(--accent) !important;
            box-shadow: 0 0 0 3px rgba(184,132,18,.14) !important;
            outline: none !important;
        }

        .dashboard-horizontal {
            display: grid !important;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)) !important;
            gap: 12px !important;
            overflow: visible !important;
            margin-bottom: 16px !important;
        }

        .stat-card {
            border-radius: 10px !important;
            padding: 16px !important;
            min-width: 0 !important;
            transition: border-color .16s ease, box-shadow .16s ease, transform .16s ease !important;
        }

        .stat-card:hover {
            border-color: var(--accent) !important;
            box-shadow: var(--shadow-md) !important;
            transform: translateY(-1px) !important;
        }

        .stat-header i {
            color: var(--accent) !important;
            font-size: 22px !important;
        }

        .stat-value {
            font-size: 28px !important;
        }

        .card-destaque {
            background: linear-gradient(180deg, #ffffff, #fff8e6) !important;
            border-left: 4px solid var(--accent) !important;
        }

        .stat-cliente-item {
            border-bottom: 1px solid var(--border) !important;
        }

        .stat-cliente-nome {
            color: var(--accent-dark) !important;
        }

        .stat-palete-item {
            background: var(--surface-muted) !important;
            color: var(--muted) !important;
            border-radius: 999px !important;
        }

        .cliente-palete-card {
            background: var(--surface-soft) !important;
            border-radius: 10px !important;
        }

        .filtros-header,
        .agenda-header {
            background: var(--surface-soft) !important;
            border-bottom: 1px solid var(--border) !important;
            border-radius: 10px 10px 0 0 !important;
        }

        .filtros-container {
            padding: 0 !important;
            overflow: hidden !important;
        }

        .filtros-grid,
        .filtros-botoes {
            padding-left: 16px !important;
            padding-right: 16px !important;
        }

        .filtros-grid {
            margin-top: 16px !important;
        }

        .filtros-botoes {
            padding-bottom: 16px !important;
        }

        .table-container {
            border-radius: 10px !important;
            overflow: auto !important;
            max-height: 62vh !important;
            box-shadow: var(--shadow-sm) !important;
        }

        table,
        .agenda-table {
            background: var(--surface) !important;
            color: var(--text) !important;
            font-size: 12px !important;
        }

        th {
            background: #f1f5f9 !important;
            color: #334155 !important;
            border-bottom: 1px solid var(--border-strong) !important;
            text-transform: uppercase !important;
            font-size: 10px !important;
            letter-spacing: .04em !important;
            z-index: 3 !important;
        }

        td {
            color: #334155 !important;
            border-bottom: 1px solid var(--border) !important;
            background: transparent !important;
        }

        tbody tr:nth-child(even) {
            background: #fafcff !important;
        }

        tr:hover {
            background: #eff6ff !important;
        }

        .badge {
            border-radius: 999px !important;
            padding: 4px 9px !important;
            font-size: 10px !important;
            white-space: nowrap !important;
        }

        .badge-aberto {
            background: #fff7d6 !important;
            color: #8a5a00 !important;
        }

        .badge-vale {
            background: #efe7ff !important;
            color: #5b21b6 !important;
        }

        .badge-concluido {
            background: #dcfce7 !important;
            color: #166534 !important;
        }

        .badge-em-coleta {
            background: #e0f2fe !important;
            color: #075985 !important;
        }

        .badge-batida {
            background: #fee2e2 !important;
            color: #991b1b !important;
        }

        .modal {
            background: rgba(15, 23, 42, .46) !important;
            padding: 18px !important;
        }

        .modal-content {
            border-radius: 12px !important;
        }

        .modal-header {
            background: var(--surface-soft) !important;
            border-bottom: 1px solid var(--border) !important;
            padding: 16px 18px !important;
        }

        .modal-body {
            padding: 18px !important;
        }

        .modal-close {
            width: 34px;
            height: 34px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 999px;
            background: var(--surface-muted);
        }

        .opcao-retorno {
            background: var(--surface-soft) !important;
            border: 1px solid var(--border-strong) !important;
            color: var(--text) !important;
        }

        .opcao-retorno:hover {
            background: #eff6ff !important;
            border-color: var(--blue) !important;
        }

        .opcao-retorno.selected {
            background: #dcfce7 !important;
            border-color: var(--green) !important;
        }

        .agenda-panel {
            border-radius: 10px !important;
            overflow: hidden !important;
        }

        .agenda-summary {
            background: var(--surface) !important;
        }

        .agenda-summary-card,
        .agenda-board-section,
        .agenda-board-item,
        .agenda-empty {
            background: var(--surface-soft) !important;
            border-color: var(--border) !important;
            border-radius: 10px !important;
        }

        .agenda-status.pendente {
            background: #fff7d6 !important;
            color: #8a5a00 !important;
            border-color: #f3d17c !important;
        }

        .agenda-status.baixado {
            background: #dcfce7 !important;
            color: #166534 !important;
            border-color: #86efac !important;
        }

        .toast {
            background: #ffffff !important;
            color: var(--text) !important;
            border: 1px solid var(--border-strong) !important;
            box-shadow: var(--shadow-lg) !important;
        }

        .registro-card,
        #resultadoBusca div,
        #cargasAbertasLista div,
        #valesLista div,
        #emColetaLista div,
        #dadosCargaRetorno,
        #dadosValeSaida,
        #dadosRetornoColeta,
        [style*="background:#0f1a24"],
        [style*="background:#1e2a3a"],
        [style*="background:#1a3a2a"] {
            background: var(--surface-soft) !important;
            color: var(--text) !important;
            border-color: var(--border) !important;
        }

        [style*="color:#8a9dc0"],
        [style*="color: #8a9dc0"] {
            color: var(--muted) !important;
        }

        [style*="color:#e0e0e0"],
        [style*="color: #e0e0e0"] {
            color: var(--text) !important;
        }

        @media (max-width: 768px) {
            .main-wrapper {
                padding: 10px !important;
            }

            .app-header,
            .login-card,
            .admin-bar,
            .busca-rapida,
            .filtros-container,
            .table-container,
            .stat-card,
            .agenda-panel {
                border-radius: 8px !important;
            }

            .dashboard-horizontal {
                grid-template-columns: 1fr !important;
            }
        }

        /* ===== IDENTIDADE DRAGAO PROFISSIONAL ===== */
        :root {
            --dragao-green-900: #174f37;
            --dragao-green-800: #216846;
            --dragao-green-700: #2f8d5e;
            --dragao-green-100: #e7f4ec;
            --dragao-green-050: #f3faf6;
            --dragao-red: #ed1c24;
            --dragao-red-dark: #b80f17;
            --dragao-white: #ffffff;
            --dragao-ink: #173126;
            --dragao-muted: #66766e;
            --dragao-line: #d9e7df;
            --dragao-line-strong: #bdd6c7;
            --dragao-panel: #ffffff;
            --dragao-panel-soft: #f7fbf8;
            --dragao-shadow-sm: 0 1px 2px rgba(23, 79, 55, .08);
            --dragao-shadow-md: 0 14px 34px rgba(23, 79, 55, .12);
            --dragao-shadow-lg: 0 26px 70px rgba(23, 79, 55, .18);
        }

        html,
        body {
            background: #eef7f1 !important;
        }

        body {
            color: var(--dragao-ink) !important;
            background:
                linear-gradient(180deg, rgba(255,255,255,.86) 0%, rgba(238,247,241,.96) 42%, rgba(231,244,236,.98) 100%),
                url("assets/logo_dragao.jpg") right 28px top 26px / 92px auto no-repeat !important;
        }

        body::before {
            display: block !important;
            content: "";
            position: fixed;
            inset: 0;
            z-index: -1;
            pointer-events: none;
            background:
                linear-gradient(90deg, rgba(47,141,94,.16), rgba(255,255,255,0) 34%),
                linear-gradient(180deg, rgba(237,28,36,.05), rgba(255,255,255,0) 28%);
        }

        .login-screen {
            background:
                linear-gradient(90deg, rgba(22,89,57,.93) 0%, rgba(47,141,94,.88) 46%, rgba(238,247,241,.92) 100%),
                url("assets/logo_dragao.jpg") center / min(430px, 58vw) auto no-repeat !important;
            padding: 22px !important;
        }

        .login-card {
            width: min(430px, calc(100vw - 34px)) !important;
            background: rgba(255,255,255,.96) !important;
            border: 1px solid rgba(255,255,255,.72) !important;
            border-top: 5px solid var(--dragao-red) !important;
            border-radius: 14px !important;
            box-shadow: 0 30px 90px rgba(12, 51, 34, .32) !important;
        }

        .login-logo .logo-placeholder {
            width: 116px !important;
            height: 116px !important;
            margin: 0 auto 16px !important;
            background: #ffffff !important;
            border: 1px solid var(--dragao-line) !important;
            box-shadow: var(--dragao-shadow-md) !important;
        }

        .logo-placeholder {
            background: #ffffff !important;
            border: 1px solid var(--dragao-line) !important;
            box-shadow: var(--dragao-shadow-sm) !important;
        }

        .company-logo {
            border: 0 !important;
            background: #ffffff !important;
            object-fit: contain !important;
        }

        .login-logo h2,
        .logo-area h1,
        .modal-header h2,
        .filtros-header h3,
        .agenda-header h3 {
            color: var(--dragao-ink) !important;
        }

        .login-logo p,
        .logo-area h1::after,
        .user-info span,
        .stat-title,
        .stat-detalhe,
        .form-group label,
        .input-group label,
        .agenda-header span,
        .filtros-header span,
        .loading,
        .agenda-empty {
            color: var(--dragao-muted) !important;
        }

        .main-wrapper {
            max-width: 1800px !important;
            padding: 20px !important;
        }

        .app-header {
            background:
                linear-gradient(90deg, var(--dragao-green-900), var(--dragao-green-700)) !important;
            border: 0 !important;
            border-radius: 12px !important;
            box-shadow: var(--dragao-shadow-lg) !important;
        }

        .app-header .logo-area h1,
        .app-header .logo-area h1::after,
        .app-header .user-info h4,
        .app-header .user-info span {
            color: #ffffff !important;
        }

        .app-header .logo-placeholder {
            background: #ffffff !important;
            border: 2px solid rgba(255,255,255,.72) !important;
        }

        .user-badge {
            background: rgba(255,255,255,.14) !important;
            border: 1px solid rgba(255,255,255,.28) !important;
            color: #ffffff !important;
        }

        .user-avatar,
        .qtde-c {
            background: var(--dragao-red) !important;
            color: #ffffff !important;
        }

        .admin-bar,
        .busca-rapida,
        .filtros-container,
        .table-container,
        .stat-card,
        .modal-content,
        .agenda-panel,
        .agenda-board-section,
        .agenda-summary-card,
        .cliente-palete-card {
            background: var(--dragao-panel) !important;
            border: 1px solid var(--dragao-line) !important;
            color: var(--dragao-ink) !important;
            box-shadow: var(--dragao-shadow-sm) !important;
        }

        .admin-bar,
        .busca-rapida,
        .filtros-container,
        .agenda-panel,
        .table-container,
        .stat-card {
            border-radius: 10px !important;
        }

        .admin-bar,
        .filtros-header,
        .agenda-header,
        .modal-header {
            background: linear-gradient(180deg, #ffffff, var(--dragao-panel-soft)) !important;
            border-bottom: 1px solid var(--dragao-line) !important;
        }

        .admin-bar {
            border-left: 5px solid var(--dragao-red) !important;
        }

        .admin-bar::before {
            color: var(--dragao-green-800) !important;
        }

        .action-buttons {
            gap: 12px !important;
        }

        .btn-action,
        .btn-admin,
        .btn-login,
        .btn-buscar,
        .btn-filtrar,
        .btn-limpar,
        .btn-mini,
        .btn-logout,
        .btn-acao {
            border-radius: 8px !important;
            font-weight: 800 !important;
            letter-spacing: 0 !important;
        }

        .btn-action {
            min-height: 46px !important;
            border: 1px solid transparent !important;
        }

        .btn-login,
        .btn-action-primary,
        .btn-admin,
        .btn-buscar,
        .btn-filtrar,
        .btn-editar {
            background: var(--dragao-red) !important;
            color: #ffffff !important;
            border-color: var(--dragao-red) !important;
        }

        .btn-login:hover,
        .btn-action-primary:hover,
        .btn-admin:hover,
        .btn-buscar:hover,
        .btn-filtrar:hover,
        .btn-editar:hover {
            background: var(--dragao-red-dark) !important;
            border-color: var(--dragao-red-dark) !important;
        }

        .btn-action-success,
        .btn-retorno {
            background: var(--dragao-green-700) !important;
            color: #ffffff !important;
        }

        .btn-action-warning,
        .btn-retorno-coleta {
            background: #f5c84b !important;
            color: #223128 !important;
        }

        .btn-action-info,
        .btn-detalhes {
            background: var(--dragao-green-800) !important;
            color: #ffffff !important;
        }

        .btn-action-purple,
        .btn-saida-coleta {
            background: #4b6f59 !important;
            color: #ffffff !important;
        }

        .btn-action-secondary,
        .btn-limpar,
        .btn-mini,
        .btn-logout {
            background: #ffffff !important;
            color: var(--dragao-green-900) !important;
            border: 1px solid var(--dragao-line-strong) !important;
        }

        .btn-action:hover,
        .btn-admin:hover,
        .btn-login:hover,
        .btn-buscar:hover,
        .btn-filtrar:hover,
        .btn-limpar:hover,
        .btn-mini:hover,
        .btn-logout:hover,
        .btn-acao:hover {
            transform: translateY(-1px) !important;
            box-shadow: var(--dragao-shadow-md) !important;
        }

        input,
        select,
        textarea,
        .input-group input,
        .form-group input,
        .form-group select,
        .form-group textarea,
        .busca-grid input,
        .filtros-grid input,
        .filtros-grid select {
            background: #ffffff !important;
            border: 1px solid var(--dragao-line-strong) !important;
            color: var(--dragao-ink) !important;
            border-radius: 8px !important;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: var(--dragao-green-700) !important;
            box-shadow: 0 0 0 3px rgba(47,141,94,.16) !important;
        }

        .stat-card {
            border-top: 4px solid var(--dragao-green-700) !important;
        }

        .stat-card:hover {
            border-color: var(--dragao-green-700) !important;
            box-shadow: var(--dragao-shadow-md) !important;
        }

        .stat-header i,
        .stat-cliente-nome {
            color: var(--dragao-red) !important;
        }

        .stat-value,
        .qtde-numero,
        .agenda-summary-card strong,
        .agenda-board-item strong,
        .cliente-palete-card .stat-cliente-valor {
            color: var(--dragao-green-900) !important;
        }

        .card-destaque {
            background: linear-gradient(180deg, #ffffff, #fff5f5) !important;
            border-top-color: var(--dragao-red) !important;
            border-left: 0 !important;
        }

        .table-container {
            box-shadow: var(--dragao-shadow-md) !important;
        }

        th {
            background: var(--dragao-green-900) !important;
            color: #ffffff !important;
            border-bottom: 1px solid var(--dragao-green-900) !important;
        }

        td {
            color: #294238 !important;
            border-bottom: 1px solid var(--dragao-line) !important;
        }

        tbody tr:nth-child(even) {
            background: var(--dragao-green-050) !important;
        }

        tr:hover {
            background: #eaf7ef !important;
        }

        .badge-aberto {
            background: #fff3cd !important;
            color: #7a5300 !important;
        }

        .badge-concluido,
        .agenda-status.baixado {
            background: #dff4e7 !important;
            color: var(--dragao-green-900) !important;
        }

        .badge-vale {
            background: #ffe1e3 !important;
            color: var(--dragao-red-dark) !important;
        }

        .badge-em-coleta {
            background: #e3f4ea !important;
            color: var(--dragao-green-800) !important;
        }

        .badge-batida {
            background: #ffe1e3 !important;
            color: var(--dragao-red-dark) !important;
        }

        .modal {
            background: rgba(12, 51, 34, .58) !important;
        }

        .modal-content {
            border-top: 5px solid var(--dragao-red) !important;
            box-shadow: var(--dragao-shadow-lg) !important;
            margin: 0 auto !important;
            max-height: calc(100vh - 36px) !important;
            overflow: hidden !important;
            display: flex !important;
            flex-direction: column !important;
        }

        .modal-body {
            overflow-y: auto !important;
            min-height: 0 !important;
        }

        .modal-nova-carga-content {
            width: min(920px, calc(100vw - 32px)) !important;
        }

        #modalNovaCarga .modal-body {
            background: linear-gradient(180deg, #ffffff 0%, #fbfdfb 100%) !important;
            padding: 18px 22px 22px !important;
        }

        #modalNovaCarga .form-row {
            gap: 12px !important;
            margin-bottom: 0 !important;
        }

        #modalNovaCarga .form-group {
            margin-bottom: 12px !important;
        }

        #modalNovaCarga input,
        #modalNovaCarga select,
        #modalNovaCarga textarea {
            min-height: 42px !important;
        }

        #modalNovaCarga .quantidade-container {
            align-items: center;
        }

        .nova-carga-actions {
            display: flex;
            justify-content: flex-end;
            padding-top: 4px;
        }

        .nova-carga-actions .btn-login {
            width: auto !important;
            min-width: 180px;
        }

        .campo-condicao-transportadora {
            border-left: 4px solid var(--dragao-green-700) !important;
        }

        .layout-shell {
            display: grid;
            grid-template-columns: 280px minmax(0, 1fr);
            gap: 18px;
            align-items: start;
        }

        .side-actions {
            position: sticky;
            top: 102px;
            display: flex;
            flex-direction: column;
            gap: 14px;
            max-height: calc(100vh - 122px);
            overflow-y: auto;
            padding-right: 2px;
        }

        .side-actions-panel {
            background: rgba(255,255,255,.96) !important;
            border: 1px solid var(--dragao-line) !important;
            border-radius: 10px !important;
            box-shadow: var(--dragao-shadow-sm) !important;
            padding: 12px !important;
        }

        .side-actions-title {
            display: flex;
            align-items: center;
            gap: 8px;
            margin: 0 0 10px;
            color: var(--dragao-green-900);
            font-size: 11px;
            font-weight: 900;
            letter-spacing: .06em;
            text-transform: uppercase;
        }

        .side-actions .admin-bar,
        .side-actions .action-buttons {
            display: flex !important;
            flex-direction: column;
            gap: 8px !important;
            margin: 0 !important;
            padding: 0 !important;
            background: transparent !important;
            border: 0 !important;
            box-shadow: none !important;
        }

        .side-actions .admin-bar[style*="none"],
        .side-actions .action-buttons[style*="none"] {
            display: none !important;
        }

        .side-actions .admin-bar::before {
            content: none !important;
        }

        .side-actions .btn-admin,
        .side-actions .btn-action {
            width: 100% !important;
            min-height: 42px !important;
            justify-content: flex-start !important;
            padding: 10px 12px !important;
            border-radius: 8px !important;
            font-size: 12px !important;
            text-align: left;
            box-shadow: none !important;
        }

        .side-actions .btn-admin i,
        .side-actions .btn-action i {
            width: 18px;
            text-align: center;
        }

        .side-actions .btn-action-secondary {
            background: #ffffff !important;
        }

        .workspace-content {
            min-width: 0;
        }

        .documentos-panel {
            display: none;
            margin-bottom: 18px;
        }

        .documentos-panel.active {
            display: block;
        }

        .documentos-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 12px;
        }

        .documentos-lista {
            display: grid;
            gap: 8px;
            margin-top: 14px;
        }

        .documento-card {
            display: grid;
            grid-template-columns: minmax(0, 1fr) auto;
            gap: 12px;
            align-items: center;
            padding: 10px 12px;
            border: 1px solid var(--dragao-line);
            border-radius: 8px;
            background: #ffffff;
        }

        .documento-card strong {
            color: var(--dragao-green-900);
        }

        .documento-meta {
            color: var(--dragao-muted);
            font-size: 11px;
            line-height: 1.4;
        }

        .documento-actions {
            display: flex;
            gap: 6px;
            flex-wrap: wrap;
            justify-content: flex-end;
        }

        @media (max-width: 1100px) {
            .layout-shell {
                grid-template-columns: 1fr;
            }

            .side-actions {
                position: static;
                max-height: none;
                overflow: visible;
                padding-right: 0;
            }

            .side-actions-panel {
                overflow-x: auto;
            }

            .side-actions .admin-bar,
            .side-actions .action-buttons {
                flex-direction: row;
                flex-wrap: nowrap;
                min-width: max-content;
            }

            .side-actions .btn-admin,
            .side-actions .btn-action {
                width: auto !important;
                white-space: nowrap;
            }
        }

        #dashboardGrid.dashboard-horizontal {
            display: grid !important;
            grid-template-columns: repeat(auto-fit, minmax(230px, 1fr)) !important;
            gap: 14px !important;
            align-items: stretch !important;
            margin: 18px 0 !important;
        }

        #dashboardGrid .stat-card {
            --kpi-color: #2f8d5e;
            position: relative;
            min-height: 142px;
            padding: 18px !important;
            border: 1px solid #dce8e1 !important;
            border-left: 5px solid var(--kpi-color) !important;
            border-top: 1px solid #dce8e1 !important;
            border-radius: 8px !important;
            background:
                linear-gradient(180deg, rgba(255,255,255,.98), rgba(250,252,251,.98)) !important;
            box-shadow: 0 12px 26px rgba(36, 69, 52, .08) !important;
            overflow: hidden;
        }

        #dashboardGrid .stat-card::before {
            content: "";
            position: absolute;
            inset: 0 0 auto 0;
            height: 3px;
            background: var(--kpi-color);
            opacity: .9;
        }

        #dashboardGrid .stat-card:hover {
            transform: translateY(-2px) !important;
            box-shadow: 0 18px 38px rgba(36, 69, 52, .13) !important;
        }

        #dashboardGrid .stat-card.kpi-total { --kpi-color: #ed1c24; }
        #dashboardGrid .stat-card.kpi-aberto { --kpi-color: #d69b16; }
        #dashboardGrid .stat-card.kpi-concluido { --kpi-color: #23834f; }
        #dashboardGrid .stat-card.kpi-vale { --kpi-color: #7c3aed; }
        #dashboardGrid .stat-card.kpi-alerta { --kpi-color: #d9365f; }
        #dashboardGrid .stat-card.kpi-coleta { --kpi-color: #0f7c8a; }
        #dashboardGrid .stat-card.kpi-clientes { --kpi-color: #44615f; }

        #dashboardGrid .stat-header {
            margin-bottom: 10px !important;
            gap: 10px;
        }

        #dashboardGrid .stat-header i {
            width: 36px;
            height: 36px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            background: #f3faf6;
            color: var(--kpi-color) !important;
            font-size: 17px !important;
        }

        #dashboardGrid .stat-title {
            color: #586c62 !important;
            font-size: 11px !important;
            font-weight: 900 !important;
            text-transform: uppercase;
            letter-spacing: .04em !important;
            line-height: 1.25;
        }

        #dashboardGrid .stat-value {
            color: var(--kpi-color) !important;
            font-size: 34px !important;
            line-height: 1 !important;
            font-weight: 900 !important;
            margin-top: 0 !important;
        }

        #dashboardGrid .stat-detalhe {
            color: #61756b !important;
            font-size: 12px !important;
            line-height: 1.35 !important;
        }

        #dashboardGrid .clientes-horizontal {
            grid-column: span 2;
            min-height: 190px;
        }

        #dashboardGrid .clientes-row {
            display: grid !important;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 8px !important;
            max-height: 230px;
            overflow: auto;
            padding-right: 2px;
        }

        #dashboardGrid .cliente-palete-card {
            background: #ffffff !important;
            border: 1px solid #e2ece6 !important;
            border-radius: 8px !important;
            padding: 10px 12px !important;
            box-shadow: none !important;
        }

        #dashboardGrid .stat-cliente-item {
            gap: 10px;
        }

        #dashboardGrid .stat-cliente-nome {
            color: #173126 !important;
            font-size: 12px !important;
            max-width: 100%;
        }

        #dashboardGrid .stat-cliente-valor {
            color: var(--dragao-red-dark) !important;
            white-space: nowrap;
        }

        #dashboardGrid .stat-palete-dist {
            gap: 5px !important;
            margin-top: 8px !important;
        }

        #dashboardGrid .stat-palete-item {
            background: #f3faf6 !important;
            border: 1px solid #d9e7df;
            color: #466156 !important;
            border-radius: 999px !important;
            padding: 3px 8px !important;
            font-size: 10px !important;
            font-weight: 800;
        }

        @media (max-width: 720px) {
            #dashboardGrid.dashboard-horizontal {
                grid-template-columns: 1fr !important;
            }

            #dashboardGrid .clientes-horizontal {
                grid-column: span 1;
            }
        }

        .modal-close {
            background: var(--dragao-green-100) !important;
            color: var(--dragao-green-900) !important;
        }

        .opcao-retorno,
        .agenda-summary-card,
        .agenda-board-section,
        .agenda-board-item,
        .agenda-empty,
        .cliente-palete-card,
        .registro-card,
        #resultadoBusca div,
        #cargasAbertasLista div,
        #valesLista div,
        #emColetaLista div,
        #dadosCargaRetorno,
        #dadosValeSaida,
        #dadosRetornoColeta,
        [style*="background:#0f1a24"],
        [style*="background:#1e2a3a"],
        [style*="background:#1a3a2a"] {
            background: var(--dragao-panel-soft) !important;
            border-color: var(--dragao-line) !important;
            color: var(--dragao-ink) !important;
        }

        .opcao-retorno:hover,
        .agenda-board-item:hover,
        .registro-card:hover {
            background: var(--dragao-green-100) !important;
            border-color: var(--dragao-green-700) !important;
        }

        .opcao-retorno.selected {
            background: var(--dragao-green-100) !important;
            border-color: var(--dragao-green-700) !important;
            box-shadow: inset 0 0 0 1px rgba(47,141,94,.22) !important;
        }

        .agenda-status.pendente {
            background: #fff3cd !important;
            color: #7a5300 !important;
            border-color: #f5c84b !important;
        }

        .toast {
            background: #ffffff !important;
            border: 1px solid var(--dragao-line-strong) !important;
            border-left: 5px solid var(--dragao-red) !important;
            color: var(--dragao-ink) !important;
        }

        .permissoes-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(210px, 1fr));
            gap: 8px;
        }

        .permissao-item {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 9px 10px;
            border: 1px solid var(--dragao-line);
            border-radius: 8px;
            background: var(--dragao-panel-soft);
            color: var(--dragao-ink);
            font-size: 12px;
            font-weight: 700;
        }

        .permissao-item input {
            width: auto !important;
        }

        .usuarios-lista {
            display: grid;
            gap: 8px;
            margin: 8px 0 16px;
        }

        .usuario-card {
            display: grid;
            grid-template-columns: minmax(0, 1fr) auto;
            align-items: center;
            gap: 12px;
            padding: 12px;
            border: 1px solid var(--dragao-line);
            border-radius: 8px;
            background: var(--dragao-panel-soft);
        }

        .usuario-card strong,
        .usuario-card small {
            overflow-wrap: anywhere;
        }

        .usuario-card-actions {
            display: flex;
            gap: 6px;
            flex-wrap: wrap;
            justify-content: flex-end;
        }

        .permissoes-toolbar {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
            margin-bottom: 8px;
        }

        .permissoes-toolbar .btn-mini {
            min-height: 34px;
            padding: 6px 10px;
        }

        .workspace-content > .table-container {
            width: 100%;
            max-width: none !important;
            min-height: min(680px, calc(100vh - 170px));
            max-height: calc(100vh - 150px) !important;
        }

        .workspace-content > .table-container table {
            min-width: 1780px;
        }

        .workspace-content > .table-container th {
            position: sticky;
            top: 0;
        }

        @media (min-width: 1100px) {
            .workspace-content > .table-container {
                width: calc(100vw - 340px);
                max-width: calc(100vw - 340px) !important;
            }
        }

        @media (max-width: 768px) {
            body {
                background:
                    linear-gradient(180deg, rgba(255,255,255,.92), rgba(238,247,241,.98)),
                    url("assets/logo_dragao.jpg") right 12px top 12px / 62px auto no-repeat !important;
            }

            .app-header {
                position: static !important;
            }

            .main-wrapper {
                padding: 10px !important;
            }

            .login-screen {
                background:
                    linear-gradient(180deg, rgba(22,89,57,.92), rgba(238,247,241,.95)),
                    url("assets/logo_dragao.jpg") center 34px / 220px auto no-repeat !important;
            }
        }

        /* Responsividade final: desktop, tablet e mobile */
        html {
            width: 100%;
            overflow-x: hidden;
            -webkit-text-size-adjust: 100%;
        }

        body {
            width: 100%;
            overflow-x: hidden;
        }

        img,
        svg,
        canvas,
        video {
            max-width: 100%;
            height: auto;
        }

        button,
        input,
        select,
        textarea {
            max-width: 100%;
        }

        .main-wrapper,
        .workspace-content,
        .layout-shell,
        .app-container {
            min-width: 0;
        }

        .app-header {
            gap: 12px;
        }

        .app-header > div:first-child {
            min-width: 0;
        }

        .app-header h1,
        .app-header p,
        .stat-title,
        .side-actions-title,
        .btn-admin,
        .btn-action,
        .btn-acao {
            overflow-wrap: anywhere;
        }

        .busca-grid,
        .filtros-grid,
        .documentos-grid,
        .form-row {
            min-width: 0;
        }

        .busca-grid > *,
        .filtros-grid > *,
        .documentos-grid > *,
        .form-row > * {
            min-width: 0;
        }

        .toolbar-extra {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .btn-mini,
        .btn-acao,
        .btn-admin,
        .btn-action,
        .btn-buscar,
        .btn-filtrar,
        .btn-limpar,
        .btn-login {
            min-height: 40px;
            touch-action: manipulation;
        }

        .table-container,
        .agenda-table-wrap {
            max-width: 100%;
            overflow: auto;
            -webkit-overflow-scrolling: touch;
            overscroll-behavior-inline: contain;
        }

        .table-container table,
        .agenda-table {
            table-layout: auto;
        }

        .table-container th,
        .table-container td,
        .agenda-table th,
        .agenda-table td {
            vertical-align: middle;
        }

        .modal {
            padding: 18px;
            overflow-y: auto;
            align-items: flex-start;
        }

        .modal-content {
            width: min(720px, 100%) !important;
            max-width: 100% !important;
            max-height: calc(100dvh - 36px) !important;
            margin: auto 0;
        }

        .modal-header {
            position: sticky;
            top: 0;
            z-index: 2;
            background: inherit;
        }

        .modal-close {
            width: 38px;
            height: 38px;
            flex: 0 0 38px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
        }

        @media (min-width: 1400px) {
            .main-wrapper {
                max-width: 1600px;
                margin-inline: auto;
            }

            .layout-shell {
                grid-template-columns: 300px minmax(0, 1fr);
            }

            .table-container {
                max-height: 64vh;
            }
        }

        @media (max-width: 1180px) {
            .main-wrapper {
                padding: 14px !important;
            }

            .layout-shell {
                grid-template-columns: 1fr !important;
                gap: 14px !important;
            }

            .side-actions {
                position: sticky !important;
                top: 0 !important;
                z-index: 30;
                max-height: none !important;
                overflow: visible !important;
                padding: 8px 0 !important;
                background: rgba(246, 250, 247, .96);
                backdrop-filter: blur(10px);
                border-bottom: 1px solid var(--dragao-line);
            }

            .side-actions-panel {
                padding: 10px !important;
            }

            .side-actions .admin-bar,
            .side-actions .action-buttons {
                display: flex !important;
                flex-direction: row !important;
                flex-wrap: nowrap !important;
                gap: 8px !important;
                min-width: 0 !important;
                overflow-x: auto;
                padding-bottom: 2px !important;
                scrollbar-width: thin;
            }

            .side-actions .admin-bar[style*="none"],
            .side-actions .action-buttons[style*="none"] {
                display: none !important;
            }

            .side-actions .btn-admin,
            .side-actions .btn-action {
                flex: 0 0 auto;
                width: auto !important;
                max-width: 230px;
                white-space: normal !important;
            }

            #dashboardGrid.dashboard-horizontal {
                grid-template-columns: repeat(auto-fit, minmax(210px, 1fr)) !important;
            }
        }

        @media (max-width: 820px) {
            .app-header {
                position: sticky !important;
                top: 0;
                z-index: 40;
                display: grid !important;
                grid-template-columns: 1fr;
                align-items: start !important;
                padding: 12px !important;
            }

            .app-header h1 {
                font-size: 18px !important;
                line-height: 1.2;
            }

            .app-header p,
            .user-info {
                font-size: 12px !important;
            }

            .user-info {
                width: 100%;
                justify-content: space-between;
                gap: 8px;
            }

            .busca-grid {
                grid-template-columns: 1fr !important;
            }

            .btn-buscar,
            .btn-filtrar,
            .btn-limpar,
            .nova-carga-actions .btn-login {
                width: 100% !important;
            }

            .filtros-grid,
            .documentos-grid {
                grid-template-columns: repeat(auto-fit, minmax(190px, 1fr)) !important;
            }

            .filtros-botoes {
                display: grid !important;
                grid-template-columns: 1fr 1fr;
                gap: 10px !important;
            }

            .agenda-header,
            .filtros-header {
                display: grid !important;
                grid-template-columns: 1fr;
                gap: 10px;
                align-items: start !important;
            }

            .agenda-header .btn-login,
            #btnNovoAgendaTransportadora {
                width: 100% !important;
                min-width: 0 !important;
            }

            .agenda-summary {
                grid-template-columns: repeat(2, minmax(0, 1fr)) !important;
            }

            .documento-card {
                grid-template-columns: 1fr !important;
            }

            .documento-actions {
                justify-content: flex-start !important;
            }

            .form-row {
                grid-template-columns: 1fr !important;
                gap: 0 !important;
            }

            .modal {
                padding: 10px;
            }

            .modal-content {
                border-radius: 10px !important;
                max-height: calc(100dvh - 20px) !important;
            }

            .modal-body {
                padding: 14px !important;
            }

            .modal-header {
                padding: 12px 14px !important;
                gap: 10px;
            }

            .modal-header h2 {
                font-size: 15px !important;
                line-height: 1.25;
            }
        }

        @media (max-width: 560px) {
            .app-container,
            .main-wrapper,
            .layout-shell,
            .workspace-content,
            .side-actions,
            .busca-rapida,
            .filtros-container,
            .table-container,
            .agenda-panel {
                width: 100% !important;
                max-width: 100% !important;
                min-width: 0 !important;
                box-sizing: border-box !important;
            }

            .main-wrapper {
                padding: 8px !important;
            }

            .login-card {
                width: min(100%, 380px) !important;
                padding: 22px 16px !important;
                border-radius: 10px !important;
            }

            .side-actions {
                margin-inline: 0 !important;
                padding-inline: 8px !important;
                overflow-x: hidden !important;
            }

            .side-actions-panel {
                width: 100% !important;
                max-width: 100% !important;
                border-radius: 0 !important;
                border-left: 0 !important;
                border-right: 0 !important;
                overflow: hidden !important;
            }

            .side-actions .admin-bar,
            .side-actions .action-buttons {
                width: 100% !important;
                max-width: 100% !important;
                overflow-x: auto !important;
                overflow-y: hidden !important;
            }

            .side-actions-title {
                font-size: 10px !important;
                margin-bottom: 8px !important;
            }

            .side-actions .btn-admin,
            .side-actions .btn-action {
                max-width: 188px;
                min-height: 42px !important;
                padding: 9px 10px !important;
                font-size: 11px !important;
            }

            .busca-rapida,
            .filtros-container,
            .table-container,
            .agenda-panel,
            .modal-content {
                border-radius: 8px !important;
            }

            .busca-rapida,
            .filtros-container,
            .agenda-panel {
                padding: 12px !important;
            }

            #dashboardGrid.dashboard-horizontal {
                grid-template-columns: 1fr !important;
                gap: 10px !important;
            }

            #dashboardGrid .stat-card {
                min-height: auto !important;
                padding: 14px !important;
            }

            #dashboardGrid .stat-value {
                font-size: 28px !important;
            }

            #dashboardGrid .clientes-row {
                grid-template-columns: 1fr !important;
                max-height: 260px;
            }

            .filtros-grid,
            .documentos-grid,
            .agenda-summary {
                grid-template-columns: 1fr !important;
            }

            .filtros-botoes {
                grid-template-columns: 1fr !important;
            }

            .toolbar-extra .btn-mini {
                flex: 1 1 calc(50% - 6px);
                min-width: 130px;
            }

            input,
            select,
            textarea {
                font-size: 16px !important;
            }

            .table-container,
            .agenda-table-wrap {
                max-height: 58vh !important;
                margin-inline: -4px;
                border-radius: 8px !important;
            }

            table,
            .agenda-table {
                min-width: 980px !important;
                font-size: 10px !important;
            }

            th,
            td,
            .agenda-table th,
            .agenda-table td {
                padding: 8px 6px !important;
            }

            .btn-acao {
                min-height: 34px !important;
                padding: 6px 8px !important;
                font-size: 10px !important;
            }

            .modal {
                padding: 0;
                align-items: stretch;
            }

            .modal-content {
                width: 100% !important;
                height: 100dvh !important;
                max-height: 100dvh !important;
                margin: 0 !important;
                border-radius: 0 !important;
                border-left: 0 !important;
                border-right: 0 !important;
            }

            .modal-body {
                padding: 12px !important;
            }

            .quantidade-container {
                align-items: stretch !important;
            }

            .quantidade-container input {
                min-width: 0;
            }
        }

        /* Layout polish: professional density and consistent sizing */
        :root {
            --ui-page: #eef4f0;
            --ui-surface: #ffffff;
            --ui-surface-soft: #f7faf8;
            --ui-border: #d6e4dc;
            --ui-border-strong: #b8d0c3;
            --ui-text: #163026;
            --ui-muted: #64766e;
            --ui-green: #1f6b48;
            --ui-green-soft: #e7f4ec;
            --ui-red: #d71920;
            --ui-shadow: 0 10px 28px rgba(22, 80, 54, .10);
            --ui-shadow-soft: 0 1px 3px rgba(22, 80, 54, .08);
        }

        html {
            background: var(--ui-page) !important;
        }

        body {
            background:
                linear-gradient(180deg, rgba(255,255,255,.82), rgba(238,244,240,.98)),
                var(--ui-page) !important;
            color: var(--ui-text) !important;
        }

        .main-wrapper {
            width: min(100%, 1920px) !important;
            max-width: none !important;
            margin: 0 auto !important;
            padding: 16px 18px 22px !important;
        }

        .app-header {
            min-height: 74px;
            padding: 12px 16px !important;
            border-radius: 10px !important;
            background: linear-gradient(90deg, #164d35, #24714d) !important;
            box-shadow: var(--ui-shadow) !important;
        }

        .logo-area {
            gap: 12px !important;
            min-width: 0;
        }

        .logo-placeholder {
            width: 48px !important;
            height: 48px !important;
            flex: 0 0 48px;
        }

        .logo-area h1 {
            font-size: 19px !important;
            line-height: 1.15 !important;
        }

        .user-area {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 10px;
            flex-wrap: wrap;
            min-width: 0;
        }

        .user-badge {
            min-height: 44px;
            border-radius: 8px !important;
        }

        .layout-shell {
            grid-template-columns: 260px minmax(0, 1fr) !important;
            gap: 14px !important;
            margin-top: 14px;
        }

        .side-actions {
            top: 92px !important;
            gap: 10px !important;
            max-height: calc(100vh - 108px) !important;
        }

        .side-actions-panel,
        .busca-rapida,
        .filtros-container,
        .agenda-panel,
        .table-container,
        .stat-card,
        .modal-content {
            border: 1px solid var(--ui-border) !important;
            border-radius: 8px !important;
            background: var(--ui-surface) !important;
            box-shadow: var(--ui-shadow-soft) !important;
        }

        .side-actions-panel {
            padding: 10px !important;
        }

        .side-actions-title {
            margin-bottom: 8px !important;
            font-size: 10px !important;
            color: var(--ui-green) !important;
        }

        .side-actions .btn-admin,
        .side-actions .btn-action {
            min-height: 38px !important;
            padding: 8px 10px !important;
            font-size: 11px !important;
            border-radius: 7px !important;
            gap: 8px !important;
        }

        .workspace-content {
            display: grid;
            gap: 12px;
            min-width: 0;
        }

        .busca-rapida,
        .filtros-container,
        .agenda-panel {
            padding: 14px !important;
        }

        .busca-grid {
            grid-template-columns: minmax(260px, 1fr) auto !important;
            gap: 10px !important;
        }

        .toolbar-extra {
            margin-top: 10px;
        }

        #dashboardGrid.dashboard-horizontal {
            grid-template-columns: repeat(4, minmax(180px, 1fr)) !important;
            gap: 10px !important;
            margin-bottom: 0 !important;
        }

        #dashboardGrid .stat-card {
            min-height: 116px;
            padding: 14px !important;
        }

        #dashboardGrid .stat-value {
            font-size: 26px !important;
            line-height: 1.05 !important;
        }

        #dashboardGrid .stat-title {
            font-size: 10px !important;
            letter-spacing: .04em !important;
        }

        #dashboardGrid .clientes-horizontal {
            grid-column: span 2;
        }

        .filtros-container {
            overflow: hidden;
        }

        .filtros-header,
        .agenda-header,
        .modal-header {
            padding: 13px 15px !important;
            background: var(--ui-surface-soft) !important;
            border-bottom: 1px solid var(--ui-border) !important;
        }

        .filtros-grid {
            grid-template-columns: repeat(6, minmax(130px, 1fr)) !important;
            gap: 10px !important;
            padding: 14px 14px 0 !important;
        }

        .filtros-botoes {
            padding: 12px 14px 14px !important;
            gap: 8px !important;
        }

        input,
        select,
        textarea {
            min-height: 38px !important;
            border-radius: 7px !important;
        }

        .btn-action,
        .btn-admin,
        .btn-login,
        .btn-buscar,
        .btn-filtrar,
        .btn-limpar,
        .btn-mini,
        .btn-acao {
            border-radius: 7px !important;
            letter-spacing: 0 !important;
        }

        .workspace-content > .table-container {
            width: 100% !important;
            max-width: 100% !important;
            min-height: clamp(420px, 56vh, 720px) !important;
            max-height: calc(100vh - 128px) !important;
            overflow: auto !important;
        }

        .workspace-content > .table-container table {
            min-width: 1840px !important;
        }

        .table-container th,
        .table-container td {
            padding: 9px 8px !important;
            font-size: 11px !important;
            line-height: 1.25 !important;
        }

        .table-container th {
            position: sticky !important;
            top: 0 !important;
            z-index: 5 !important;
            background: #164d35 !important;
            color: #ffffff !important;
        }

        .table-container tbody tr {
            height: 44px;
        }

        .table-container tbody tr:hover {
            background: #edf8f1 !important;
        }

        .modal {
            padding: 18px !important;
        }

        .modal-content {
            width: min(820px, calc(100vw - 32px)) !important;
            max-height: calc(100dvh - 36px) !important;
        }

        #modalUsuarios .modal-content,
        #modalNovaCarga .modal-content,
        #modalAgendaTransportadora .modal-content {
            width: min(980px, calc(100vw - 32px)) !important;
        }

        .modal-body {
            padding: 16px !important;
        }

        .permissoes-grid {
            grid-template-columns: repeat(auto-fit, minmax(230px, 1fr)) !important;
        }

        .usuario-card {
            background: var(--ui-surface-soft) !important;
        }

        @media (min-width: 1500px) {
            .layout-shell {
                grid-template-columns: 280px minmax(0, 1fr) !important;
            }

            #dashboardGrid.dashboard-horizontal {
                grid-template-columns: repeat(6, minmax(160px, 1fr)) !important;
            }

            #dashboardGrid .clientes-horizontal {
                grid-column: span 2;
            }
        }

        @media (max-width: 1180px) {
            .main-wrapper {
                padding: 12px !important;
            }

            .layout-shell {
                grid-template-columns: 1fr !important;
            }

            .side-actions {
                position: static !important;
                max-height: none !important;
                overflow: visible !important;
            }

            .side-actions .admin-bar,
            .side-actions .action-buttons {
                flex-direction: row !important;
                overflow-x: auto !important;
                padding-bottom: 2px !important;
            }

            .side-actions .btn-admin,
            .side-actions .btn-action {
                width: auto !important;
                flex: 0 0 auto;
                white-space: nowrap !important;
            }

            #dashboardGrid.dashboard-horizontal {
                grid-template-columns: repeat(2, minmax(0, 1fr)) !important;
            }

            #dashboardGrid .clientes-horizontal {
                grid-column: span 2;
            }

            .filtros-grid {
                grid-template-columns: repeat(3, minmax(160px, 1fr)) !important;
            }
        }

        @media (max-width: 720px) {
            .main-wrapper {
                padding: 8px !important;
            }

            .app-header {
                position: static !important;
                grid-template-columns: 1fr !important;
                gap: 10px !important;
            }

            .user-area {
                justify-content: flex-start;
            }

            .side-actions .admin-bar,
            .side-actions .action-buttons {
                gap: 7px !important;
            }

            .side-actions .btn-admin,
            .side-actions .btn-action {
                max-width: 190px;
                min-height: 40px !important;
                white-space: normal !important;
            }

            .busca-grid,
            .filtros-grid,
            .form-row,
            .documentos-grid {
                grid-template-columns: 1fr !important;
            }

            #dashboardGrid.dashboard-horizontal,
            #dashboardGrid .clientes-horizontal {
                grid-template-columns: 1fr !important;
                grid-column: auto !important;
            }

            .workspace-content > .table-container {
                min-height: 58vh !important;
                margin-inline: 0 !important;
            }

            .workspace-content > .table-container table {
                min-width: 1100px !important;
            }

            .modal {
                padding: 0 !important;
            }

            .modal-content {
                width: 100% !important;
                height: 100dvh !important;
                max-height: 100dvh !important;
                border-radius: 0 !important;
            }
        }
        /* Ajuste solicitado: mais aproveitamento de tela e administracao integrada */
        .main-wrapper {
            width: 100% !important;
            max-width: none !important;
            padding: 8px 10px 12px !important;
        }

        .app-header {
            min-height: 58px !important;
            margin-bottom: 8px !important;
            padding: 8px 12px !important;
            border-radius: 8px !important;
        }

        .logo-placeholder {
            width: 40px !important;
            height: 40px !important;
            flex-basis: 40px !important;
        }

        .logo-area h1 {
            font-size: 17px !important;
        }

        .user-badge {
            min-height: 38px !important;
            padding: 4px 8px 4px 4px !important;
        }

        .user-avatar {
            width: 34px !important;
            height: 34px !important;
        }

        .layout-shell {
            grid-template-columns: 218px minmax(0, 1fr) !important;
            gap: 8px !important;
            margin-top: 8px !important;
        }

        .side-actions {
            top: 66px !important;
            gap: 0 !important;
            max-height: calc(100vh - 78px) !important;
            padding-right: 0 !important;
        }

        .side-actions-panel {
            padding: 8px !important;
            border-radius: 0 !important;
            box-shadow: none !important;
            background: #ffffff !important;
        }

        #adminActionsPanel {
            border-radius: 8px 8px 0 0 !important;
            border-bottom: 0 !important;
            background: linear-gradient(180deg, #ffffff, #f1faf4) !important;
        }

        #adminActionsPanel + .side-actions-panel {
            border-radius: 0 0 8px 8px !important;
            border-top: 0 !important;
        }

        #adminActionsPanel[style*="none"] + .side-actions-panel {
            border-radius: 8px !important;
            border-top: 1px solid var(--ui-border) !important;
        }

        .side-actions-title {
            min-height: 28px;
            margin: -8px -8px 8px !important;
            padding: 8px 9px !important;
            background: #f3faf6;
            border-bottom: 1px solid var(--ui-border);
            font-size: 9px !important;
        }

        #adminActionsPanel .side-actions-title {
            background: #e7f4ec;
            color: #164d35 !important;
        }

        .side-actions .admin-bar,
        .side-actions .action-buttons {
            gap: 5px !important;
        }

        .side-actions .btn-admin,
        .side-actions .btn-action {
            min-height: 34px !important;
            padding: 7px 8px !important;
            font-size: 10px !important;
            border-radius: 6px !important;
        }

        .workspace-content {
            gap: 8px !important;
        }

        .busca-rapida,
        .filtros-container,
        .agenda-panel {
            padding: 10px !important;
            border-radius: 7px !important;
        }

        .busca-grid {
            gap: 8px !important;
        }

        .toolbar-extra {
            margin-top: 7px !important;
            gap: 6px !important;
        }

        .toolbar-extra .btn-mini {
            min-height: 32px !important;
            padding: 6px 9px !important;
            font-size: 10px !important;
        }

        #dashboardGrid.dashboard-horizontal {
            grid-template-columns: repeat(6, minmax(140px, 1fr)) !important;
            gap: 7px !important;
        }

        #dashboardGrid .stat-card {
            min-height: 88px !important;
            padding: 10px !important;
            border-radius: 7px !important;
        }

        #dashboardGrid .stat-value {
            font-size: 22px !important;
        }

        #dashboardGrid .stat-detalhe {
            font-size: 11px !important;
        }

        #dashboardGrid .clientes-horizontal {
            grid-column: span 2 !important;
        }

        .filtros-header,
        .agenda-header,
        .modal-header {
            padding: 9px 11px !important;
        }

        .filtros-grid {
            grid-template-columns: repeat(6, minmax(118px, 1fr)) !important;
            gap: 7px !important;
            padding: 10px 10px 0 !important;
        }

        .filtros-botoes {
            padding: 8px 10px 10px !important;
        }

        .filtro-field label,
        .form-group label,
        .input-group label {
            margin-bottom: 4px !important;
            font-size: 11px !important;
        }

        input,
        select,
        textarea {
            min-height: 34px !important;
            padding: 8px 10px !important;
            font-size: 12px !important;
        }

        .workspace-content > .table-container {
            min-height: calc(100vh - 235px) !important;
            max-height: calc(100vh - 84px) !important;
            border-radius: 7px !important;
        }

        .workspace-content > .table-container table {
            min-width: 1760px !important;
        }

        .table-container th,
        .table-container td {
            padding: 7px 7px !important;
            font-size: 10.5px !important;
        }

        .table-container tbody tr {
            height: 38px !important;
        }

        .btn-acao {
            min-height: 30px !important;
            padding: 5px 7px !important;
            font-size: 10px !important;
        }

        .modal-content {
            border-radius: 8px !important;
        }

        @media (min-width: 1500px) {
            .layout-shell {
                grid-template-columns: 230px minmax(0, 1fr) !important;
            }

            .workspace-content > .table-container {
                min-height: calc(100vh - 220px) !important;
            }
        }

        @media (max-width: 1180px) {
            .layout-shell {
                grid-template-columns: 1fr !important;
            }

            .side-actions {
                position: static !important;
                max-height: none !important;
            }

            .side-actions-panel,
            #adminActionsPanel,
            #adminActionsPanel + .side-actions-panel {
                border-radius: 8px !important;
                border: 1px solid var(--ui-border) !important;
            }

            .side-actions {
                gap: 8px !important;
            }

            #dashboardGrid.dashboard-horizontal {
                grid-template-columns: repeat(3, minmax(0, 1fr)) !important;
            }

            .filtros-grid {
                grid-template-columns: repeat(3, minmax(140px, 1fr)) !important;
            }
        }

        @media (max-width: 720px) {
            .main-wrapper {
                padding: 6px !important;
            }

            .app-header {
                min-height: auto !important;
            }

            #dashboardGrid.dashboard-horizontal {
                grid-template-columns: 1fr !important;
            }

            #dashboardGrid .clientes-horizontal {
                grid-column: auto !important;
            }

            .filtros-grid {
                grid-template-columns: 1fr !important;
            }

            .workspace-content > .table-container {
                min-height: 62vh !important;
                max-height: 62vh !important;
            }
        }
        /* Dashboard com filtro integrado e compacto */
        .dashboard-area {
            display: grid;
            gap: 5px;
            padding: 6px;
            border: 1px solid var(--ui-border) !important;
            border-radius: 6px !important;
            background: #ffffff !important;
            box-shadow: var(--ui-shadow-soft) !important;
        }

        .dashboard-area #dashboardGrid.dashboard-horizontal {
            margin: 0 !important;
            gap: 5px !important;
            grid-template-columns: repeat(9, minmax(92px, 1fr)) !important;
            align-items: stretch !important;
        }

        .dashboard-area #dashboardGrid .stat-card {
            min-height: 58px !important;
            padding: 6px 8px !important;
            border-radius: 6px !important;
            box-shadow: none !important;
            overflow: hidden !important;
        }

        .dashboard-area #dashboardGrid .stat-header {
            margin-bottom: 3px !important;
            gap: 4px !important;
            min-width: 0 !important;
        }

        .dashboard-area #dashboardGrid .stat-header i {
            font-size: 13px !important;
        }

        .dashboard-area #dashboardGrid .stat-value {
            font-size: 18px !important;
            line-height: 1 !important;
        }

        .dashboard-area #dashboardGrid .stat-title {
            display: block !important;
            min-width: 0 !important;
            overflow: hidden !important;
            text-overflow: ellipsis !important;
            white-space: nowrap !important;
            font-size: 8px !important;
            line-height: 1.05 !important;
        }

        .dashboard-area #dashboardGrid .stat-detalhe {
            max-height: 24px !important;
            overflow: hidden !important;
            font-size: 9px !important;
            line-height: 1.15 !important;
        }

        .dashboard-area #dashboardGrid .clientes-horizontal {
            min-height: 58px !important;
            max-height: 72px !important;
        }

        .dashboard-area #dashboardGrid .clientes-row {
            display: flex !important;
            flex-wrap: nowrap !important;
            gap: 4px !important;
            max-height: 34px !important;
            overflow-x: auto !important;
            overflow-y: hidden !important;
            padding-bottom: 2px !important;
        }

        .dashboard-area #dashboardGrid .stat-cliente-item,
        .dashboard-area #dashboardGrid .stat-palete-item {
            flex: 0 0 auto !important;
            padding: 3px 5px !important;
            font-size: 8px !important;
            line-height: 1.1 !important;
        }

        .dashboard-area .filtros-container {
            display: grid !important;
            grid-template-columns: minmax(0, 1fr) auto;
            gap: 5px !important;
            align-items: end !important;
            margin: 0 !important;
            padding: 5px 0 0 !important;
            border: 0 !important;
            border-top: 1px solid var(--ui-border) !important;
            border-radius: 0 !important;
            background: transparent !important;
            box-shadow: none !important;
            overflow: visible !important;
        }

        .dashboard-area .filtros-header {
            display: none !important;
        }

        .dashboard-area .filtros-grid {
            display: grid !important;
            grid-template-columns: minmax(140px, 1.4fr) minmax(96px, .8fr) minmax(112px, 1fr) minmax(70px, .55fr) minmax(112px, .85fr) minmax(112px, .85fr) !important;
            gap: 5px !important;
            align-items: end !important;
            padding: 0 !important;
        }

        .dashboard-area .filtros-botoes {
            display: flex !important;
            gap: 5px !important;
            align-items: end !important;
            padding: 0 !important;
        }

        .dashboard-area .filtros-botoes .btn-filtrar,
        .dashboard-area .filtros-botoes .btn-limpar {
            min-height: 28px !important;
            padding: 5px 8px !important;
            font-size: 9px !important;
            white-space: nowrap;
        }

        .dashboard-area .filtro-field label {
            margin-bottom: 1px !important;
            font-size: 8px !important;
            line-height: 1 !important;
            text-transform: uppercase;
            color: var(--ui-muted) !important;
        }

        .dashboard-area .filtro-field select,
        .dashboard-area .filtro-field input {
            min-height: 28px !important;
            height: 28px !important;
            padding: 4px 7px !important;
            font-size: 10px !important;
        }

        .dashboard-area + .table-container {
            min-height: calc(100vh - 174px) !important;
            max-height: calc(100vh - 76px) !important;
        }

        @media (min-width: 1500px) {
            .dashboard-area #dashboardGrid.dashboard-horizontal {
                grid-template-columns: repeat(9, minmax(108px, 1fr)) !important;
            }

            .dashboard-area .filtros-grid {
                grid-template-columns: minmax(170px, 1.5fr) minmax(108px, .8fr) minmax(126px, 1fr) minmax(78px, .55fr) minmax(118px, .8fr) minmax(118px, .8fr) !important;
            }
        }

        @media (max-width: 980px) {
            .dashboard-area #dashboardGrid.dashboard-horizontal {
                grid-template-columns: repeat(3, minmax(0, 1fr)) !important;
            }
        }

        @media (max-width: 1180px) {
            .dashboard-area .filtros-container {
                grid-template-columns: 1fr !important;
            }

            .dashboard-area .filtros-grid {
                grid-template-columns: repeat(3, minmax(150px, 1fr)) !important;
            }

            .dashboard-area .filtros-botoes {
                display: grid !important;
                grid-template-columns: 1fr 1fr;
                gap: 6px !important;
            }
        }

        @media (max-width: 720px) {
            .dashboard-area {
                padding: 5px;
            }

            .dashboard-area #dashboardGrid.dashboard-horizontal {
                grid-template-columns: repeat(2, minmax(0, 1fr)) !important;
            }

            .dashboard-area .filtros-grid {
                grid-template-columns: 1fr !important;
            }

            .dashboard-area .filtros-botoes {
                grid-template-columns: 1fr !important;
            }
        }

        /* Tabela com mais area util e botoes compactos */
        .app-header {
            min-height: 46px !important;
            padding: 7px 10px !important;
        }

        .header-logo {
            gap: 8px !important;
        }

        .header-logo h1 {
            font-size: 17px !important;
            line-height: 1 !important;
        }

        .user-info {
            gap: 7px !important;
            font-size: 11px !important;
        }

        .main-wrapper {
            padding: 6px !important;
        }

        .layout-shell {
            gap: 6px !important;
        }

        .side-actions {
            gap: 6px !important;
            max-height: calc(100vh - 64px) !important;
        }

        .side-actions-panel,
        #adminActionsPanel {
            padding: 6px !important;
            border-radius: 6px !important;
        }

        .side-actions-title {
            margin: -6px -6px 6px !important;
            padding: 6px 7px !important;
            font-size: 8px !important;
        }

        .side-actions .admin-bar,
        .side-actions .action-buttons {
            gap: 4px !important;
        }

        .side-actions .btn-admin,
        .side-actions .btn-action {
            min-height: 28px !important;
            padding: 5px 7px !important;
            font-size: 9px !important;
            border-radius: 5px !important;
        }

        .side-actions .btn-admin i,
        .side-actions .btn-action i {
            width: 14px !important;
            font-size: 10px !important;
        }

        .workspace-content {
            gap: 5px !important;
        }

        .busca-rapida {
            padding: 6px !important;
            border-radius: 6px !important;
        }

        .busca-grid {
            gap: 5px !important;
        }

        .busca-rapida input {
            min-height: 28px !important;
            height: 28px !important;
            padding: 4px 7px !important;
            font-size: 10px !important;
        }

        .btn-admin,
        .btn-action,
        .btn-buscar,
        .btn-filtrar,
        .btn-limpar,
        .btn-mini,
        .btn-acao {
            min-height: 26px !important;
            padding: 4px 7px !important;
            font-size: 9px !important;
            border-radius: 5px !important;
            line-height: 1.05 !important;
        }

        .btn-admin i,
        .btn-action i,
        .btn-buscar i,
        .btn-filtrar i,
        .btn-limpar i,
        .btn-mini i,
        .btn-acao i {
            font-size: 10px !important;
        }

        .toolbar-extra {
            margin-top: 4px !important;
            gap: 4px !important;
        }

        .toolbar-extra .btn-mini {
            min-height: 24px !important;
            padding: 4px 6px !important;
            font-size: 8.5px !important;
        }

        .dashboard-area {
            gap: 4px !important;
            padding: 4px !important;
        }

        .dashboard-area #dashboardGrid.dashboard-horizontal {
            gap: 4px !important;
        }

        .dashboard-area #dashboardGrid .stat-card {
            min-height: 48px !important;
            padding: 5px 6px !important;
        }

        .dashboard-area #dashboardGrid .stat-value {
            font-size: 16px !important;
        }

        .dashboard-area #dashboardGrid .stat-detalhe {
            max-height: 18px !important;
            font-size: 8px !important;
        }

        .dashboard-area #dashboardGrid .clientes-horizontal {
            min-height: 48px !important;
            max-height: 58px !important;
        }

        .dashboard-area .filtros-container {
            padding-top: 4px !important;
        }

        .dashboard-area .filtro-field select,
        .dashboard-area .filtro-field input {
            min-height: 24px !important;
            height: 24px !important;
            padding: 3px 6px !important;
            font-size: 9px !important;
        }

        .dashboard-area .filtros-botoes .btn-filtrar,
        .dashboard-area .filtros-botoes .btn-limpar {
            min-height: 24px !important;
            padding: 4px 6px !important;
            font-size: 8.5px !important;
        }

        .workspace-content > .table-container,
        .dashboard-area + .table-container {
            width: 100% !important;
            max-width: none !important;
            min-height: calc(100vh - 138px) !important;
            max-height: calc(100vh - 62px) !important;
            border-radius: 5px !important;
            overflow: auto !important;
        }

        .workspace-content > .table-container table {
            min-width: 1900px !important;
        }

        .table-container th,
        .table-container td {
            padding: 5px 6px !important;
            font-size: 9.5px !important;
            line-height: 1.15 !important;
        }

        .table-container tbody tr {
            height: 30px !important;
        }

        .table-container .btn-acao {
            min-height: 22px !important;
            padding: 3px 5px !important;
            margin: 1px !important;
            font-size: 8.5px !important;
        }

        @media (min-width: 1500px) {
            .workspace-content > .table-container,
            .dashboard-area + .table-container {
                min-height: calc(100vh - 128px) !important;
            }
        }

        /* Tabela em largura total abaixo do card Operacao */
        .main-wrapper {
            width: 100vw !important;
            max-width: none !important;
            margin: 0 !important;
            padding: 5px !important;
        }

        .layout-shell {
            display: grid !important;
            grid-template-columns: minmax(170px, 220px) minmax(0, 1fr) !important;
            gap: 5px !important;
            align-items: start !important;
            width: 100% !important;
        }

        .side-actions {
            grid-column: 1 !important;
            grid-row: 1 / span 2 !important;
            position: static !important;
            max-height: none !important;
            overflow: visible !important;
            padding-right: 0 !important;
        }

        .workspace-content {
            display: contents !important;
        }

        .workspace-content > .agenda-panel,
        .workspace-content > .documentos-panel,
        .workspace-content > .busca-rapida,
        .workspace-content > .dashboard-area {
            grid-column: 2 !important;
            min-width: 0 !important;
        }

        .workspace-content > .table-container,
        .dashboard-area + .table-container {
            grid-column: 1 / -1 !important;
            width: 100% !important;
            max-width: none !important;
            margin: 0 !important;
            min-height: calc(100vh - 184px) !important;
            max-height: calc(100vh - 56px) !important;
        }

        .workspace-content > .table-container table {
            width: max-content !important;
            min-width: 100% !important;
        }

        @media (min-width: 1500px) {
            .layout-shell {
                grid-template-columns: minmax(180px, 230px) minmax(0, 1fr) !important;
            }

            .workspace-content > .table-container,
            .dashboard-area + .table-container {
                min-height: calc(100vh - 174px) !important;
            }
        }

        @media (max-width: 1180px) {
            .workspace-content {
                display: grid !important;
            }

            .side-actions,
            .workspace-content > .agenda-panel,
            .workspace-content > .documentos-panel,
            .workspace-content > .busca-rapida,
            .workspace-content > .dashboard-area,
            .workspace-content > .table-container {
                grid-column: auto !important;
                grid-row: auto !important;
            }
        }

        /* Ajuste cirurgico: acoes da tabela e alinhamento do dashboard */
        .table-container td:last-child {
            white-space: nowrap !important;
            padding: 3px 4px !important;
        }

        .table-container .btn-acao {
            min-height: 18px !important;
            padding: 2px 4px !important;
            margin: 0 1px !important;
            font-size: 7.5px !important;
            line-height: 1 !important;
            border-radius: 4px !important;
            gap: 2px !important;
            vertical-align: middle !important;
        }

        .table-container .btn-acao i {
            font-size: 8px !important;
            margin-right: 1px !important;
        }

        .busca-rapida {
            padding-bottom: 4px !important;
        }

        .toolbar-extra {
            margin-top: 3px !important;
        }

        .dashboard-area {
            margin-top: -3px !important;
            align-self: start !important;
        }

        .dashboard-area #dashboardGrid.dashboard-horizontal {
            align-items: start !important;
        }
    </style>
</head>
<body>

<!-- Login Screen -->
<div id="loginScreen" class="login-screen">
    <div class="login-card">
        <div class="login-logo">
            <div class="logo-placeholder"><img class="company-logo" src="data:image/jpeg;base64,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" alt="Logo Dragão"></div>
            <h2>INTERLANDIA LTDA</h2>
            <p>Sistema de Gestão de Estoque</p>
        </div>
        <div class="input-group">
            <label><i class="fas fa-user"></i> Usuário</label>
            <input type="text" id="loginUser" placeholder="Digite seu usuário" value="admin">
        </div>
        <div class="input-group">
            <label><i class="fas fa-lock"></i> Senha</label>
            <input type="password" id="loginPass" placeholder="Digite sua senha" value="admin123">
        </div>
        <button class="btn-login" onclick="fazerLogin()"><i class="fas fa-sign-in-alt"></i> Entrar no Sistema</button>
        <div id="loginError" class="error-msg"></div>
        <div class="credenciais-info">
            <p><i class="fas fa-info-circle"></i> <strong>Credenciais de Acesso:</strong></p>
            <p>👑 Master: <strong>admin</strong> / <strong>admin123</strong></p>
            <p>👤 Motorista: <strong>motorista</strong> / <strong>123456</strong></p>
            <p>📋 Conferente: <strong>conferente</strong> / <strong>123456</strong></p>
            <p>🧾 Faturamento: <strong>faturamento</strong> / <strong>123456</strong></p>
            <p>🚚 Transportadora: <strong>transportadora</strong> / <strong>123456</strong></p>
            <p>📦 Encarregado: <strong>encarregado</strong> / <strong>123456</strong></p>
            <p>🏭 Almoxarifado: <strong>almoxarifado</strong> / <strong>123456</strong></p>
        </div>
    </div>
</div>

<!-- Main Application -->
<div id="appContainer" class="app-container">
    <div class="main-wrapper">
        <div class="app-header">
            <div class="logo-area">
                <div class="logo-placeholder"><img class="company-logo" src="data:image/jpeg;base64,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" alt="Logo Dragão"></div>
                <div><h1>INTERLANDIA LTDA</h1></div>
            </div>
            <div class="user-area">
                <div class="user-badge"><div class="user-avatar" id="userAvatar">A</div><div class="user-info"><h4 id="userNameDisplay">Carregando...</h4><span id="userRoleDisplay"></span></div></div>
                <span id="mysqlStatus" style="font-size:12px;color:#facc15;">🟡 Conectando MySQL...</span>
                <button class="btn-logout" onclick="fazerLogout()"><i class="fas fa-sign-out-alt"></i> Sair</button>
            </div>
        </div>
        
        <div class="layout-shell">
            <aside class="side-actions">
                <div class="side-actions-panel" id="adminActionsPanel">
                    <div class="side-actions-title"><i class="fas fa-sliders-h"></i> Administracao</div>
        <!-- Admin Bar -->
        <div id="adminBar" class="admin-bar" style="display: none;">
            <button class="btn-admin" id="btnAdminUsuarios" onclick="abrirModalUsuarios()"><i class="fas fa-users"></i> Gerenciar Usuários</button>
            <button class="btn-admin" id="btnAdminCliente" onclick="abrirModalCliente()"><i class="fas fa-building"></i> Cadastrar Cliente</button>
            <button class="btn-admin" id="btnAdminTransportadora" onclick="abrirModalTransportadora()"><i class="fas fa-truck"></i> Cadastrar Transportadora</button>
            <button class="btn-admin" id="btnAdminRepresentante" onclick="abrirModalRepresentante()"><i class="fas fa-user-tie"></i> Cadastrar Representante</button>
            <button class="btn-admin" id="btnAdminImportar" onclick="abrirModalImportar()"><i class="fas fa-file-import"></i> Importar CSV/Backup</button>
            <button class="btn-admin" id="btnAdminBackup" onclick="gerarBackup()"><i class="fas fa-database"></i> Backup</button>
            <button class="btn-admin" id="btnAdminReset" onclick="resetarDadosDemo()"><i class="fas fa-rotate-left"></i> Restaurar Demo</button>
        </div>
        
                </div>

                <div class="side-actions-panel">
                    <div class="side-actions-title"><i class="fas fa-route"></i> Operacao</div>
        <!-- Action Buttons -->
        <div class="action-buttons">
            <button class="btn-action btn-action-primary" id="btnNovaCarga" onclick="abrirModalNovaCarga()"><i class="fas fa-boxes"></i> NOVA CARGA</button>
            <button class="btn-action btn-action-warning" id="btnRetornoCarga" onclick="abrirModalRetornoCarga()"><i class="fas fa-undo-alt"></i> RETORNO DA CARGA</button>
            <button class="btn-action btn-action-purple" id="btnSaidaColeta" onclick="abrirModalSaidaColeta()"><i class="fas fa-truck"></i> SAÍDA PARA COLETAR VALE</button>
            <button class="btn-action btn-action-info" id="btnRetornoColeta" onclick="abrirModalRetornoColeta()"><i class="fas fa-undo-alt"></i> RETORNO DE COLETA</button>
            <button class="btn-action btn-action-success" id="btnAgendaTransportadora" onclick="alternarAgendaTransportadora()"><i class="fas fa-calendar-check"></i> AGENDA TRANSPORTADORA</button>
            <button class="btn-action btn-action-info" id="btnDocumentos" onclick="alternarDocumentosPanel()"><i class="fas fa-paperclip"></i> ANEXAR DOCUMENTO</button>
            <button class="btn-action btn-action-info" id="btnCadastroMotorista" onclick="abrirModalCadastroMotorista()"><i class="fas fa-id-card"></i> CADASTRAR MOTORISTA</button>
            <button class="btn-action btn-action-secondary" id="btnExportarRelatorio" onclick="exportarRelatorio()"><i class="fas fa-file-excel"></i> EXPORTAR RELATÓRIO</button>
        </div>

                </div>
            </aside>

            <main class="workspace-content">
        <!-- Agenda Transportadora -->
        <section id="agendaTransportadoraPanel" class="agenda-panel">
            <div class="agenda-header">
                <div>
                    <h3><i class="fas fa-calendar-check"></i> Agenda por Transportadora</h3>
                    <span>Agende coleta de nova carga ou descarrego, acompanhe os dias e mantenha tudo arquivado apos a baixa.</span>
                </div>
                <button class="btn-login" id="btnNovoAgendaTransportadora" style="width:auto; min-width:190px;" onclick="abrirModalAgendaTransportadora()"><i class="fas fa-plus"></i> Novo agendamento</button>
            </div>
            <div class="agenda-summary" id="agendaResumo"></div>
            <div class="agenda-board" id="agendaBoardTransportadora"></div>
            <div class="agenda-table-wrap" id="agendaLista"></div>
        </section>

        <section id="documentosPanel" class="agenda-panel documentos-panel">
            <div class="agenda-header">
                <div>
                    <h3><i class="fas fa-paperclip"></i> Anexar Documento</h3>
                    <span>Vincule CTE, CIOT ou Manifesto a uma carga, coleta ou descarrego.</span>
                </div>
            </div>
            <div class="modal-body">
                <div class="documentos-grid">
                    <div class="form-group">
                        <label class="required">Tipo de documento</label>
                        <select id="docTipo">
                            <option value="CTE">CTE</option>
                            <option value="CIOT">CIOT</option>
                            <option value="MANIFESTO">MANIFESTO</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Filtrar por origem</label>
                        <select id="docOrigem" onchange="atualizarRegistrosDocumento()">
                            <option value="todos">Cargas e descarregos</option>
                            <option value="carga">Cargas</option>
                            <option value="agenda">Agenda/descarrego</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Buscar</label>
                        <input type="text" id="docBusca" placeholder="NF, SAP, cliente, motorista ou placa" oninput="atualizarRegistrosDocumento()">
                    </div>
                </div>
                <div class="form-group">
                    <label class="required">Carga ou descarrego vinculado</label>
                    <select id="docRegistro" onchange="renderizarDocumentosAnexados()"></select>
                </div>
                <div class="documentos-grid">
                    <div class="form-group">
                        <label>Numero do documento</label>
                        <input type="text" id="docNumero" placeholder="Numero do CTE, CIOT ou Manifesto">
                    </div>
                    <div class="form-group">
                        <label class="required">Arquivo</label>
                        <input type="file" id="docArquivo" accept=".pdf,.jpg,.jpeg,.png,.doc,.docx,.xls,.xlsx,application/pdf,image/*">
                    </div>
                </div>
                <div class="form-group">
                    <label>Observacoes</label>
                    <textarea id="docObservacoes" rows="2" placeholder="Detalhes do documento, viagem, entrada ou saida"></textarea>
                </div>
                <button class="btn-login" style="width:auto; min-width:190px;" onclick="salvarDocumentoAnexo()"><i class="fas fa-save"></i> Salvar documento</button>
                <div id="documentosLista" class="documentos-lista"></div>
            </div>
        </section>
        
        <!-- Busca Rápida -->
        <div class="busca-rapida">
            <div class="busca-grid">
                <input type="text" id="buscaSAP" placeholder="🔍 Buscar por Nota Fiscal, SAP ou Cliente...">
                <button class="btn-buscar" onclick="buscarCarga()"><i class="fas fa-search"></i> Buscar</button>
            </div>
            <div id="resultadoBusca" style="margin-top: 12px; display: none;"></div>
            <div class="toolbar-extra">
                <button class="btn-mini" onclick="preencherBuscaStatus('ABERTO')">Ver abertos</button>
                <button class="btn-mini" onclick="preencherBuscaStatus('VALE PALLETE')">Ver vales</button>
                <button class="btn-mini" onclick="preencherBuscaStatus('EM COLETA')">Ver coletas</button>
                <button class="btn-mini" onclick="limparFiltros()">Mostrar tudo</button>
            </div>
        </div>
        
        <!-- Dashboard e filtros compactos -->
        <section class="dashboard-area">
        <div class="dashboard-horizontal" id="dashboardGrid"></div>

        <div class="filtros-container dashboard-filtros">
            <div class="filtros-header">
                <div>
                    <h3><i class="fas fa-filter"></i> Filtros do Relatorio</h3>
                    <span>Organize a consulta por cliente, status, local e periodo.</span>
                </div>
            </div>
            <div class="filtros-grid">
                <div class="filtro-field"><label>Cliente</label><select id="filtroCliente"><option>Todos os clientes</option></select></div>
                <div class="filtro-field"><label>Status</label><select id="filtroStatus"><option>Todos</option><option>ABERTO</option><option>CONCLUÍDO</option><option>VALE PALLETE</option><option>EM COLETA</option><option>CARGA BATIDA</option></select></div>
                <div class="filtro-field"><label>Cidade</label><select id="filtroCidade"><option>Todas as cidades</option></select></div>
                <div class="filtro-field"><label>UF</label><select id="filtroUF"><option>Todos os estados</option></select></div>
                <div class="filtro-field"><label>Data inicial</label><input type="date" id="filtroDataInicio" placeholder="Data inicial"></div>
                <div class="filtro-field"><label>Data final</label><input type="date" id="filtroDataFim" placeholder="Data final"></div>
            </div>
            <div class="filtros-botoes">
                <button class="btn-filtrar" onclick="aplicarFiltros()"><i class="fas fa-search"></i> Filtrar</button>
                <button class="btn-limpar" onclick="limparFiltros()"><i class="fas fa-eraser"></i> Limpar</button>
            </div>
        </div>
        </section>
        
        <!-- Tabela -->
        <div class="table-container">
            <table id="tabelaEstoque">
                <thead>
                    <tr>
                        <th>Nota Fiscal</th><th>SAP</th><th>Cliente</th><th>CNPJ</th><th>Cidade</th><th>UF</th>
                        <th>Motorista</th><th>Placa</th><th>Transportadora</th><th>Representante</th>
                        <th>Data Carga</th><th>Data Retorno</th><th>Data Saída Coleta</th><th>Data Retorno Coleta</th>
                        <th>Status</th><th>Dias</th><th>Qtde</th><th>Valor</th><th>Ações</th>
                    </tr>
                </thead>
                <tbody id="tabelaBody"><tr><td colspan="19" class="loading">📭 Carregando......</td></tr></tbody>
            </table>
        </div>
            </main>
        </div>
    </div>
</div>

<!-- Modal Nova Carga -->
<div id="modalNovaCarga" class="modal">
    <div class="modal-content modal-nova-carga-content">
        <div class="modal-header"><h2><i class="fas fa-boxes"></i> NOVA CARGA</h2><span class="modal-close" onclick="fecharModal('modalNovaCarga')">&times;</span></div>
        <div class="modal-body">
            <div class="form-row">
                <div class="form-group"><label class="required">Nota Fiscal</label><input type="text" id="cargaNotaFiscal"></div>
                <div class="form-group"><label>SAP</label><input type="text" id="cargaSAP"></div>
            </div>
            <div class="form-group"><label class="required">Nota Fiscal de Produto</label><input type="text" id="cargaNotaProduto" placeholder="Informe a NF do produto"></div>
            <div class="form-group"><label>Cliente</label><select id="cargaClienteSelect"><option value="">Selecione</option></select></div>
            <div class="form-group"><label>Ou novo cliente</label><input type="text" id="cargaClienteNovo"></div>
            <div class="form-group"><label>CNPJ</label><input type="text" id="cargaCNPJ"></div>
            <div class="form-group"><label>Endereço</label><input type="text" id="cargaEndereco"></div>
            <div class="form-row">
                <div class="form-group"><label>Cidade</label><input type="text" id="cargaCidade"></div>
                <div class="form-group"><label>UF</label><input type="text" id="cargaUF" maxlength="2"></div>
            </div>
            <div class="form-row">
                <div class="form-group"><label>Representante</label><select id="cargaRepresentanteSelect"></select></div>
                <div class="form-group"><label>Transportadora</label><select id="cargaTransportadoraSelect" onchange="verificarTransportadoraSelecionada()"></select></div>
            </div>
            <div class="form-group campo-condicao-transportadora" id="cargaCondicaoTransportadoraGrupo" style="display:none;">
                <label class="required">Condicao</label>
                <select id="cargaCondicaoTransportadora">
                    <option value="">Selecione</option>
                    <option value="Troca">Troca</option>
                    <option value="Casa">Casa</option>
                </select>
            </div>
            <div class="form-row">
                <div class="form-group"><label class="required">Motorista</label><input type="text" id="cargaMotorista" list="listaMotoristas"></div>
                <div class="form-group"><label class="required">Placa</label><input type="text" id="cargaPlaca" list="listaPlacas"></div>
            </div>
            <div class="form-row">
                <div class="form-group"><label>Tipo</label><select id="cargaTipo" onchange="atualizarQuantidadePorTipo()"><option value="paletizada">Paletizada</option><option value="nao_paletizada">Não Paletizada</option></select></div>
                <div class="form-group"><label class="required">Quantidade</label><div class="quantidade-container"><input type="number" id="cargaQtde"><div id="indicadorC" class="indicador-c" style="display:none;">C</div></div></div>
            </div>
            <div class="form-row">
                <div class="form-group"><label class="required">Valor Unitário (R$)</label><input type="number" id="cargaValorUnitario" value="100" step="0.01"></div>
            </div>
            <div id="alertaRestricaoNovaCarga" class="alerta-restricao" style="display:none; background:#2a1a1a; border-left:4px solid #dc3545; padding:10px; border-radius:8px; margin-top:12px;">
                <i class="fas fa-exclamation-triangle"></i> Este motorista so nao pode receber NOVA CARGA se o status dele estiver em ABERTO.
            </div>
            <div class="nova-carga-actions"><button class="btn-login" id="btnSalvarNovaCarga" onclick="salvarNovaCarga()"><i class="fas fa-save"></i> Salvar</button></div>
        </div>
    </div>
</div>
<datalist id="listaMotoristas"></datalist>
<datalist id="listaPlacas"></datalist>

<div id="modalRetornoCarga" class="modal"><div class="modal-content"><div class="modal-header"><h2><i class="fas fa-undo-alt"></i> RETORNO DA CARGA</h2><span class="modal-close" onclick="fecharModal('modalRetornoCarga')">&times;</span></div><div class="modal-body">
    <div class="form-group"><label class="required">Buscar por Nota Fiscal</label><input type="text" id="buscaRetornoNF" onkeyup="buscarCargaParaRetorno()"></div>
    <div id="cargasAbertasLista" style="margin-bottom:12px; max-height:180px; overflow-y:auto;"></div>
    <div id="dadosCargaRetorno" style="background:#0f1a24; padding:12px; border-radius:8px; margin-bottom:12px; display:none;"></div>
    <div class="form-group"><label class="required">Data do Retorno</label><input type="date" id="retornoData"></div>
    <div class="opcoes-retorno" id="opcoesRetorno"><div class="opcao-retorno" onclick="selecionarOpcaoRetorno('concluido')" id="opcaoConcluido"><i class="fas fa-check-circle" style="color:#28a745;"></i><h3>VOLTOU PALETE</h3></div><div class="opcao-retorno" onclick="selecionarOpcaoRetorno('vale')" id="opcaoVale"><i class="fas fa-ticket-alt" style="color:#8b5cf6;"></i><h3>VALE PALLETE</h3></div><div class="opcao-retorno" onclick="selecionarOpcaoRetorno('batida')" id="opcaoBatida"><i class="fas fa-car-burst" style="color:#dc3545;"></i><h3>CARGA BATIDA</h3></div></div>
    <div id="motivoValeDiv" style="display:none;"><div class="form-group"><label class="required">Motivo do Vale</label><textarea id="motivoVale" rows="2"></textarea></div></div>
    <button class="btn-login" onclick="confirmarRetorno()">Confirmar</button>
</div></div></div>

<div id="modalSaidaColeta" class="modal"><div class="modal-content"><div class="modal-header"><h2><i class="fas fa-truck"></i> SAÍDA PARA COLETAR VALE</h2><span class="modal-close" onclick="fecharModal('modalSaidaColeta')">&times;</span></div><div class="modal-body">
    <div class="form-group"><label class="required">Buscar por SAP ou NF</label><input type="text" id="buscaSaidaNF" onkeyup="buscarValeParaSaida()"></div>
    <div id="valesLista" style="margin-bottom:12px; max-height:180px; overflow-y:auto;"></div>
    <div id="dadosValeSaida" style="background:#0f1a24; padding:12px; border-radius:8px; margin-bottom:12px; display:none;"></div>
    <div class="form-group"><label class="required">Data de Saída</label><input type="date" id="saidaData"></div>
    <button class="btn-login" onclick="confirmarSaidaColeta()">Confirmar</button>
</div></div></div>

<div id="modalRetornoColeta" class="modal"><div class="modal-content"><div class="modal-header"><h2><i class="fas fa-undo-alt"></i> RETORNO DE COLETA</h2><span class="modal-close" onclick="fecharModal('modalRetornoColeta')">&times;</span></div><div class="modal-body">
    <div class="form-group"><label class="required">Buscar por SAP ou NF</label><input type="text" id="buscaRetornoNFColeta" onkeyup="buscarEmColetaParaRetorno()"></div>
    <div id="emColetaLista" style="margin-bottom:12px; max-height:180px; overflow-y:auto;"></div>
    <div id="dadosRetornoColeta" style="background:#0f1a24; padding:12px; border-radius:8px; margin-bottom:12px; display:none;"></div>
    <div class="form-group"><label class="required">Data de Retorno</label><input type="date" id="retornoColetaData"></div>
    <div class="opcoes-retorno" id="opcoesRetornoColeta"><div class="opcao-retorno" onclick="selecionarOpcaoRetornoColeta('coletado')" id="opcaoColetado"><i class="fas fa-check-circle" style="color:#28a745;"></i><h3>✅ COLETADO</h3></div><div class="opcao-retorno" onclick="selecionarOpcaoRetornoColeta('nao_coletado')" id="opcaoNaoColetado"><i class="fas fa-times-circle" style="color:#dc3545;"></i><h3>❌ NÃO COLETADO</h3></div></div>
    <div id="motivoNaoColetadoDiv" style="display:none;"><div class="form-group"><label class="required">Motivo</label><textarea id="motivoNaoColetado" rows="2"></textarea></div></div>
    <button class="btn-login" onclick="confirmarRetornoColeta()">Confirmar</button>
</div></div></div>

<div id="modalEditarCarga" class="modal"><div class="modal-content"><div class="modal-header"><h2><i class="fas fa-edit"></i> EDITAR CARGA</h2><span class="modal-close" onclick="fecharModal('modalEditarCarga')">&times;</span></div><div class="modal-body">
    <input type="hidden" id="editCargaId">
    <div class="form-row"><div class="form-group"><label class="required">Nota Fiscal</label><input type="text" id="editNotaFiscal"></div><div class="form-group"><label>SAP</label><input type="text" id="editSap"></div></div>
    <div class="form-group"><label>Cliente</label><select id="editClienteSelect"></select></div>
    <div class="form-group"><label>Ou novo cliente</label><input type="text" id="editClienteNovo"></div>
    <div class="form-group"><label>CNPJ</label><input type="text" id="editCnpj"></div>
    <div class="form-group"><label>Endereço</label><input type="text" id="editEndereco"></div>
    <div class="form-row"><div class="form-group"><label>Cidade</label><input type="text" id="editCidade"></div><div class="form-group"><label>UF</label><input type="text" id="editUf" maxlength="2"></div></div>
    <div class="form-row"><div class="form-group"><label>Representante</label><select id="editRepresentanteSelect"></select></div><div class="form-group"><label>Transportadora</label><select id="editTransportadoraSelect"></select></div></div>
    <div class="form-row"><div class="form-group"><label>Motorista</label><input type="text" id="editMotorista"></div><div class="form-group"><label>Placa</label><input type="text" id="editPlaca"></div></div>
    <div class="form-row"><div class="form-group"><label>Tipo</label><select id="editTipo"><option value="paletizada">Paletizada</option><option value="nao_paletizada">Não Paletizada</option></select></div><div class="form-group"><label>Quantidade</label><input type="number" id="editQtde"></div></div>
    <div class="form-row"><div class="form-group"><label>Valor Unitário</label><input type="number" id="editValorUnitario" step="0.01"></div><div class="form-group"><label>Status</label><select id="editStatus"><option value="ABERTO">ABERTO</option><option value="CONCLUÍDO">CONCLUÍDO</option><option value="VALE PALLETE">VALE PALLETE</option><option value="EM COLETA">EM COLETA</option><option value="CARGA BATIDA">CARGA BATIDA</option></select></div></div>
    <div class="form-row"><div class="form-group"><label>Data Carga</label><input type="date" id="editDataCarga"></div><div class="form-group"><label>Data Retorno</label><input type="date" id="editDataRetorno"></div></div>
    <div class="form-row"><div class="form-group"><label>Data Saída Coleta</label><input type="date" id="editDataSaidaColeta"></div><div class="form-group"><label>Data Retorno Coleta</label><input type="date" id="editDataRetornoColeta"></div></div>
    <div class="form-group"><label>Observações</label><textarea id="editObservacoes" rows="2"></textarea></div>
    <div style="background:#1a3a2a; padding:10px; border-radius:8px; margin-top:10px;"><i class="fas fa-exclamation-triangle"></i> Apenas Master pode editar!</div>
    <button class="btn-login" onclick="salvarEdicaoCarga()">Salvar</button>
</div></div></div>

<div id="modalCliente" class="modal"><div class="modal-content"><div class="modal-header"><h2>Cadastrar Cliente</h2><span class="modal-close" onclick="fecharModal('modalCliente')">&times;</span></div><div class="modal-body">
    <div class="form-group"><label class="required">Razão Social</label><input type="text" id="clienteRazao"></div>
    <div class="form-group"><label class="required">CNPJ</label><input type="text" id="clienteCNPJ" oninput="formatarCNPJ(this)"></div>
    <div class="form-group"><label>Telefone</label><input type="text" id="clienteTelefone"></div>
    <div class="form-group"><label>Endereço</label><input type="text" id="clienteEndereco"></div>
    <div class="form-row"><div class="form-group"><label>Cidade</label><input type="text" id="clienteCidade"></div><div class="form-group"><label>UF</label><input type="text" id="clienteUF" maxlength="2"></div></div>
    <button class="btn-login" onclick="salvarCliente()">Salvar</button>
</div></div></div>

<div id="modalTransportadora" class="modal"><div class="modal-content"><div class="modal-header"><h2>Cadastrar Transportadora</h2><span class="modal-close" onclick="fecharModal('modalTransportadora')">&times;</span></div><div class="modal-body">
    <div class="form-group"><label class="required">Nome</label><input type="text" id="transpNome"></div>
    <div class="form-group"><label>CNPJ</label><input type="text" id="transpCNPJ" oninput="formatarCNPJ(this)"></div>
    <div class="form-group"><label>Telefone</label><input type="text" id="transpTelefone"></div>
    <div class="form-group"><label>Contato</label><input type="text" id="transpContato"></div>
    <div class="form-row">
        <div class="form-group"><label>Motorista</label><input type="text" id="transpMotorista"></div>
        <div class="form-group"><label>Carro/Placa</label><input type="text" id="transpCarro"></div>
    </div>
    <div class="form-group"><label>Outros motoristas e carros</label><textarea id="transpFrota" rows="3" placeholder="Um por linha: MOTORISTA - PLACA"></textarea></div>
    <button class="btn-login" onclick="salvarTransportadora()">Salvar</button>
</div></div></div>

<div id="modalCadastroMotorista" class="modal"><div class="modal-content"><div class="modal-header"><h2><i class="fas fa-id-card"></i> CADASTRAR MOTORISTA</h2><span class="modal-close" onclick="fecharModal('modalCadastroMotorista')">&times;</span></div><div class="modal-body">
    <div class="form-row"><div class="form-group"><label>Transportadora</label><input type="text" id="motoristaTransportadoraNome" readonly></div><div class="form-group"><label class="required">Nome do motorista</label><input type="text" id="motoristaNomeCadastro"></div></div>
    <div class="form-row"><div class="form-group"><label>CPF</label><input type="text" id="motoristaCPF"></div><div class="form-group"><label class="required">CNH</label><input type="text" id="motoristaCNH"></div></div>
    <div class="form-row"><div class="form-group"><label>Telefone</label><input type="text" id="motoristaTelefone"></div><div class="form-group"><label>Validade CNH</label><input type="date" id="motoristaValidadeCNH"></div></div>
    <div class="form-row"><div class="form-group"><label class="required">Tipo de veiculo</label><select id="motoristaTipoVeiculo"><option value="Truck">Truck</option><option value="Carreta">Carreta</option><option value="Caminhao">Caminhao</option></select></div><div class="form-group"><label class="required">Placa principal</label><input type="text" id="motoristaPlacaPrincipal"></div></div>
    <div class="form-row"><div class="form-group"><label>Placa carreta</label><input type="text" id="motoristaPlacaCarreta"></div><div class="form-group"><label>Modelo/Marca</label><input type="text" id="motoristaModeloVeiculo"></div></div>
    <div class="form-row"><div class="form-group"><label>Ano</label><input type="number" id="motoristaAnoVeiculo"></div><div class="form-group"><label>Renavam</label><input type="text" id="motoristaRenavam"></div></div>
    <div class="form-group"><label>Observacoes</label><textarea id="motoristaObservacoes" rows="3" placeholder="Dados adicionais da carreta, truck, documentos ou contato"></textarea></div>
    <button class="btn-login" onclick="salvarCadastroMotorista()"><i class="fas fa-save"></i> Salvar motorista</button>
    <hr><div id="listaMotoristasTransportadora"></div>
</div></div></div>

<div id="modalRepresentante" class="modal"><div class="modal-content"><div class="modal-header"><h2>Cadastrar Representante</h2><span class="modal-close" onclick="fecharModal('modalRepresentante')">&times;</span></div><div class="modal-body">
    <div class="form-group"><label class="required">Nome</label><input type="text" id="repNome"></div>
    <div class="form-group"><label>Telefone</label><input type="text" id="repTelefone"></div>
    <div class="form-group"><label>Email</label><input type="email" id="repEmail"></div>
    <div class="form-group"><label>Região</label><input type="text" id="repRegiao"></div>
    <button class="btn-login" onclick="salvarRepresentante()">Salvar</button>
</div></div></div>

<div id="modalUsuarios" class="modal"><div class="modal-content"><div class="modal-header"><h2>Gerenciar Usuários</h2><span class="modal-close" onclick="fecharModal('modalUsuarios')">&times;</span></div><div class="modal-body">
    <div id="listaUsuarios"></div><hr><h3>Novo Usuário</h3>
    <div class="form-row"><div class="form-group"><label>Usuário</label><input type="text" id="novoUser"></div><div class="form-group"><label>Senha</label><input type="text" id="novaSenha"></div></div>
    <div class="form-row"><div class="form-group"><label>Nome</label><input type="text" id="novoNome"></div><div class="form-group"><label>Perfil</label><select id="novoPerfil"><option value="user">👤 Motorista</option><option value="conferente">📋 Conferente</option><option value="encarregado">📦 Encarregado</option><option value="almoxarifado">🏭 Almoxarifado</option><option value="transportadora">🚚 Transportadora</option><option value="faturamento">🧾 Faturamento</option><option value="master">👑 Master</option></select></div></div>
    <div class="form-group"><label>Transportadora vinculada</label><select id="novoTransportadoraUsuario"><option value="">Selecione apenas para perfil Transportadora</option></select></div>
    <div class="form-group"><label>Permissoes</label><div class="permissoes-toolbar"><button class="btn-mini" onclick="marcarPermissoesUsuario('novoPermissoesUsuario', true)">Marcar todas</button><button class="btn-mini" onclick="marcarPermissoesUsuario('novoPermissoesUsuario', false)">Limpar</button></div><div id="novoPermissoesUsuario" class="permissoes-grid"></div></div>
    <button class="btn-login" onclick="criarUsuario()">Criar</button>
    <hr><div id="editarUsuarioPanel" style="display:none;"><h3>Editar Usuário</h3><input type="hidden" id="editUserId">
    <div class="form-row"><div class="form-group"><label>Usuário</label><input type="text" id="editUserName"></div><div class="form-group"><label>Senha</label><input type="text" id="editUserPassword"></div></div>
    <div class="form-row"><div class="form-group"><label>Nome</label><input type="text" id="editUserNome"></div><div class="form-group"><label>Perfil</label><select id="editUserPerfil"><option value="user">Motorista</option><option value="conferente">Conferente</option><option value="encarregado">Encarregado</option><option value="almoxarifado">Almoxarifado</option><option value="transportadora">Transportadora</option><option value="faturamento">Faturamento</option><option value="master">Master</option></select></div></div>
    <div class="form-group"><label>Transportadora vinculada</label><select id="editUserTransportadora"><option value="">Selecione apenas para perfil Transportadora</option></select></div>
    <div class="form-group"><label>Permissoes</label><div class="permissoes-toolbar"><button class="btn-mini" onclick="marcarPermissoesUsuario('editPermissoesUsuario', true)">Marcar todas</button><button class="btn-mini" onclick="marcarPermissoesUsuario('editPermissoesUsuario', false)">Limpar</button></div><div id="editPermissoesUsuario" class="permissoes-grid"></div></div>
    <button class="btn-login" onclick="salvarEdicaoUsuario()">Salvar</button>
    <button class="btn-login" style="background:#6c757d;" onclick="cancelarEdicaoUsuario()">Cancelar</button></div>
</div></div></div>


<div id="modalImportar" class="modal"><div class="modal-content"><div class="modal-header"><h2><i class="fas fa-file-import"></i> IMPORTAR CSV OU BACKUP</h2><span class="modal-close" onclick="fecharModal('modalImportar')">&times;</span></div><div class="modal-body">
    <div class="form-group"><label>Arquivo CSV de cargas ou backup .json</label><input type="file" id="arquivoImportar" accept=".csv,.json,text/csv,application/json"></div>
    <p style="color:#8a9dc0;font-size:13px;line-height:1.5;">CSV aceito com colunas: Nota Fiscal; SAP; Cliente; CNPJ; Cidade; UF; Motorista; Placa; Transportadora; Representante; Quantidade; Valor Total. Backup JSON restaura todo o banco local.</p>
    <div class="form-group"><label><input type="checkbox" id="importarSubstituir" style="width:auto;margin-right:8px;"> Substituir dados atuais ao importar backup JSON</label></div>
    <button class="btn-login" onclick="processarImportacao()"><i class="fas fa-upload"></i> Importar Agora</button>
</div></div></div>

<div id="modalAgendaTransportadora" class="modal"><div class="modal-content"><div class="modal-header"><h2><i class="fas fa-calendar-check"></i> AGENDAR TRANSPORTADORA</h2><span class="modal-close" onclick="fecharModal('modalAgendaTransportadora')">&times;</span></div><div class="modal-body">
    <div class="form-row">
        <div class="form-group"><label class="required">Tipo de agenda</label><select id="agendaTipo" onchange="atualizarCamposAgendaTransportadora()"><option value="coleta">NOVA CARGA</option><option value="descarrego">Agendar descarrego</option></select></div>
        <div class="form-group"><label class="required">Data da agenda</label><input type="datetime-local" id="agendaData"></div>
    </div>
    <div class="form-group"><label class="required">Transportadora</label><input type="text" id="agendaTransportadoraNome" list="listaAgendaTransportadoras" placeholder="Nome da transportadora"></div>
    <datalist id="listaAgendaTransportadoras"></datalist>
    <div class="form-row">
        <div class="form-group"><label class="required">Motorista</label><input type="text" id="agendaMotorista" list="listaMotoristas" placeholder="Nome do motorista"></div>
        <div class="form-group"><label class="required">Placa</label><input type="text" id="agendaPlaca" list="listaPlacas" placeholder="Placa do veiculo"></div>
    </div>
    <div class="form-row">
        <div class="form-group"><label class="required">Veiculo</label><select id="agendaVeiculo"><option value="Caminhao">Caminhao</option><option value="Carreta">Carreta</option><option value="Truck">Truck</option></select></div>
        <div class="form-group"><label class="required">Tipo de carga</label><select id="agendaTipoCarga"><option value="Palete">Palete</option><option value="Carga batida">Carga batida</option><option value="Materia prima">Carga materia prima</option></select></div>
    </div>
    <div class="form-row">
        <div class="form-group"><label class="required">Quantidade</label><input type="number" id="agendaQuantidade" min="0" step="1" placeholder="Quantidade"></div>
        <div class="form-group" id="agendaNotaProdutoGrupo"><label class="required">Nota fiscal do produto</label><input type="text" id="agendaNotaProduto" placeholder="NF do produto"></div>
    </div>
    <div class="form-row" id="agendaNotaPaleteGrupo">
        <div class="form-group"><label class="required">Nota fiscal de palete</label><input type="text" id="agendaNotaPalete" placeholder="NF do palete"></div>
        <input type="hidden" id="agendaNotaFiscal">
    </div>
    <div class="form-group"><label class="required" id="agendaClienteLabel">Cliente</label><input type="text" id="agendaCliente" list="listaAgendaClientes" placeholder="Cliente que vai fazer a coleta"></div>
    <datalist id="listaAgendaClientes"></datalist>
    <div class="form-group"><label>Observacoes</label><textarea id="agendaObservacoes" rows="2" placeholder="Detalhes de janela, doca, contato ou prioridade"></textarea></div>
    <button class="btn-login" onclick="salvarAgendaTransportadora()"><i class="fas fa-save"></i> Salvar agendamento</button>
</div></div></div>

<script>
// ============================================
// BANCO DE DADOS LOCAL
// ============================================
let bancoDados = {
    users: [
        { id: 1, username: "admin", password: "admin123", role: "master", nome: "Administrador Master" },
        { id: 2, username: "motorista", password: "123456", role: "user", nome: "João Motorista" },
        { id: 3, username: "conferente", password: "123456", role: "conferente", nome: "Conferente de Cargas" },
        { id: 4, username: "encarregado", password: "123456", role: "encarregado", nome: "Encarregado" },
        { id: 5, username: "almoxarifado", password: "123456", role: "almoxarifado", nome: "Almoxarifado" },
        { id: 6, username: "transportadora", password: "123456", role: "transportadora", nome: "Transportadora" },
        { id: 7, username: "faturamento", password: "123456", role: "faturamento", nome: "Faturamento" }
    ],
    clientes: [
        { id: 1, razao: "ATACADAO S/A", cnpj: "75.315.333/0312-50", telefone: "(81) 99999-9999", endereco: "RODOVIA PE, 7KM", cidade: "JABOATÃO", uf: "PE" },
        { id: 2, razao: "SENDAS DISTRIBUIDORA S/A", cnpj: "06.057.223/0519-90", telefone: "(81) 88888-8888", endereco: "RUA BENFICA, 715", cidade: "RECIFE", uf: "PE" },
        { id: 3, razao: "MATEUS SUPERMERCADOS LTDA", cnpj: "12.345.678/0001-90", telefone: "(81) 77777-7777", endereco: "AVENIDA CENTRAL, 100", cidade: "OLINDA", uf: "PE" },
        { id: 4, razao: "SUPERMERCADO DA FAMILIA", cnpj: "98.765.432/0001-10", telefone: "(81) 66666-6666", endereco: "RUA DAS FLORES, 50", cidade: "PAULISTA", uf: "PE" },
        { id: 5, razao: "CAZAM ATACADA S/A", cnpj: "11.111.111/0001-11", telefone: "(81) 55555-5555", endereco: "AVENIDA PRINCIPAL, 200", cidade: "CAMARAGIBE", uf: "PE" }
    ],
    transportadoras: [
        { id: 1, nome: "INTERLANDIA", cnpj: "12.345.678/0001-90", telefone: "(11) 99999-9999", contato: "João Silva", frota: [{ motorista: "CARLOS", carro: "PFC-8113" }, { motorista: "WAGNER", carro: "KIK-3022" }] },
        { id: 2, nome: "WELLITON", cnpj: "98.765.432/0001-10", telefone: "(11) 88888-8888", contato: "Maria Souza", frota: [{ motorista: "FILIPI", carro: "III-7C06" }, { motorista: "EDUARDO", carro: "EDU-5678" }] }
    ],
    representantes: [
        { id: 1, nome: "DIOGO DANTAS", telefone: "(81) 97777-7777", email: "diogo@email.com", regiao: "Nordeste" },
        { id: 2, nome: "MARCOS ALVES", telefone: "(81) 96666-6666", email: "marcos@email.com", regiao: "Nordeste" }
    ],
    cargas: [
        { id: 1, notaFiscal: "NF-2025001", sap: "1004", clienteId: 1, clienteNome: "ATACADAO S/A", cnpj: "75.315.333/0312-50", endereco: "RODOVIA PE, 7KM", uf: "PE", representanteId: 1, representanteNome: "DIOGO DANTAS", transportadoraId: 1, transportadoraNome: "INTERLANDIA", tipo: "paletizada", qtde: 56, valorUnitario: 150, valorTotal: 8400, motorista: "CARLOS", placa: "PFC-8113", dataCarga: new Date(Date.now() - 5*24*60*60*1000).toISOString(), dataRetorno: null, dataSaidaColeta: null, dataRetornoColeta: null, status: "ABERTO", observacoes: "", motivoVale: "", motivoNaoColetado: "" },
        { id: 2, notaFiscal: "NF-2025002", sap: "990", clienteId: 2, clienteNome: "SENDAS DISTRIBUIDORA S/A", cnpj: "06.057.223/0519-90", endereco: "RUA BENFICA, 715", uf: "PE", representanteId: 2, representanteNome: "MARCOS ALVES", transportadoraId: 2, transportadoraNome: "WELLITON", tipo: "paletizada", qtde: 28, valorUnitario: 150, valorTotal: 4200, motorista: "FILIPI", placa: "III-7C06", dataCarga: new Date(Date.now() - 10*24*60*60*1000).toISOString(), dataRetorno: new Date(Date.now() - 3*24*60*60*1000).toISOString(), dataSaidaColeta: null, dataRetornoColeta: null, status: "CONCLUÍDO", observacoes: "", motivoVale: "", motivoNaoColetado: "" },
        { id: 3, notaFiscal: "NF-2025003", sap: "1074", clienteId: 3, clienteNome: "MATEUS SUPERMERCADOS LTDA", cnpj: "12.345.678/0001-90", endereco: "AVENIDA CENTRAL, 100", uf: "PE", representanteId: 1, representanteNome: "DIOGO DANTAS", transportadoraId: 1, transportadoraNome: "INTERLANDIA", tipo: "paletizada", qtde: 28, valorUnitario: 120, valorTotal: 3360, motorista: "WAGNER", placa: "KIK-3022", dataCarga: new Date(Date.now() - 45*24*60*60*1000).toISOString(), dataRetorno: null, dataSaidaColeta: null, dataRetornoColeta: null, status: "ABERTO", observacoes: "", motivoVale: "", motivoNaoColetado: "" },
        { id: 4, notaFiscal: "NF-2025004", sap: "1050", clienteId: 4, clienteNome: "SUPERMERCADO DA FAMILIA", cnpj: "98.765.432/0001-10", endereco: "RUA DAS FLORES, 50", uf: "PE", representanteId: 2, representanteNome: "MARCOS ALVES", transportadoraId: 1, transportadoraNome: "INTERLANDIA", tipo: "nao_paletizada", qtde: 16, valorUnitario: 100, valorTotal: 1600, motorista: "ROBERTO", placa: "ROB-1234", dataCarga: new Date(Date.now() - 20*24*60*60*1000).toISOString(), dataRetorno: null, dataSaidaColeta: null, dataRetornoColeta: null, status: "ABERTO", observacoes: "", motivoVale: "", motivoNaoColetado: "" },
        { id: 5, notaFiscal: "NF-2025005", sap: "1066", clienteId: 1, clienteNome: "ATACADAO S/A", cnpj: "75.315.333/0312-50", endereco: "RODOVIA PE, 7KM", uf: "PE", representanteId: 1, representanteNome: "DIOGO DANTAS", transportadoraId: 2, transportadoraNome: "WELLITON", tipo: "paletizada", qtde: 56, valorUnitario: 150, valorTotal: 8400, motorista: "EDUARDO", placa: "EDU-5678", dataCarga: new Date(Date.now() - 12*24*60*60*1000).toISOString(), dataRetorno: new Date(Date.now() - 8*24*60*60*1000).toISOString(), dataSaidaColeta: null, dataRetornoColeta: null, status: "CONCLUÍDO", observacoes: "", motivoVale: "", motivoNaoColetado: "" }
    ],
    agendaTransportadora: [],
    motoristasTransportadora: [],
    documentosAnexados: []
};

const bancoDadosPadrao = JSON.parse(JSON.stringify(bancoDados));
let usuarioAtual = null;
let cargasFiltradas = [];
let filtrosAtivos = false;
let listaMotoristasRegistrados = [];
let listaPlacasRegistradas = [];
let opcaoRetornoSelecionada = null;
let opcaoRetornoColetaSelecionada = null;
let cargaSelecionadaRetorno = null;
let cargaSelecionadaSaida = null;
let cargaSelecionadaRetornoColeta = null;
let agendaTempoRealTimer = null;

// ============================================
// FUNÇÕES UTILITÁRIAS
// ============================================
let mysqlAtivo = false;
let salvandoMysql = false;

const PERMISSOES_SISTEMA = {
    cadastrarBasico: 'Cadastrar clientes/transportadoras/representantes',
    operarCargas: 'Operar nova carga e retorno',
    criarAgenda: 'Criar agenda transportadora',
    baixarAgenda: 'Dar baixa na agenda',
    cadastrarMotorista: 'Cadastrar motorista/veiculo',
    exportarRelatorio: 'Exportar relatorio',
    saidaColeta: 'Saida para coletar vale',
    retornoColeta: 'Retorno de coleta',
    importarBackup: 'Importar backup/CSV',
    gerarBackup: 'Gerar backup',
    resetDemo: 'Restaurar demo'
};

const PERMISSOES_PADRAO = {
    master: Object.fromEntries(Object.keys(PERMISSOES_SISTEMA).map(k => [k, true])),
    faturamento: { cadastrarBasico: true, exportarRelatorio: true },
    user: { operarCargas: true, exportarRelatorio: true },
    conferente: { operarCargas: true, exportarRelatorio: true },
    transportadora: { criarAgenda: true, cadastrarMotorista: true },
    encarregado: { baixarAgenda: true },
    almoxarifado: { baixarAgenda: true }
};

function permissoesPadraoPorPerfil(role) {
    return { ...(PERMISSOES_PADRAO[role] || {}) };
}

function temPermissao(chave, user = usuarioAtual) {
    if (!user) return false;
    if (user.role === 'master') return true;
    if (Object.prototype.hasOwnProperty.call(user.permissoes || {}, chave)) return user.permissoes[chave] === true;
    return permissoesPadraoPorPerfil(user.role)[chave] === true;
}

function garantirEstruturaBanco() {
    if (!Array.isArray(bancoDados.users)) bancoDados.users = [];
    if (!Array.isArray(bancoDados.clientes)) bancoDados.clientes = [];
    if (!Array.isArray(bancoDados.transportadoras)) bancoDados.transportadoras = [];
    if (!Array.isArray(bancoDados.representantes)) bancoDados.representantes = [];
    if (!Array.isArray(bancoDados.cargas)) bancoDados.cargas = [];
    if (!Array.isArray(bancoDados.agendaTransportadora)) bancoDados.agendaTransportadora = [];
    if (!Array.isArray(bancoDados.motoristasTransportadora)) bancoDados.motoristasTransportadora = [];
    if (!Array.isArray(bancoDados.documentosAnexados)) bancoDados.documentosAnexados = [];
    if (!Array.isArray(bancoDados.usuariosPadraoRemovidos)) bancoDados.usuariosPadraoRemovidos = [];
    bancoDados.users.forEach(u => { if (!u.permissoes) u.permissoes = permissoesPadraoPorPerfil(u.role); });
    garantirUsuarioPadrao("encarregado", "123456", "encarregado", "Encarregado");
    garantirUsuarioPadrao("almoxarifado", "123456", "almoxarifado", "Almoxarifado");
    garantirUsuarioPadrao("transportadora", "123456", "transportadora", "Transportadora");
    garantirUsuarioPadrao("faturamento", "123456", "faturamento", "Faturamento");
    vincularUsuarioTransportadoraPadrao("transportadora", "WELLITON");
}

function garantirUsuarioPadrao(username, password, role, nome) {
    if ((bancoDados.usuariosPadraoRemovidos || []).includes(username)) return;
    if (bancoDados.users.some(u => u.username === username)) return;
    const id = bancoDados.users.reduce((maior, u) => Math.max(maior, Number(u.id) || 0), 0) + 1;
    bancoDados.users.push({ id, username, password, role, nome, permissoes: permissoesPadraoPorPerfil(role) });
}

function vincularUsuarioTransportadoraPadrao(username, nomeTransportadora) {
    const user = bancoDados.users.find(u => u.username === username && u.role === 'transportadora');
    if (!user || user.transportadoraId) return;
    const transportadora = bancoDados.transportadoras.find(t => normalizarAgendaValor(t.nome) === normalizarAgendaValor(nomeTransportadora));
    if (!transportadora) return;
    user.transportadoraId = transportadora.id;
    user.transportadoraNome = transportadora.nome;
    if (!user.nome || normalizarAgendaValor(user.nome) === 'TRANSPORTADORA') user.nome = transportadora.nome;
}

function mostrarStatusMysql(txt, ok = true) {
    const el = document.getElementById('mysqlStatus');
    if (el) {
        el.innerHTML = ok ? `🟢 ${txt}` : `🟡 ${txt}`;
        el.style.color = ok ? '#22c55e' : '#facc15';
    }
}

function salvarBanco() {
    garantirEstruturaBanco();
    bancoDados.ultimaAtualizacao = new Date().toISOString();
    localStorage.setItem("interlandia_estoque", JSON.stringify(bancoDados));
    atualizarListas();
    if (typeof atualizarAgendaTransportadora === 'function') atualizarAgendaTransportadora();
    salvarBancoMySQL();
}

function carregarBanco() {
    const saved = localStorage.getItem("interlandia_estoque");
    if (saved) {
        try { bancoDados = JSON.parse(saved); } catch(e) {}
    }
    garantirEstruturaBanco();
    atualizarListas();
}

async function carregarBancoMySQL() {
    try {
        const resp = await fetch('backend/sync.php?acao=carregar', { cache: 'no-store' });
        if (!resp.ok) throw new Error('HTTP ' + resp.status);
        const json = await resp.json();
        if (json.ok && json.dados) {
            bancoDados = json.dados;
            garantirEstruturaBanco();
            localStorage.setItem("interlandia_estoque", JSON.stringify(bancoDados));
            mysqlAtivo = true;
            atualizarListas();
            if (typeof carregarSelects === 'function') carregarSelects();
            if (typeof atualizarDashboard === 'function') atualizarDashboard();
            if (typeof atualizarTabela === 'function') atualizarTabela();
            if (typeof atualizarAgendaTransportadora === 'function') atualizarAgendaTransportadora();
            mostrarStatusMysql('MySQL conectado');
        } else {
            mysqlAtivo = true;
            await salvarBancoMySQL(true);
            mostrarStatusMysql('MySQL inicializado');
        }
    } catch (e) {
        mysqlAtivo = false;
        mostrarStatusMysql('Usando localStorage - verifique XAMPP/MySQL', false);
        console.warn('MySQL indisponível:', e);
    }
}

async function salvarBancoMySQL(forcar = false) {
    if (salvandoMysql) return;
    if (!mysqlAtivo && !forcar) return;
    salvandoMysql = true;
    try {
        const resp = await fetch('backend/sync.php?acao=salvar', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ dados: bancoDados })
        });
        const json = await resp.json();
        if (!json.ok) throw new Error(json.erro || 'Erro ao salvar');
        mysqlAtivo = true;
        mostrarStatusMysql('Salvo no MySQL');
    } catch (e) {
        mostrarStatusMysql('Erro ao salvar no MySQL - salvo localmente', false);
        console.warn('Falha ao salvar no MySQL:', e);
    } finally {
        salvandoMysql = false;
    }
}

carregarBanco();
window.addEventListener('DOMContentLoaded', carregarBancoMySQL);

function formatarMoeda(v) { return new Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' }).format(v); }
function formatarData(d) { if (!d) return '-'; return new Date(d).toLocaleDateString('pt-BR'); }
function calcularDias(ref) { if (!ref) return 0; return Math.ceil(Math.abs(new Date() - new Date(ref)) / (1000 * 60 * 60 * 24)); }
function mostrarToast(msg, tipo = 'success') { const icons = { success: 'fa-check-circle', error: 'fa-exclamation-circle', info: 'fa-info-circle', warning: 'fa-triangle-exclamation' }; const toast = document.createElement('div'); toast.className = 'toast'; toast.innerHTML = `<i class="fas ${icons[tipo]}"></i> ${msg}`; document.body.appendChild(toast); setTimeout(() => toast.remove(), 3000); }
function getStatusBadge(s) { const b = { 'ABERTO': '<span class="badge badge-aberto">🟡 ABERTO</span>', 'CONCLUÍDO': '<span class="badge badge-concluido">✅ CONCLUÍDO</span>', 'VALE PALLETE': '<span class="badge badge-vale">🎫 VALE PALLETE</span>', 'EM COLETA': '<span class="badge badge-em-coleta">🚚 EM COLETA</span>', 'CARGA BATIDA': '<span class="badge badge-batida">CARGA BATIDA</span>' }; return b[s] || `<span class="badge badge-info">${s}</span>`; }
function isCargaCasaTransportadoraExterna(carga) {
    return !!carga &&
        normalizarAgendaValor(carga.condicaoTransportadora) === 'CASA' &&
        !isNomeInterlandia(carga.transportadoraNome);
}
function getStatusBadgeCarga(carga) {
    const status = normalizarAgendaValor(carga?.status);
    const baixada = status.startsWith('CONCLU') || status === 'CARGA BATIDA' || status === 'BAIXADO';
    if (baixada && isCargaCasaTransportadoraExterna(carga)) {
        return '<span class="badge badge-baixado-pendente">BAIXADO<small>pendente</small></span>';
    }
    return getStatusBadge(carga?.status);
}
function formatarCNPJ(i) { let v = i.value.replace(/\D/g, ''); if (v.length <= 14) { v = v.replace(/^(\d{2})(\d)/, '$1.$2'); v = v.replace(/^(\d{2})\.(\d{3})(\d)/, '$1.$2.$3'); v = v.replace(/\.(\d{3})(\d)/, '.$1/$2'); v = v.replace(/(\d{4})(\d)/, '$1-$2'); i.value = v; } }
function getRoleAtual() { return usuarioAtual?.role || ''; }
function isMaster() { return getRoleAtual() === 'master'; }
function isFaturamento() { return getRoleAtual() === 'faturamento'; }
function isTransportadora() { return getRoleAtual() === 'transportadora'; }
function isEncarregadoOuAlmoxarifado() { return ['encarregado', 'almoxarifado'].includes(getRoleAtual()); }
function usuarioSomenteAgenda() { return isTransportadora() || isEncarregadoOuAlmoxarifado(); }
function podeVerAgenda() { return !!usuarioAtual; }
function podeCadastrarBasico() { return temPermissao('cadastrarBasico'); }
function podeCriarAgenda() { return temPermissao('criarAgenda'); }
function podeBaixarAgenda() { return temPermissao('baixarAgenda'); }
function podeOperarCargas() { return temPermissao('operarCargas'); }
function podeExportarRelatorio() { return temPermissao('exportarRelatorio'); }
function podeAnexarDocumento() { return !!usuarioAtual; }
function podeCadastrarMotoristaTransportadora() { return isTransportadora() && temPermissao('cadastrarMotorista'); }
function getPerfilLabel(role) { const perfis = { master: '👑 Master', user: '👤 Motorista', conferente: '📋 Conferente', encarregado: '📦 Encarregado', almoxarifado: '🏭 Almoxarifado', transportadora: '🚚 Transportadora', faturamento: '🧾 Faturamento' }; return perfis[role] || role; }
function getPerfilColor(role) { const cores = { master: '#daa520', user: '#28a745', conferente: '#8b5cf6', encarregado: '#0891b2', almoxarifado: '#0f766e', transportadora: '#2563eb', faturamento: '#b45309' }; return cores[role] || '#8a9dc0'; }
function getTransportadoraUsuarioAtual(user = usuarioAtual) {
    if (!user || user.role !== 'transportadora') return null;
    if (user.transportadoraId) {
        const porId = bancoDados.transportadoras.find(t => Number(t.id) === Number(user.transportadoraId));
        if (porId) return porId;
    }
    const nomesPossiveis = [user.transportadoraNome, user.nome, user.username].filter(Boolean).map(normalizarAgendaValor);
    return bancoDados.transportadoras.find(t => nomesPossiveis.includes(normalizarAgendaValor(t.nome))) || null;
}
function registroPertenceTransportadoraAtual(nomeTransportadora, transportadoraId = null, user = usuarioAtual) {
    if (!user || user.role !== 'transportadora') return true;
    const transportadora = getTransportadoraUsuarioAtual(user);
    if (!transportadora) return false;
    if (transportadoraId && Number(transportadoraId) === Number(transportadora.id)) return true;
    return normalizarAgendaValor(nomeTransportadora) === normalizarAgendaValor(transportadora.nome);
}
function agendaVisivelParaUsuario(item) {
    return registroPertenceTransportadoraAtual(item?.transportadora, item?.transportadoraId);
}
function cargaVisivelParaUsuario(carga) {
    return registroPertenceTransportadoraAtual(carga?.transportadoraNome, carga?.transportadoraId);
}
function filtrarAgendaPorPermissao(itens) {
    return isTransportadora() ? itens.filter(agendaVisivelParaUsuario) : itens;
}
function filtrarCargasPorPermissao(cargas) {
    return isTransportadora() ? cargas.filter(cargaVisivelParaUsuario) : cargas;
}
function getTodasCargas() { return filtrarCargasPorPermissao([...bancoDados.cargas]); }
function usuarioLogadoNome() { return usuarioAtual?.nome || usuarioAtual?.username || 'Sistema'; }
function registrarAlteracao(carga, acao, detalhes = '') {
    if (!carga) return;
    if (!Array.isArray(carga.historicoAlteracoes)) carga.historicoAlteracoes = [];
    carga.historicoAlteracoes.push({
        data: new Date().toISOString(),
        usuarioId: usuarioAtual?.id || null,
        usuarioNome: usuarioLogadoNome(),
        acao,
        detalhes
    });
    carga.ultimaAlteracaoUsuario = usuarioLogadoNome();
    carga.ultimaAlteracaoAcao = acao;
    carga.ultimaAlteracaoData = new Date().toISOString();
}
function historicoAlteracoesTexto(carga) {
    return (carga.historicoAlteracoes || []).map(h => `${formatarData(h.data)} ${h.usuarioNome || 'Sistema'}: ${h.acao}${h.detalhes ? ' - ' + h.detalhes : ''}`).join(' | ');
}
function getCidadeCarga(carga) {
    if (carga.cidade) return carga.cidade;
    const cliente = bancoDados.clientes.find(c => c.id == carga.clienteId || c.razao === carga.clienteNome);
    return cliente?.cidade || '';
}
function csvValor(v) { return `"${String(v ?? '').replace(/"/g, '""')}"`; }
function verificarViagemAberta(motorista, placa) { return verificarMotoristaAberto(motorista); }
function verificarMotoristaAberto(motorista) {
    const nome = String(motorista || '').trim().toUpperCase();
    if (!nome) return false;
    return bancoDados.cargas.some(c => String(c.motorista || '').trim().toUpperCase() === nome && String(c.status || '').trim().toUpperCase() === 'ABERTO');
}
function cargaTemValeHistorico(c) {
    return c.valePaleteCriado === true || ['VALE PALLETE', 'EM COLETA'].includes(c.status) || String(c.motivoVale || '').trim() !== '';
}
function cargaValePendente(c) {
    return cargaTemValeHistorico(c) && c.valePaleteResgatado !== true && ['VALE PALLETE', 'EM COLETA'].includes(c.status);
}
function getFrotaTransportadora(transp) {
    if (!transp) return [];
    const frota = Array.isArray(transp.frota) ? transp.frota : [];
    const legado = [];
    if (transp.motorista || transp.carro || transp.placa) legado.push({ motorista: transp.motorista || '', carro: transp.carro || transp.placa || '' });
    return frota.concat(legado).filter(f => f.motorista || f.carro);
}
function isNomeInterlandia(nome) {
    return normalizarAgendaValor(nome) === 'INTERLANDIA';
}
function getTransportadoraInterlandia() {
    return bancoDados.transportadoras.find(t => isNomeInterlandia(t.nome));
}
function getFrotaInterlandia() {
    return getFrotaTransportadora(getTransportadoraInterlandia());
}
function itemPertenceFrotaInterlandia(motorista, placa) {
    const m = normalizarAgendaValor(motorista);
    const p = normalizarAgendaValor(placa);
    if (!m && !p) return null;
    return getFrotaInterlandia().find(f =>
        (m && normalizarAgendaValor(f.motorista) === m) ||
        (p && normalizarAgendaValor(f.carro) === p)
    ) || null;
}
function validarFrotaInterlandia(transportadoraNome, motorista, placa) {
    if (isNomeInterlandia(transportadoraNome)) return true;
    const item = itemPertenceFrotaInterlandia(motorista, placa);
    if (!item) return true;
    const dados = `${item.motorista || motorista || '-'} / ${item.carro || placa || '-'}`;
    mostrarToast(`Motorista ou placa da INTERLANDIA nao pode ser associado a outra transportadora: ${dados}`, 'error');
    return false;
}
function validarFrotaInterlandiaLista(transportadoraNome, frota) {
    if (isNomeInterlandia(transportadoraNome)) return true;
    for (const item of (frota || [])) {
        if (!validarFrotaInterlandia(transportadoraNome, item.motorista, item.carro || item.placa)) return false;
    }
    return true;
}
function cargaTemIndicadorC(c) {
    return String(c.transportadoraNome || '').trim().toUpperCase() === 'INTERLANDIA' || String(c.observacoes || '').toUpperCase().includes('C - CARGA INTERLANDIA') || c.indicadorC === true;
}
function renderQtdeComC(c) {
    const temC = cargaTemIndicadorC(c);
    return `<div class="qtde-celula"><span class="qtde-numero">${c.qtde ?? 0}</span>${temC ? '<span class="qtde-c">C</span>' : '<span class="qtde-sem-c"></span>'}</div>`;
}
function fecharModal(id) { document.getElementById(id).style.display = 'none'; }

function atualizarListas() {
    const frota = bancoDados.transportadoras.flatMap(t => getFrotaTransportadora(t));
    listaMotoristasRegistrados = [...new Set(bancoDados.cargas.map(c => c.motorista).concat(frota.map(f => f.motorista)).filter(m => m))].sort();
    listaPlacasRegistradas = [...new Set(bancoDados.cargas.map(c => c.placa).concat(frota.map(f => f.carro)).filter(p => p))].sort();
    const dlM = document.getElementById('listaMotoristas');
    const dlP = document.getElementById('listaPlacas');
    if (dlM) dlM.innerHTML = listaMotoristasRegistrados.map(m => `<option value="${m}">`).join('');
    if (dlP) dlP.innerHTML = listaPlacasRegistradas.map(p => `<option value="${p}">`).join('');
}

function atualizarQuantidadePorTipo() {
    const tipo = document.getElementById('cargaTipo').value;
    const qtdeInput = document.getElementById('cargaQtde');
    if (tipo === 'nao_paletizada') { qtdeInput.value = 0; qtdeInput.readOnly = true; } 
    else { qtdeInput.readOnly = false; if (qtdeInput.value == 0) qtdeInput.value = ''; }
}

function verificarTransportadoraInterlandia() {
    const select = document.getElementById('cargaTransportadoraSelect');
    const text = select.options[select.selectedIndex]?.text;
    const indicador = document.getElementById('indicadorC');
    if (indicador) indicador.style.display = text === "INTERLANDIA" ? 'flex' : 'none';
}
function atualizarCondicaoTransportadoraNovaCarga(transp = null) {
    const grupo = document.getElementById('cargaCondicaoTransportadoraGrupo');
    const campo = document.getElementById('cargaCondicaoTransportadora');
    if (!grupo || !campo) return;
    const mostrar = !!transp && !isNomeInterlandia(transp.nome);
    grupo.style.display = mostrar ? 'block' : 'none';
    campo.required = mostrar;
    if (!mostrar) campo.value = '';
}
function verificarTransportadoraSelecionada() {
    verificarTransportadoraInterlandia();
    const select = document.getElementById('cargaTransportadoraSelect');
    const transp = bancoDados.transportadoras.find(t => t.id == select.value);
    atualizarCondicaoTransportadoraNovaCarga(transp);
    let frota = getFrotaTransportadora(transp);
    if (transp && !isNomeInterlandia(transp.nome)) {
        frota = frota.filter(f => !itemPertenceFrotaInterlandia(f.motorista, f.carro));
    }
    const dlM = document.getElementById('listaMotoristas');
    const dlP = document.getElementById('listaPlacas');
    if (dlM && frota.length) dlM.innerHTML = frota.map(f => `<option value="${f.motorista}">`).join('');
    if (dlP && frota.length) dlP.innerHTML = frota.map(f => `<option value="${f.carro}">`).join('');
    if (!frota.length) atualizarListas();
    if (frota.length === 1) {
        const motoristaInput = document.getElementById('cargaMotorista');
        const placaInput = document.getElementById('cargaPlaca');
        if (!motoristaInput.value.trim()) motoristaInput.value = frota[0].motorista || '';
        if (!placaInput.value.trim()) placaInput.value = frota[0].carro || '';
        document.getElementById('cargaMotorista').dispatchEvent(new Event('input'));
    }
}
function preencherCarroPorMotorista() {
    const select = document.getElementById('cargaTransportadoraSelect');
    const transp = bancoDados.transportadoras.find(t => t.id == select.value);
    const motorista = document.getElementById('cargaMotorista').value.trim().toUpperCase();
    const item = getFrotaTransportadora(transp).find(f => String(f.motorista || '').trim().toUpperCase() === motorista);
    if (item?.carro) document.getElementById('cargaPlaca').value = item.carro;
}

function carregarSelects() {
    const clientes = bancoDados.clientes;
    const s = document.getElementById('cargaClienteSelect');
    const valorClienteAtual = s?.value || '';
    if (s) { s.innerHTML = '<option value="">Selecione</option>'; clientes.forEach(c => { s.innerHTML += `<option value="${c.id}" data-cnpj="${c.cnpj}" data-uf="${c.uf}" data-cidade="${c.cidade || ''}" data-endereco="${c.endereco}">${c.razao}</option>`; }); if (valorClienteAtual && [...s.options].some(o => o.value === valorClienteAtual)) s.value = valorClienteAtual; }
    const es = document.getElementById('editClienteSelect');
    if (es) { es.innerHTML = '<option value="">Selecione</option>'; clientes.forEach(c => { es.innerHTML += `<option value="${c.id}" data-cnpj="${c.cnpj}" data-uf="${c.uf}" data-cidade="${c.cidade || ''}" data-endereco="${c.endereco}">${c.razao}</option>`; }); es.onchange = function() { const o = es.options[es.selectedIndex]; if (o.value) { document.getElementById('editCnpj').value = o.getAttribute('data-cnpj') || ''; document.getElementById('editUf').value = o.getAttribute('data-uf') || ''; document.getElementById('editCidade').value = o.getAttribute('data-cidade') || ''; document.getElementById('editEndereco').value = o.getAttribute('data-endereco') || ''; } }; }
    const reps = bancoDados.representantes; const r = document.getElementById('cargaRepresentanteSelect'); const valorRepAtual = r?.value || ''; if (r) { r.innerHTML = '<option value="">Selecione</option>'; reps.forEach(rp => { r.innerHTML += `<option value="${rp.id}">${rp.nome}</option>`; }); if (valorRepAtual && [...r.options].some(o => o.value === valorRepAtual)) r.value = valorRepAtual; }
    const er = document.getElementById('editRepresentanteSelect'); if (er) { er.innerHTML = '<option value="">Selecione</option>'; reps.forEach(rp => { er.innerHTML += `<option value="${rp.id}">${rp.nome}</option>`; }); }
    const transps = bancoDados.transportadoras; const t = document.getElementById('cargaTransportadoraSelect'); const valorTranspAtual = t?.value || ''; if (t) { t.innerHTML = '<option value="">Selecione</option>'; transps.forEach(tp => { t.innerHTML += `<option value="${tp.id}">${tp.nome}</option>`; }); if (valorTranspAtual && [...t.options].some(o => o.value === valorTranspAtual)) t.value = valorTranspAtual; }
    const et = document.getElementById('editTransportadoraSelect'); if (et) { et.innerHTML = '<option value="">Selecione</option>'; transps.forEach(tp => { et.innerHTML += `<option value="${tp.id}">${tp.nome}</option>`; }); }
    const fc = document.getElementById('filtroCliente'); if (fc) { fc.innerHTML = '<option>Todos os clientes</option>'; clientes.forEach(c => { fc.innerHTML += `<option value="${c.razao}">${c.razao}</option>`; }); }
    const ufs = [...new Set(clientes.map(c => c.uf).filter(u => u))];
    const fu = document.getElementById('filtroUF'); if (fu) { fu.innerHTML = '<option>Todos os estados</option>'; ufs.forEach(uf => { fu.innerHTML += `<option value="${uf}">${uf}</option>`; }); }
    const cidades = [...new Set(getTodasCargas().map(getCidadeCarga).concat(clientes.map(c => c.cidade)).filter(c => c))].sort();
    const fcid = document.getElementById('filtroCidade'); if (fcid) { fcid.innerHTML = '<option>Todas as cidades</option>'; cidades.forEach(cidade => { fcid.innerHTML += `<option value="${cidade}">${cidade}</option>`; }); }
    const agendaTransp = document.getElementById('listaAgendaTransportadoras'); if (agendaTransp) agendaTransp.innerHTML = bancoDados.transportadoras.map(tp => `<option value="${tp.nome}">`).join('');
    const agendaClientes = document.getElementById('listaAgendaClientes'); if (agendaClientes) agendaClientes.innerHTML = bancoDados.clientes.map(c => `<option value="${c.razao}">`).join('');
}

// ============================================
// LOGIN
// ============================================
function fazerLogin() {
    const u = document.getElementById('loginUser').value.trim();
    const p = document.getElementById('loginPass').value.trim();
    const user = bancoDados.users.find(uu => uu.username === u && uu.password === p);
    if (user) {
        usuarioAtual = user;
        document.getElementById('loginScreen').style.display = 'none';
        document.getElementById('appContainer').style.display = 'block';
        document.getElementById('userNameDisplay').innerText = user.nome;
        document.getElementById('userRoleDisplay').innerHTML = getPerfilLabel(user.role);
        document.getElementById('userAvatar').innerText = user.username.charAt(0).toUpperCase();
        aplicarPermissoesTela();
        carregarSelects();
        atualizarDashboard();
        atualizarTabela();
        atualizarAgendaTransportadora();
        iniciarAgendaTempoReal();
        mostrarToast(`Bem-vindo, ${user.nome}!`);
    } else { document.getElementById('loginError').innerText = 'Usuário ou senha inválidos!'; }
}

function fazerLogout() { pararAgendaTempoReal(); usuarioAtual = null; document.getElementById('loginScreen').style.display = 'flex'; document.getElementById('appContainer').style.display = 'none'; mostrarToast('Saiu do sistema', 'info'); }

function setDisplayById(id, mostrar, display = '') {
    const el = document.getElementById(id);
    if (el) el.style.display = mostrar ? display : 'none';
}

function setDisplaySelector(selector, mostrar, display = '') {
    const el = document.querySelector(selector);
    if (el) el.style.display = mostrar ? display : 'none';
}

function aplicarPermissoesTela() {
    const somenteAgenda = usuarioSomenteAgenda();
    const exibeAdmin = isMaster() || isFaturamento();
    setDisplayById('adminActionsPanel', exibeAdmin);
    setDisplayById('adminBar', exibeAdmin, 'flex');
    setDisplayById('btnAdminUsuarios', isMaster());
    setDisplayById('btnAdminCliente', podeCadastrarBasico());
    setDisplayById('btnAdminTransportadora', podeCadastrarBasico());
    setDisplayById('btnAdminRepresentante', podeCadastrarBasico());
    setDisplayById('btnAdminImportar', temPermissao('importarBackup'));
    setDisplayById('btnAdminBackup', temPermissao('gerarBackup'));
    setDisplayById('btnAdminReset', temPermissao('resetDemo'));

    setDisplayById('btnNovaCarga', podeOperarCargas(), 'flex');
    setDisplayById('btnRetornoCarga', podeOperarCargas(), 'flex');
    setDisplayById('btnSaidaColeta', temPermissao('saidaColeta'), 'flex');
    setDisplayById('btnRetornoColeta', temPermissao('retornoColeta'), 'flex');
    setDisplayById('btnAgendaTransportadora', podeVerAgenda(), 'flex');
    setDisplayById('btnDocumentos', podeAnexarDocumento(), 'flex');
    setDisplayById('btnCadastroMotorista', podeCadastrarMotoristaTransportadora(), 'flex');
    setDisplayById('btnExportarRelatorio', podeExportarRelatorio(), 'flex');
    setDisplayById('btnNovoAgendaTransportadora', podeCriarAgenda(), '');

    setDisplaySelector('.busca-rapida', !somenteAgenda);
    setDisplayById('dashboardGrid', !somenteAgenda);
    setDisplaySelector('.filtros-container', !somenteAgenda);
    setDisplaySelector('.table-container', true);

    const painelAgenda = document.getElementById('agendaTransportadoraPanel');
    if (painelAgenda && somenteAgenda) painelAgenda.classList.add('active');
}

// ============================================
// DASHBOARD
// ============================================
function getQuantidadePaletePorCliente() {
    const cargas = getTodasCargas();
    const porCliente = {};
    cargas.forEach(c => {
        if (!porCliente[c.clienteNome]) {
            porCliente[c.clienteNome] = { total: 0, aberto: 0, vale: 0, emColeta: 0, concluido: 0, valeHistorico: 0, valeFaltaResgatar: 0 };
        }
        porCliente[c.clienteNome].total += c.qtde;
        if (c.status === 'ABERTO') porCliente[c.clienteNome].aberto += c.qtde;
        else if (c.status === 'VALE PALLETE') porCliente[c.clienteNome].vale += c.qtde;
        else if (c.status === 'EM COLETA') porCliente[c.clienteNome].emColeta += c.qtde;
        else if (c.status === 'CONCLUÍDO') porCliente[c.clienteNome].concluido += c.qtde;
        if (cargaTemValeHistorico(c)) porCliente[c.clienteNome].valeHistorico += c.qtde;
        if (cargaValePendente(c)) porCliente[c.clienteNome].valeFaltaResgatar += c.qtde;
    });
    return porCliente;
}

function atualizarDashboard() {
    const cargas = getTodasCargas();
    const totalPaletes = cargas.reduce((sum, c) => sum + c.qtde, 0);
    const abertos = cargas.filter(c => c.status === 'ABERTO').length;
    const concluidos = cargas.filter(c => c.status === 'CONCLUÍDO').length;
    const vales = cargas.filter(c => c.status === 'VALE PALLETE').length;
    const emColeta = cargas.filter(c => c.status === 'EM COLETA').length;
    const paletesAbertos = cargas.filter(c => c.status === 'ABERTO').reduce((s, c) => s + c.qtde, 0);
    const paletesConcluidos = cargas.filter(c => c.status === 'CONCLUÍDO').reduce((s, c) => s + c.qtde, 0);
    const paletesVale = cargas.filter(c => c.status === 'VALE PALLETE').reduce((s, c) => s + c.qtde, 0);
    const paletesEmColeta = cargas.filter(c => c.status === 'EM COLETA').reduce((s, c) => s + c.qtde, 0);
    const cargasValeHistorico = cargas.filter(cargaTemValeHistorico);
    const clientesComVale = new Set(cargasValeHistorico.map(c => c.clienteNome).filter(Boolean)).size;
    const paletesValeHistorico = cargasValeHistorico.reduce((s, c) => s + c.qtde, 0);
    const paletesValeFaltaResgatar = cargas.filter(cargaValePendente).reduce((s, c) => s + c.qtde, 0);
    
    const porCliente = getQuantidadePaletePorCliente();
    let clienteHtml = '';
    for (const [cliente, dados] of Object.entries(porCliente).sort((a,b) => b[1].total - a[1].total)) {
        clienteHtml += `
            <div class="cliente-palete-card">
                <div class="stat-cliente-item">
                    <span class="stat-cliente-nome" title="${cliente}">${cliente}</span>
                    <span class="stat-cliente-valor">${dados.total} <small style="font-size:12px;color:#8a9dc0;">paletes</small></span>
                </div>
                <div class="stat-palete-dist">
                    <span class="stat-palete-item">🟡 ${dados.aberto}</span>
                    <span class="stat-palete-item">🎫 ${dados.vale}</span>
                    <span class="stat-palete-item">🚚 ${dados.emColeta}</span>
                    <span class="stat-palete-item">✅ ${dados.concluido}</span>
                    <span class="stat-palete-item">Vale hist. ${dados.valeHistorico}</span>
                    <span class="stat-palete-item">Falta ${dados.valeFaltaResgatar}</span>
                </div>
            </div>
        `;
    }
    const clientesValeHtml = Object.entries(porCliente)
        .filter(([, dados]) => dados.valeHistorico > 0)
        .sort((a,b) => b[1].valeHistorico - a[1].valeHistorico)
        .map(([cliente, dados]) => `
            <div class="cliente-palete-card">
                <div class="stat-cliente-item">
                    <span class="stat-cliente-nome" title="${cliente}">${cliente}</span>
                    <span class="stat-cliente-valor">${dados.valeHistorico} <small style="font-size:12px;color:#8a9dc0;">paletes</small></span>
                </div>
                <div class="stat-palete-dist">
                    <span class="stat-palete-item">Falta resgatar ${dados.valeFaltaResgatar}</span>
                    <span class="stat-palete-item">Historico ${dados.valeHistorico}</span>
                </div>
            </div>
        `).join('');
    
    document.getElementById('dashboardGrid').innerHTML = `
        <div class="stat-card kpi-total">
            <div class="stat-header"><span class="stat-title">📦 TOTAL PALETES</span><i class="fas fa-boxes"></i></div>
            <div class="stat-value">${totalPaletes}</div>
            <div class="stat-detalhe">Paletes registrados no sistema</div>
        </div>
        <div class="stat-card">
            <div class="stat-header"><span class="stat-title">🟡 ABERTOS</span><i class="fas fa-clock"></i></div>
            <div class="stat-value" style="color:#ffc107">${abertos}</div>
            <div class="stat-detalhe">${paletesAbertos} paletes | ${abertos} cargas</div>
        </div>
        <div class="stat-card">
            <div class="stat-header"><span class="stat-title">✅ CONCLUÍDOS</span><i class="fas fa-check-circle"></i></div>
            <div class="stat-value" style="color:#28a745">${concluidos}</div>
            <div class="stat-detalhe">${paletesConcluidos} paletes | ${concluidos} cargas</div>
        </div>
        <div class="stat-card">
            <div class="stat-header"><span class="stat-title">🎫 VALE PALLETE</span><i class="fas fa-ticket-alt"></i></div>
            <div class="stat-value" style="color:#8b5cf6">${vales}</div>
            <div class="stat-detalhe">${paletesVale} paletes | ${vales} cargas</div>
        </div>
        <div class="stat-card">
            <div class="stat-header"><span class="stat-title">CONTAGEM DE CLIENTE COM VALE PALETE</span><i class="fas fa-users"></i></div>
            <div class="stat-value" style="color:#daa520">${clientesComVale}</div>
            <div class="stat-detalhe">${paletesValeHistorico} paletes em vale palete no historico</div>
        </div>
        <div class="stat-card">
            <div class="stat-header"><span class="stat-title">CONTAGEM DE PALETE EM VALE PALETE QUE FALTA RESGATA</span><i class="fas fa-box-open"></i></div>
            <div class="stat-value" style="color:#ef476f">${paletesValeFaltaResgatar}</div>
            <div class="stat-detalhe">Permanece visivel mesmo apos coleta</div>
        </div>
        <div class="stat-card">
            <div class="stat-header"><span class="stat-title">🚚 EM COLETA</span><i class="fas fa-truck"></i></div>
            <div class="stat-value" style="color:#17a2b8">${emColeta}</div>
            <div class="stat-detalhe">${paletesEmColeta} paletes | ${emColeta} cargas</div>
        </div>
        <div class="stat-card clientes-horizontal">
            <div class="stat-header"><span class="stat-title">CLIENTES COM VALE PALETE</span><i class="fas fa-ticket-alt"></i></div>
            <div class="stat-detalhe clientes-row">
                ${clientesValeHtml || '<div>Nenhum cliente com vale palete</div>'}
            </div>
        </div>
        <div class="stat-card clientes-horizontal">
            <div class="stat-header"><span class="stat-title">📊 PALETES POR CLIENTE</span><i class="fas fa-chart-bar"></i></div>
            <div class="stat-detalhe clientes-row">
                ${clienteHtml || '<div>Nenhuma carga registrada</div>'}
            </div>
        </div>
    `;
    const cardsDashboard = document.querySelectorAll('#dashboardGrid > .stat-card');
    const classesDashboard = ['kpi-total', 'kpi-aberto', 'kpi-concluido', 'kpi-vale', 'kpi-clientes', 'kpi-alerta', 'kpi-coleta', 'kpi-vale', 'kpi-clientes'];
    const titulosDashboard = ['Total de paletes', 'Cargas abertas', 'Concluidas', 'Vale palete', 'Clientes com vale', 'Paletes a resgatar', 'Em coleta', 'Clientes com vale palete', 'Paletes por cliente'];
    cardsDashboard.forEach((card, index) => {
        card.classList.remove('card-destaque');
        if (classesDashboard[index]) card.classList.add(classesDashboard[index]);
        const titulo = card.querySelector('.stat-title');
        if (titulo && titulosDashboard[index]) titulo.textContent = titulosDashboard[index];
    });
}

// ============================================
// NOVA CARGA (com Motorista)
// ============================================
function abrirModalNovaCarga() {
    if (!podeOperarCargas()) { mostrarToast('Acesso restrito!', 'error'); return; }
    carregarSelects(); atualizarListas();
    document.getElementById('modalNovaCarga').style.display = 'flex';
    document.querySelectorAll('#modalNovaCarga input, #modalNovaCarga select').forEach(i => { if (i.id !== 'cargaValorUnitario') i.value = ''; });
    document.getElementById('cargaValorUnitario').value = '100';
    document.getElementById('alertaRestricaoNovaCarga').style.display = 'none';
    atualizarCondicaoTransportadoraNovaCarga();
    document.getElementById('cargaQtde').readOnly = false;
    const mi = document.getElementById('cargaMotorista'), pi = document.getElementById('cargaPlaca');
    const v = () => { if (mi.value.trim() && verificarViagemAberta(mi.value.trim(), pi.value.trim())) { document.getElementById('alertaRestricaoNovaCarga').style.display = 'block'; document.getElementById('btnSalvarNovaCarga').disabled = true; } else { document.getElementById('alertaRestricaoNovaCarga').style.display = 'none'; document.getElementById('btnSalvarNovaCarga').disabled = false; } };
    mi.oninput = v; mi.onchange = () => { preencherCarroPorMotorista(); v(); }; pi.oninput = v;
    const sc = document.getElementById('cargaClienteSelect');
    sc.onchange = function() { const o = sc.options[sc.selectedIndex]; if (o.value) { document.getElementById('cargaCNPJ').value = o.getAttribute('data-cnpj') || ''; document.getElementById('cargaUF').value = o.getAttribute('data-uf') || ''; document.getElementById('cargaCidade').value = o.getAttribute('data-cidade') || ''; document.getElementById('cargaEndereco').value = o.getAttribute('data-endereco') || ''; document.getElementById('cargaClienteNovo').value = ''; } };
}

function salvarNovaCarga() {
    if (!podeOperarCargas()) { mostrarToast('Acesso restrito!', 'error'); return; }
    const nf = document.getElementById('cargaNotaFiscal').value.trim();
    const notaProduto = document.getElementById('cargaNotaProduto').value.trim();
    if (!nf) { mostrarToast('Nota Fiscal obrigatória!', 'error'); return; }
    if (bancoDados.cargas.some(c => c.notaFiscal === nf)) { mostrarToast('Nota Fiscal já cadastrada!', 'error'); return; }
    if (notaFiscalJaUsada(nf)) { mostrarToast('Nota Fiscal ja cadastrada em outra carga ou agendamento!', 'error'); return; }
    if (!notaProduto) { mostrarToast('Nota Fiscal de Produto obrigatoria!', 'error'); return; }
    if (normalizarAgendaValor(nf) === normalizarAgendaValor(notaProduto)) { mostrarToast('Nota Fiscal e Nota Fiscal de Produto nao podem ser iguais!', 'error'); return; }
    if (notaFiscalJaUsada(notaProduto)) { mostrarToast('Nota Fiscal de Produto ja cadastrada em outra carga ou agendamento!', 'error'); return; }
    const motorista = document.getElementById('cargaMotorista').value.trim();
    const placa = document.getElementById('cargaPlaca').value.trim();
    if (!motorista || !placa) { mostrarToast('Motorista e Placa obrigatórios!', 'error'); return; }
    if (verificarViagemAberta(motorista, placa)) { mostrarToast('Este motorista so nao pode receber NOVA CARGA se o status dele estiver em ABERTO.', 'error'); return; }
    const sap = document.getElementById('cargaSAP').value.trim();
    const sc = document.getElementById('cargaClienteSelect');
    const cn = document.getElementById('cargaClienteNovo').value.trim();
    let cnome = '', cid = null, ccnpj = '', cuf = '', cend = '', ccidade = '';
    if (sc.value) { const c = bancoDados.clientes.find(c => c.id == sc.value); if (c) { cnome = c.razao; cid = c.id; ccnpj = c.cnpj; cuf = c.uf; cend = c.endereco; ccidade = c.cidade || ''; } }
    const tipo = document.getElementById('cargaTipo').value;
    let qtde = parseInt(document.getElementById('cargaQtde').value);
    if (tipo === 'nao_paletizada') qtde = 0;
    const vu = parseFloat(document.getElementById('cargaValorUnitario').value) || 0;
    if (!cnome && !cn) { mostrarToast('Selecione o cliente!', 'error'); return; }
    if (!vu) { mostrarToast('Valor obrigatório!', 'error'); return; }
    const rid = document.getElementById('cargaRepresentanteSelect').value;
    const rnome = rid ? bancoDados.representantes.find(r => r.id == rid)?.nome : '';
    const tid = document.getElementById('cargaTransportadoraSelect').value;
    const tnome = tid ? bancoDados.transportadoras.find(t => t.id == tid)?.nome : '';
    const condicaoTransportadora = document.getElementById('cargaCondicaoTransportadora')?.value || '';
    if (tnome && !isNomeInterlandia(tnome) && !condicaoTransportadora) { mostrarToast('Informe a condicao: Troca ou Casa.', 'error'); return; }
    if (!validarFrotaInterlandia(tnome, motorista, placa)) return;
    let obs = '';
    if (tnome === "INTERLANDIA") obs = "C - Carga INTERLANDIA";
    else if (condicaoTransportadora) obs = `Condicao: ${condicaoTransportadora}`;
    const novaCarga = { id: bancoDados.cargas.length + 1, usuarioId: usuarioAtual.id, usuarioNome: usuarioAtual.nome, notaFiscal: nf, notaProduto, sap, clienteId: cid, clienteNome: cnome || cn, cnpj: ccnpj || document.getElementById('cargaCNPJ').value.trim(), endereco: cend || document.getElementById('cargaEndereco').value.trim(), cidade: ccidade || document.getElementById('cargaCidade').value.trim(), uf: cuf || document.getElementById('cargaUF').value.toUpperCase(), representanteId: rid || null, representanteNome: rnome || '', transportadoraId: tid || null, transportadoraNome: tnome || '', condicaoTransportadora, tipo, qtde, valorUnitario: vu, valorTotal: qtde * vu, motorista, placa, dataCarga: new Date().toISOString(), dataRetorno: null, dataSaidaColeta: null, dataRetornoColeta: null, status: "ABERTO", observacoes: obs, motivoVale: "", motivoNaoColetado: "", indicadorC: true };
    registrarAlteracao(novaCarga, 'Criou carga', `NF ${nf}. NF produto ${notaProduto}${condicaoTransportadora ? '. Condicao ' + condicaoTransportadora : ''}`);
    bancoDados.cargas.push(novaCarga);
    salvarBanco(); carregarSelects(); fecharModal('modalNovaCarga'); atualizarDashboard(); atualizarTabela(); mostrarToast(`Carga NF ${nf} registrada!`);
}

// ============================================
// RETORNO DA CARGA
// ============================================
function abrirModalRetornoCarga() {
    if (!podeOperarCargas()) { mostrarToast('Acesso restrito!', 'error'); return; }
    document.getElementById('modalRetornoCarga').style.display = 'flex';
    document.getElementById('buscaRetornoNF').value = '';
    document.getElementById('cargasAbertasLista').innerHTML = '';
    document.getElementById('dadosCargaRetorno').style.display = 'none';
    document.getElementById('retornoData').valueAsDate = new Date();
    document.getElementById('motivoValeDiv').style.display = 'none';
    cargaSelecionadaRetorno = null; opcaoRetornoSelecionada = null;
    document.querySelectorAll('#opcoesRetorno .opcao-retorno').forEach(opt => opt.classList.remove('selected'));
}

function buscarCargaParaRetorno() {
    const b = document.getElementById('buscaRetornoNF').value.trim();
    const cargas = getTodasCargas().filter(c => c.status === 'ABERTO' && (c.notaFiscal.toLowerCase().includes(b.toLowerCase()) || String(c.sap||'').toLowerCase().includes(b.toLowerCase()) || String(c.clienteNome||'').toLowerCase().includes(b.toLowerCase())));
    const div = document.getElementById('cargasAbertasLista');
    if (b.length < 2) { div.innerHTML = '<p style="color:#8a9dc0;">Digite pelo menos 2 caracteres</p>'; return; }
    if (!cargas.length) { div.innerHTML = '<p style="color:#8a9dc0;">Nenhuma carga em aberto</p>'; return; }
    div.innerHTML = cargas.map(c => `<div onclick="selecionarCargaRetorno(${c.id})" style="padding:10px; border:1px solid #2a3a4a; border-radius:8px; margin-bottom:8px; cursor:pointer; background:#0f1a24;"><strong>NF: ${c.notaFiscal}</strong> | SAP: ${c.sap || '-'}<br>Cliente: ${c.clienteNome} | Cidade: ${getCidadeCarga(c) || '-'}<br>Motorista: ${c.motorista}<br>Qtde: ${c.qtde} paletes</div>`).join('');
}

function selecionarCargaRetorno(id) {
    cargaSelecionadaRetorno = bancoDados.cargas.find(c => c.id === id);
    const div = document.getElementById('dadosCargaRetorno');
    div.style.display = 'block';
    div.innerHTML = `<strong>📋 CARGA SELECIONADA:</strong><br>NF: ${cargaSelecionadaRetorno.notaFiscal}<br>Cliente: ${cargaSelecionadaRetorno.clienteNome}<br>Cidade: ${getCidadeCarga(cargaSelecionadaRetorno) || '-'}<br>SAP: ${cargaSelecionadaRetorno.sap || '-'}<br>Motorista: ${cargaSelecionadaRetorno.motorista}<br>Placa: ${cargaSelecionadaRetorno.placa}<br>Qtde: ${cargaSelecionadaRetorno.qtde} paletes<br>Valor: ${formatarMoeda(cargaSelecionadaRetorno.valorTotal)}`;
}

function selecionarOpcaoRetorno(opcao) {
    opcaoRetornoSelecionada = opcao;
    document.querySelectorAll('#opcoesRetorno .opcao-retorno').forEach(opt => opt.classList.remove('selected'));
    if (opcao === 'concluido') { document.getElementById('opcaoConcluido').classList.add('selected'); document.getElementById('motivoValeDiv').style.display = 'none'; }
    else if (opcao === 'vale') { document.getElementById('opcaoVale').classList.add('selected'); document.getElementById('motivoValeDiv').style.display = 'block'; }
    else { document.getElementById('opcaoBatida').classList.add('selected'); document.getElementById('motivoValeDiv').style.display = 'none'; }
}

function confirmarRetorno() {
    if (!podeOperarCargas()) { mostrarToast('Acesso restrito!', 'error'); return; }
    if (!cargaSelecionadaRetorno) { mostrarToast('Selecione uma carga!', 'error'); return; }
    if (!opcaoRetornoSelecionada) { mostrarToast('Selecione uma opção!', 'error'); return; }
    const dr = document.getElementById('retornoData').value;
    if (!dr) { mostrarToast('Data de retorno obrigatória!', 'error'); return; }
    if (opcaoRetornoSelecionada === 'vale') {
        const motivo = document.getElementById('motivoVale').value.trim();
        if (!motivo) { mostrarToast('Motivo obrigatório!', 'error'); return; }
        cargaSelecionadaRetorno.motivoVale = motivo;
        cargaSelecionadaRetorno.valePaleteCriado = true;
        cargaSelecionadaRetorno.valePaleteQtde = cargaSelecionadaRetorno.qtde;
        cargaSelecionadaRetorno.valePaleteCliente = cargaSelecionadaRetorno.clienteNome;
        cargaSelecionadaRetorno.valePaleteResgatado = false;
        cargaSelecionadaRetorno.status = "VALE PALLETE";
        registrarAlteracao(cargaSelecionadaRetorno, 'Retorno da carga', `Status VALE PALLETE. Motivo: ${motivo}`);
        mostrarToast(`✅ VALE PALLETE criado!`);
    } else if (opcaoRetornoSelecionada === 'batida') {
        cargaSelecionadaRetorno.status = "CARGA BATIDA";
        registrarAlteracao(cargaSelecionadaRetorno, 'Retorno da carga', 'Status CARGA BATIDA');
        mostrarToast(`CARGA BATIDA registrada!`);
    } else {
        cargaSelecionadaRetorno.status = "CONCLUÍDO";
        registrarAlteracao(cargaSelecionadaRetorno, 'Retorno da carga', 'Status CONCLUÍDO');
        mostrarToast(`✅ Carga CONCLUÍDA!`);
    }
    cargaSelecionadaRetorno.dataRetorno = new Date(dr).toISOString();
    salvarBanco(); fecharModal('modalRetornoCarga'); atualizarDashboard(); atualizarTabela();
}

// ============================================
// SAÍDA PARA COLETAR VALE
// ============================================
function abrirModalSaidaColeta() { if (!temPermissao('saidaColeta')) { mostrarToast('Acesso restrito!', 'error'); return; } document.getElementById('modalSaidaColeta').style.display = 'flex'; document.getElementById('buscaSaidaNF').value = ''; document.getElementById('valesLista').innerHTML = ''; document.getElementById('saidaData').valueAsDate = new Date(); document.getElementById('dadosValeSaida').style.display = 'none'; cargaSelecionadaSaida = null; }
function buscarValeParaSaida() { const b = document.getElementById('buscaSaidaNF').value.trim(); const vales = bancoDados.cargas.filter(c => c.status === 'VALE PALLETE' && (c.notaFiscal.toLowerCase().includes(b.toLowerCase()) || (c.sap && c.sap.includes(b)))); const div = document.getElementById('valesLista'); if (b.length < 2) { div.innerHTML = '<p style="color:#8a9dc0;">Digite pelo menos 2 caracteres</p>'; return; } if (!vales.length) { div.innerHTML = '<p style="color:#8a9dc0;">Nenhum vale encontrado</p>'; return; } div.innerHTML = vales.map(c => `<div onclick="selecionarValeSaida(${c.id})" style="padding:10px; border:1px solid #2a3a4a; border-radius:8px; margin-bottom:8px; cursor:pointer;"><strong>SAP: ${c.sap || '-'}</strong> | NF: ${c.notaFiscal}<br>Cliente: ${c.clienteNome}<br>Cidade: ${getCidadeCarga(c) || '-'}</div>`).join(''); }
function selecionarValeSaida(id) { cargaSelecionadaSaida = bancoDados.cargas.find(c => c.id === id); document.getElementById('dadosValeSaida').style.display = 'block'; document.getElementById('dadosValeSaida').innerHTML = `<strong>VALE:</strong> SAP: ${cargaSelecionadaSaida.sap || '-'}<br>NF: ${cargaSelecionadaSaida.notaFiscal}<br>Cliente: ${cargaSelecionadaSaida.clienteNome}<br>Cidade: ${getCidadeCarga(cargaSelecionadaSaida) || '-'}`; }
function confirmarSaidaColeta() {
    if (!cargaSelecionadaSaida) { mostrarToast('Selecione um vale!', 'error'); return; }
    const ds = document.getElementById('saidaData').value;
    if (!ds) { mostrarToast('Data obrigatória!', 'error'); return; }
    cargaSelecionadaSaida.valePaleteCriado = true;
    cargaSelecionadaSaida.valePaleteQtde = cargaSelecionadaSaida.qtde;
    cargaSelecionadaSaida.valePaleteCliente = cargaSelecionadaSaida.clienteNome;
    cargaSelecionadaSaida.valePaleteResgatado = false;
    cargaSelecionadaSaida.dataSaidaColeta = new Date(ds).toISOString();
    cargaSelecionadaSaida.status = "EM COLETA";
    registrarAlteracao(cargaSelecionadaSaida, 'Saída para coletar vale', 'Status EM COLETA');
    salvarBanco(); fecharModal('modalSaidaColeta'); atualizarDashboard(); atualizarTabela(); mostrarToast(`✅ Saída registrada!`);
}

// ============================================
// RETORNO DE COLETA
// ============================================
function abrirModalRetornoColeta() { if (!temPermissao('retornoColeta')) { mostrarToast('Acesso restrito!', 'error'); return; } document.getElementById('modalRetornoColeta').style.display = 'flex'; document.getElementById('buscaRetornoNFColeta').value = ''; document.getElementById('emColetaLista').innerHTML = ''; document.getElementById('retornoColetaData').valueAsDate = new Date(); document.getElementById('dadosRetornoColeta').style.display = 'none'; document.getElementById('motivoNaoColetadoDiv').style.display = 'none'; cargaSelecionadaRetornoColeta = null; opcaoRetornoColetaSelecionada = null; document.querySelectorAll('#opcoesRetornoColeta .opcao-retorno').forEach(opt => opt.classList.remove('selected')); }
function buscarEmColetaParaRetorno() { const b = document.getElementById('buscaRetornoNFColeta').value.trim(); const em = bancoDados.cargas.filter(c => c.status === 'EM COLETA' && (c.notaFiscal.toLowerCase().includes(b.toLowerCase()) || (c.sap && c.sap.includes(b)))); const div = document.getElementById('emColetaLista'); if (b.length < 2) { div.innerHTML = '<p style="color:#8a9dc0;">Digite pelo menos 2 caracteres</p>'; return; } if (!em.length) { div.innerHTML = '<p style="color:#8a9dc0;">Nenhuma coleta em andamento</p>'; return; } div.innerHTML = em.map(c => `<div onclick="selecionarCargaRetornoColeta(${c.id})" style="padding:10px; border:1px solid #2a3a4a; border-radius:8px; margin-bottom:8px; cursor:pointer;"><strong>SAP: ${c.sap || '-'}</strong> | NF: ${c.notaFiscal}<br>Cliente: ${c.clienteNome}<br>Cidade: ${getCidadeCarga(c) || '-'}</div>`).join(''); }
function selecionarCargaRetornoColeta(id) { cargaSelecionadaRetornoColeta = bancoDados.cargas.find(c => c.id === id); document.getElementById('dadosRetornoColeta').style.display = 'block'; document.getElementById('dadosRetornoColeta').innerHTML = `<strong>CARGA:</strong> SAP: ${cargaSelecionadaRetornoColeta.sap || '-'}<br>NF: ${cargaSelecionadaRetornoColeta.notaFiscal}<br>Cliente: ${cargaSelecionadaRetornoColeta.clienteNome}<br>Cidade: ${getCidadeCarga(cargaSelecionadaRetornoColeta) || '-'}`; }
function selecionarOpcaoRetornoColeta(opcao) { opcaoRetornoColetaSelecionada = opcao; document.querySelectorAll('#opcoesRetornoColeta .opcao-retorno').forEach(opt => opt.classList.remove('selected')); if (opcao === 'coletado') { document.getElementById('opcaoColetado').classList.add('selected'); document.getElementById('motivoNaoColetadoDiv').style.display = 'none'; } else { document.getElementById('opcaoNaoColetado').classList.add('selected'); document.getElementById('motivoNaoColetadoDiv').style.display = 'block'; } }
function confirmarRetornoColeta() {
    if (!cargaSelecionadaRetornoColeta) { mostrarToast('Selecione uma carga!', 'error'); return; }
    if (!opcaoRetornoColetaSelecionada) { mostrarToast('Selecione opção!', 'error'); return; }
    const dr = document.getElementById('retornoColetaData').value;
    if (!dr) { mostrarToast('Data obrigatória!', 'error'); return; }
    cargaSelecionadaRetornoColeta.valePaleteCriado = true;
    cargaSelecionadaRetornoColeta.valePaleteQtde = cargaSelecionadaRetornoColeta.qtde;
    cargaSelecionadaRetornoColeta.valePaleteCliente = cargaSelecionadaRetornoColeta.clienteNome;
    if (opcaoRetornoColetaSelecionada === 'coletado') {
        cargaSelecionadaRetornoColeta.valePaleteResgatado = true;
        cargaSelecionadaRetornoColeta.status = "CONCLUÍDO";
        registrarAlteracao(cargaSelecionadaRetornoColeta, 'Retorno de coleta', 'Coletado. Status CONCLUÍDO');
        mostrarToast(`✅ Coleta finalizada!`);
    } else {
        const motivo = document.getElementById('motivoNaoColetado').value.trim();
        if (!motivo) { mostrarToast('Motivo obrigatório!', 'error'); return; }
        cargaSelecionadaRetornoColeta.valePaleteResgatado = false;
        cargaSelecionadaRetornoColeta.status = "VALE PALLETE";
        cargaSelecionadaRetornoColeta.motivoNaoColetado = motivo;
        registrarAlteracao(cargaSelecionadaRetornoColeta, 'Retorno de coleta', `Não coletado. Motivo: ${motivo}`);
        mostrarToast(`⚠️ Coleta não realizada!`);
    }
    cargaSelecionadaRetornoColeta.dataRetornoColeta = new Date(dr).toISOString();
    salvarBanco(); fecharModal('modalRetornoColeta'); atualizarDashboard(); atualizarTabela();
}

// ============================================
// EDIÇÃO DE CARGA
// ============================================
function abrirEdicaoCarga(carga) {
    if (!isMaster()) { mostrarToast('Apenas Master pode editar!', 'error'); return; }
    document.getElementById('editCargaId').value = carga.id;
    document.getElementById('editNotaFiscal').value = carga.notaFiscal;
    document.getElementById('editSap').value = carga.sap || '';
    document.getElementById('editCnpj').value = carga.cnpj || '';
    document.getElementById('editUf').value = carga.uf || '';
    document.getElementById('editCidade').value = getCidadeCarga(carga);
    document.getElementById('editEndereco').value = carga.endereco || '';
    document.getElementById('editMotorista').value = carga.motorista || '';
    document.getElementById('editPlaca').value = carga.placa || '';
    document.getElementById('editQtde').value = carga.qtde;
    document.getElementById('editValorUnitario').value = carga.valorUnitario;
    document.getElementById('editTipo').value = carga.tipo;
    document.getElementById('editStatus').value = carga.status;
    document.getElementById('editObservacoes').value = carga.observacoes || '';
    document.getElementById('editDataCarga').value = carga.dataCarga ? carga.dataCarga.split('T')[0] : '';
    document.getElementById('editDataRetorno').value = carga.dataRetorno ? carga.dataRetorno.split('T')[0] : '';
    document.getElementById('editDataSaidaColeta').value = carga.dataSaidaColeta ? carga.dataSaidaColeta.split('T')[0] : '';
    document.getElementById('editDataRetornoColeta').value = carga.dataRetornoColeta ? carga.dataRetornoColeta.split('T')[0] : '';
    const ec = document.getElementById('editClienteSelect'); if (carga.clienteId) ec.value = carga.clienteId; else ec.value = '';
    const er = document.getElementById('editRepresentanteSelect'); if (carga.representanteId) er.value = carga.representanteId; else er.value = '';
    const et = document.getElementById('editTransportadoraSelect'); if (carga.transportadoraId) et.value = carga.transportadoraId; else et.value = '';
    document.getElementById('modalEditarCarga').style.display = 'flex';
}

function salvarEdicaoCarga() {
    const id = parseInt(document.getElementById('editCargaId').value);
    const carga = bancoDados.cargas.find(c => c.id === id);
    if (!carga) { mostrarToast('Carga não encontrada!', 'error'); return; }
    const nf = document.getElementById('editNotaFiscal').value.trim();
    if (!nf) { mostrarToast('Nota Fiscal obrigatória!', 'error'); return; }
    if (bancoDados.cargas.some(c => c.notaFiscal === nf && c.id !== id)) { mostrarToast('Nota Fiscal já existe!', 'error'); return; }
    if (notaFiscalJaUsada(nf, carga.agendaTransportadoraId || null, id)) { mostrarToast('Nota Fiscal ja existe em outra carga ou agendamento!', 'error'); return; }
    const sc = document.getElementById('editClienteSelect'); const cn = document.getElementById('editClienteNovo').value.trim();
    const antes = JSON.stringify(carga);
    let cnome = '', cid = null, ccnpj = '', cuf = '', cend = '', ccidade = '';
    if (sc.value) { const c = bancoDados.clientes.find(c => c.id == sc.value); if (c) { cnome = c.razao; cid = c.id; ccnpj = c.cnpj; cuf = c.uf; cend = c.endereco; ccidade = c.cidade || ''; } }
    const rid = document.getElementById('editRepresentanteSelect').value;
    const rnome = rid ? bancoDados.representantes.find(r => r.id == rid)?.nome : '';
    const tid = document.getElementById('editTransportadoraSelect').value;
    const tnome = tid ? bancoDados.transportadoras.find(t => t.id == tid)?.nome : '';
    const motoristaEdit = document.getElementById('editMotorista').value.trim();
    const placaEdit = document.getElementById('editPlaca').value.trim().toUpperCase();
    if (!validarFrotaInterlandia(tnome, motoristaEdit, placaEdit)) return;
    carga.notaFiscal = nf;
    carga.sap = document.getElementById('editSap').value.trim();
    carga.clienteId = cid;
    carga.clienteNome = cnome || cn || carga.clienteNome;
    carga.cnpj = ccnpj || document.getElementById('editCnpj').value;
    carga.uf = cuf || document.getElementById('editUf').value;
    carga.cidade = ccidade || document.getElementById('editCidade').value;
    carga.endereco = cend || document.getElementById('editEndereco').value;
    carga.representanteId = rid || null;
    carga.representanteNome = rnome || '';
    carga.transportadoraId = tid || null;
    carga.transportadoraNome = tnome || '';
    carga.motorista = motoristaEdit;
    carga.placa = placaEdit;
    carga.tipo = document.getElementById('editTipo').value;
    carga.qtde = parseInt(document.getElementById('editQtde').value);
    carga.valorUnitario = parseFloat(document.getElementById('editValorUnitario').value);
    carga.valorTotal = carga.qtde * carga.valorUnitario;
    carga.status = document.getElementById('editStatus').value;
    carga.observacoes = document.getElementById('editObservacoes').value;
    const dc = document.getElementById('editDataCarga').value; if (dc) carga.dataCarga = new Date(dc).toISOString();
    const dr = document.getElementById('editDataRetorno').value; if (dr) carga.dataRetorno = new Date(dr).toISOString();
    const dsc = document.getElementById('editDataSaidaColeta').value; if (dsc) carga.dataSaidaColeta = new Date(dsc).toISOString();
    const drc = document.getElementById('editDataRetornoColeta').value; if (drc) carga.dataRetornoColeta = new Date(drc).toISOString();
    if (JSON.stringify(carga) !== antes) registrarAlteracao(carga, 'Editou carga', `NF ${carga.notaFiscal}`);
    salvarBanco(); carregarSelects(); fecharModal('modalEditarCarga'); atualizarDashboard(); atualizarTabela(); mostrarToast(`Carga ${carga.notaFiscal} atualizada!`);
}

// ============================================
// TABELA
// ============================================
function atualizarTabela() {
    const dados = filtrosAtivos ? cargasFiltradas : getTodasCargas();
    const tbody = document.getElementById('tabelaBody');
    tbody.innerHTML = '';
    if (!dados.length) { tbody.innerHTML = '<tr><td colspan="19" class="loading">📭 Nenhum registro</td></tr>'; return; }
    dados.forEach(c => {
        let dias = 0;
        if (c.status === 'VALE PALLETE' && c.dataRetorno) dias = calcularDias(c.dataRetorno);
        else if (c.status === 'EM COLETA' && c.dataSaidaColeta) dias = calcularDias(c.dataSaidaColeta);
        else if (c.status === 'ABERTO' && c.dataCarga) dias = calcularDias(c.dataCarga);
        const row = tbody.insertRow();
        row.insertCell(0).innerHTML = c.notaFiscal;
        row.insertCell(1).innerHTML = `<strong style="color:#8b5cf6;">${c.sap || '-'}</strong>`;
        row.insertCell(2).innerHTML = c.clienteNome;
        row.insertCell(3).innerHTML = c.cnpj || '-';
        row.insertCell(4).innerHTML = getCidadeCarga(c) || '-';
        row.insertCell(5).innerHTML = c.uf;
        row.insertCell(6).innerHTML = `<strong>${c.motorista || '-'}</strong>`;
        row.insertCell(7).innerHTML = `<strong>${c.placa || '-'}</strong>`;
        row.insertCell(8).innerHTML = c.transportadoraNome || '-';
        row.insertCell(9).innerHTML = c.representanteNome || '-';
        row.insertCell(10).innerHTML = formatarData(c.dataCarga);
        row.insertCell(11).innerHTML = formatarData(c.dataRetorno);
        row.insertCell(12).innerHTML = formatarData(c.dataSaidaColeta);
        row.insertCell(13).innerHTML = formatarData(c.dataRetornoColeta);
        row.insertCell(14).innerHTML = getStatusBadgeCarga(c);
        row.insertCell(15).innerHTML = `<strong style="color:${dias > 30 ? '#dc3545' : (dias > 15 ? '#ffc107' : '#28a745')}">${dias}</strong>`;
        row.insertCell(16).innerHTML = renderQtdeComC(c);
        row.insertCell(17).innerHTML = formatarMoeda(c.valorTotal);
        const acoes = row.insertCell(18);
        const qtdDocsCarga = contarDocumentosRegistro('carga', c.id);
        let bt = `<div style="display:flex; gap:3px; flex-wrap:wrap;">`;
        if (c.status === 'ABERTO' && podeOperarCargas()) bt += `<button class="btn-acao btn-retorno" onclick="event.stopPropagation(); abrirModalRetornoCarga(); document.getElementById('buscaRetornoNF').value='${c.notaFiscal}'; buscarCargaParaRetorno();"><i class="fas fa-undo-alt"></i> Ret</button>`;
        if (c.status === 'VALE PALLETE' && isMaster()) bt += `<button class="btn-acao btn-saida-coleta" onclick="event.stopPropagation(); abrirModalSaidaColeta(); document.getElementById('buscaSaidaNF').value='${c.sap || c.notaFiscal}'; buscarValeParaSaida();"><i class="fas fa-truck"></i> Sair</button>`;
        if (c.status === 'EM COLETA' && isMaster()) bt += `<button class="btn-acao btn-retorno-coleta" onclick="event.stopPropagation(); abrirModalRetornoColeta(); document.getElementById('buscaRetornoNFColeta').value='${c.sap || c.notaFiscal}'; buscarEmColetaParaRetorno();"><i class="fas fa-undo-alt"></i> Ret</button>`;
        if (isMaster()) bt += `<button class="btn-acao btn-editar" onclick="event.stopPropagation(); abrirEdicaoCarga(${JSON.stringify(c).replace(/"/g, '&quot;')});"><i class="fas fa-edit"></i> Editar</button>`;
        bt += `<button class="btn-acao btn-detalhes" onclick="event.stopPropagation(); abrirDocumentosParaRegistro('carga', ${c.id});"><i class="fas fa-paperclip"></i> Doc${qtdDocsCarga ? ` (${qtdDocsCarga})` : ''}</button>`;
        bt += `<button class="btn-acao btn-detalhes" onclick="event.stopPropagation(); alert('NF: ${c.notaFiscal}\\nCliente: ${c.clienteNome}\\nCidade: ${getCidadeCarga(c) || '-'}\\nSAP: ${c.sap || '-'}\\nTransportadora: ${c.transportadoraNome || '-'}\\nCondicao: ${c.condicaoTransportadora || '-'}\\nStatus: ${c.status}\\nUltima mudança: ${c.ultimaAlteracaoUsuario || c.usuarioNome || '-'}\\nValor: ${formatarMoeda(c.valorTotal)}');"><i class="fas fa-info-circle"></i> Info</button>`;
        bt += `</div>`;
        acoes.innerHTML = bt;
    });
}

// ============================================
// FILTROS
// ============================================
function aplicarFiltros() {
    const cliente = document.getElementById('filtroCliente').value;
    const status = document.getElementById('filtroStatus').value;
    const cidade = document.getElementById('filtroCidade').value;
    const uf = document.getElementById('filtroUF').value;
    const di = document.getElementById('filtroDataInicio').value;
    const df = document.getElementById('filtroDataFim').value;
    filtrosAtivos = true;
    cargasFiltradas = getTodasCargas().filter(c => {
        if (cliente !== 'Todos os clientes' && c.clienteNome !== cliente) return false;
        if (status !== 'Todos' && c.status !== status) return false;
        if (cidade !== 'Todas as cidades' && getCidadeCarga(c) !== cidade) return false;
        if (uf !== 'Todos os estados' && c.uf !== uf) return false;
        if (di && new Date(c.dataCarga) < new Date(di)) return false;
        if (df && new Date(c.dataCarga) > new Date(df)) return false;
        return true;
    });
    atualizarDashboard(); atualizarTabela();
    mostrarToast(`${cargasFiltradas.length} registros encontrados`, 'info');
}

function limparFiltros() {
    document.getElementById('filtroCliente').value = 'Todos os clientes';
    document.getElementById('filtroStatus').value = 'Todos';
    document.getElementById('filtroCidade').value = 'Todas as cidades';
    document.getElementById('filtroUF').value = 'Todos os estados';
    document.getElementById('filtroDataInicio').value = '';
    document.getElementById('filtroDataFim').value = '';
    filtrosAtivos = false;
    cargasFiltradas = [];
    atualizarDashboard(); atualizarTabela();
    mostrarToast('Filtros limpos', 'info');
}

function buscarCarga() {
    const termo = document.getElementById('buscaSAP').value.trim();
    if (!termo) { mostrarToast('Digite um termo', 'warning'); return; }
    const cargas = getTodasCargas().filter(c => c.notaFiscal.toLowerCase().includes(termo.toLowerCase()) || (c.sap && c.sap.includes(termo)) || c.clienteNome.toLowerCase().includes(termo.toLowerCase()));
    const div = document.getElementById('resultadoBusca');
    if (!cargas.length) { div.style.display = 'block'; div.innerHTML = '<div style="background:#2a1a1a; padding:12px; border-radius:8px;">❌ Nenhuma carga</div>'; setTimeout(() => div.style.display = 'none', 3000); return; }
    div.style.display = 'block';
    div.innerHTML = `<div style="background:#0f1a24; padding:12px; border-radius:8px; max-height:300px; overflow-y:auto;"><strong>📋 Encontradas (${cargas.length}):</strong><br>${cargas.map(c => `<div style="padding:8px; margin-top:8px; background:#1e2a3a; border-radius:6px;"><strong>NF:</strong> ${c.notaFiscal} | <strong>Status:</strong> ${getStatusBadgeCarga(c)}</div>`).join('')}</div>`;
    setTimeout(() => div.style.display = 'none', 5000);
}

function exportarRelatorio() {
    if (!podeExportarRelatorio()) { mostrarToast('Acesso restrito!', 'error'); return; }
    const dados = filtrosAtivos ? cargasFiltradas : getTodasCargas();
    if (!dados.length) { mostrarToast('Nenhum dado!', 'error'); return; }
    let csv = "Nota Fiscal;SAP;Cliente;CNPJ;Cidade;UF;Motorista;Placa;Transportadora;Condicao;Representante;Data Carga;Data Retorno;Data Saída Coleta;Data Retorno Coleta;Status;Quantidade;Valor Total;Usuario Cadastro;Usuario Ultima Mudanca;Data Ultima Mudanca;Acao Ultima Mudanca;Historico de Mudancas\n";
    dados.forEach(c => {
        const linha = [
            c.notaFiscal, c.sap || '', c.clienteNome, c.cnpj || '', getCidadeCarga(c) || '', c.uf,
            c.motorista, c.placa, c.transportadoraNome || '', c.condicaoTransportadora || '', c.representanteNome || '',
            formatarData(c.dataCarga), formatarData(c.dataRetorno), formatarData(c.dataSaidaColeta), formatarData(c.dataRetornoColeta),
            c.status, c.qtde, (Number(c.valorTotal) || 0).toFixed(2), c.usuarioNome || '',
            c.ultimaAlteracaoUsuario || '', formatarData(c.ultimaAlteracaoData), c.ultimaAlteracaoAcao || '', historicoAlteracoesTexto(c)
        ];
        csv += linha.map(csvValor).join(';') + "\n";
    });
    const blob = new Blob(["\uFEFF" + csv], { type: "text/csv;charset=utf-8;" }); const link = document.createElement("a"); link.href = URL.createObjectURL(blob); link.download = `relatorio_${new Date().toISOString().slice(0,19)}.csv`; link.click(); mostrarToast('Relatório exportado!');
}

// ============================================
// CADASTROS (Master/Faturamento)
// ============================================
function abrirModalCliente() { if (!podeCadastrarBasico()) { mostrarToast('Acesso restrito!', 'error'); return; } document.getElementById('modalCliente').style.display = 'flex'; document.querySelectorAll('#modalCliente input').forEach(i => i.value = ''); }
function salvarCliente() { if (!podeCadastrarBasico()) { mostrarToast('Acesso restrito!', 'error'); return; } const r = document.getElementById('clienteRazao').value.trim(); const c = document.getElementById('clienteCNPJ').value.trim(); if (!r || !c) { mostrarToast('Preencha razão e CNPJ!', 'error'); return; } bancoDados.clientes.push({ id: bancoDados.clientes.length + 1, razao: r, cnpj: c, telefone: document.getElementById('clienteTelefone').value, endereco: document.getElementById('clienteEndereco').value, cidade: document.getElementById('clienteCidade').value, uf: document.getElementById('clienteUF').value.toUpperCase() }); salvarBanco(); carregarSelects(); fecharModal('modalCliente'); mostrarToast(`Cliente ${r} cadastrado!`); }
function abrirModalTransportadora() { if (!podeCadastrarBasico()) { mostrarToast('Acesso restrito!', 'error'); return; } document.getElementById('modalTransportadora').style.display = 'flex'; document.querySelectorAll('#modalTransportadora input, #modalTransportadora textarea').forEach(i => i.value = ''); }
function salvarTransportadora() {
    if (!podeCadastrarBasico()) { mostrarToast('Acesso restrito!', 'error'); return; }
    const n = document.getElementById('transpNome').value.trim();
    if (!n) { mostrarToast('Informe o nome!', 'error'); return; }
    const frota = [];
    const motorista = document.getElementById('transpMotorista').value.trim();
    const carro = document.getElementById('transpCarro').value.trim().toUpperCase();
    if (motorista || carro) frota.push({ motorista, carro });
    document.getElementById('transpFrota').value.split(/\r?\n/).forEach(linha => {
        const texto = linha.trim();
        if (!texto) return;
        const partes = texto.split(/\s+-\s+|\s*;\s*|\s*,\s*/);
        frota.push({ motorista: (partes[0] || '').trim(), carro: (partes.slice(1).join(' ') || '').trim().toUpperCase() });
    });
    if (!validarFrotaInterlandiaLista(n, frota)) return;
    bancoDados.transportadoras.push({ id: bancoDados.transportadoras.length + 1, nome: n, cnpj: document.getElementById('transpCNPJ').value, telefone: document.getElementById('transpTelefone').value, contato: document.getElementById('transpContato').value, frota });
    salvarBanco(); carregarSelects(); fecharModal('modalTransportadora'); mostrarToast(`Transportadora ${n} cadastrada!`);
}
function getMotoristasTransportadoraAtual() {
    const transportadora = getTransportadoraUsuarioAtual();
    if (!transportadora) return [];
    return bancoDados.motoristasTransportadora.filter(m => Number(m.transportadoraId) === Number(transportadora.id));
}
function renderizarMotoristasTransportadora() {
    const lista = document.getElementById('listaMotoristasTransportadora');
    if (!lista) return;
    const motoristas = getMotoristasTransportadoraAtual();
    lista.innerHTML = `<h3>Motoristas cadastrados</h3>` + (motoristas.length ? motoristas.map(m => `
        <div class="registro-card">
            <strong>${htmlSeguro(m.nome)}</strong> | CNH: ${htmlSeguro(m.cnh || '-')}<br>
            <small>${htmlSeguro(m.tipoVeiculo || '-')} | Placa: ${htmlSeguro(m.placaPrincipal || '-')} | Carreta: ${htmlSeguro(m.placaCarreta || '-')}</small>
        </div>
    `).join('') : '<div class="agenda-empty">Nenhum motorista cadastrado para sua transportadora.</div>');
}
function abrirModalCadastroMotorista() {
    if (!podeCadastrarMotoristaTransportadora()) { mostrarToast('Acesso restrito!', 'error'); return; }
    const transportadora = getTransportadoraUsuarioAtual();
    if (!transportadora) { mostrarToast('Usuario sem transportadora vinculada.', 'error'); return; }
    document.getElementById('modalCadastroMotorista').style.display = 'flex';
    document.querySelectorAll('#modalCadastroMotorista input, #modalCadastroMotorista textarea').forEach(i => i.value = '');
    document.getElementById('motoristaTipoVeiculo').value = 'Truck';
    document.getElementById('motoristaTransportadoraNome').value = transportadora.nome;
    renderizarMotoristasTransportadora();
}
function salvarCadastroMotorista() {
    if (!podeCadastrarMotoristaTransportadora()) { mostrarToast('Acesso restrito!', 'error'); return; }
    const transportadora = getTransportadoraUsuarioAtual();
    if (!transportadora) { mostrarToast('Usuario sem transportadora vinculada.', 'error'); return; }
    const nome = document.getElementById('motoristaNomeCadastro').value.trim();
    const cnh = document.getElementById('motoristaCNH').value.trim();
    const placaPrincipal = document.getElementById('motoristaPlacaPrincipal').value.trim().toUpperCase();
    const tipoVeiculo = document.getElementById('motoristaTipoVeiculo').value;
    if (!nome || !cnh || !placaPrincipal) {
        mostrarToast('Informe nome, CNH e placa principal.', 'error');
        return;
    }
    if (!validarFrotaInterlandia(transportadora.nome, nome, placaPrincipal)) return;
    const cadastro = {
        id: proximoId(bancoDados.motoristasTransportadora),
        transportadoraId: transportadora.id,
        transportadoraNome: transportadora.nome,
        nome,
        cpf: document.getElementById('motoristaCPF').value.trim(),
        cnh,
        telefone: document.getElementById('motoristaTelefone').value.trim(),
        validadeCNH: document.getElementById('motoristaValidadeCNH').value,
        tipoVeiculo,
        placaPrincipal,
        placaCarreta: document.getElementById('motoristaPlacaCarreta').value.trim().toUpperCase(),
        modeloVeiculo: document.getElementById('motoristaModeloVeiculo').value.trim(),
        anoVeiculo: document.getElementById('motoristaAnoVeiculo').value,
        renavam: document.getElementById('motoristaRenavam').value.trim(),
        observacoes: document.getElementById('motoristaObservacoes').value.trim(),
        criadoEm: new Date().toISOString(),
        criadoPor: usuarioLogadoNome()
    };
    bancoDados.motoristasTransportadora = bancoDados.motoristasTransportadora.filter(m =>
        !(Number(m.transportadoraId) === Number(transportadora.id) && normalizarAgendaValor(m.nome) === normalizarAgendaValor(nome))
    );
    bancoDados.motoristasTransportadora.push(cadastro);
    if (!Array.isArray(transportadora.frota)) transportadora.frota = [];
    const frotaExistente = transportadora.frota.find(f => normalizarAgendaValor(f.motorista) === normalizarAgendaValor(nome));
    const frotaDados = { motorista: nome, carro: placaPrincipal, cnh, tipoVeiculo, placaCarreta: cadastro.placaCarreta };
    if (frotaExistente) Object.assign(frotaExistente, frotaDados);
    else transportadora.frota.push(frotaDados);
    salvarBanco();
    atualizarListas();
    renderizarMotoristasTransportadora();
    document.querySelectorAll('#modalCadastroMotorista input:not(#motoristaTransportadoraNome), #modalCadastroMotorista textarea').forEach(i => i.value = '');
    mostrarToast('Motorista cadastrado!');
}
function abrirModalRepresentante() { if (!podeCadastrarBasico()) { mostrarToast('Acesso restrito!', 'error'); return; } document.getElementById('modalRepresentante').style.display = 'flex'; document.querySelectorAll('#modalRepresentante input').forEach(i => i.value = ''); }
function salvarRepresentante() { if (!podeCadastrarBasico()) { mostrarToast('Acesso restrito!', 'error'); return; } const n = document.getElementById('repNome').value.trim(); if (!n) { mostrarToast('Informe o nome!', 'error'); return; } bancoDados.representantes.push({ id: bancoDados.representantes.length + 1, nome: n, telefone: document.getElementById('repTelefone').value, email: document.getElementById('repEmail').value, regiao: document.getElementById('repRegiao').value }); salvarBanco(); carregarSelects(); fecharModal('modalRepresentante'); mostrarToast(`Representante ${n} cadastrado!`); }

// ============================================
// AGENDA POR TRANSPORTADORA
// ============================================
function htmlSeguro(v) {
    return String(v ?? '').replace(/[&<>"']/g, ch => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[ch]));
}

function getAgendaTransportadora() {
    garantirEstruturaBanco();
    bancoDados.agendaTransportadora.forEach(normalizarNotasAgendaLegado);
    return bancoDados.agendaTransportadora;
}

function getAgendaTransportadoraVisivel() {
    return filtrarAgendaPorPermissao(getAgendaTransportadora());
}

function normalizarAgendaValor(v) {
    return String(v || '').trim().toUpperCase();
}

function notaFiscalJaUsada(notaFiscal, agendaIgnorarId = null, cargaIgnorarId = null) {
    const nf = normalizarAgendaValor(notaFiscal);
    if (!nf) return false;
    const existeNaCarga = bancoDados.cargas.some(c =>
        [c.notaFiscal, c.notaProduto, c.notaPalete].some(valor => normalizarAgendaValor(valor) === nf) &&
        (cargaIgnorarId === null || Number(c.id) !== Number(cargaIgnorarId))
    );
    const existeNaAgenda = getAgendaTransportadora().some(a =>
        [a.notaFiscal, a.notaProduto, a.notaPalete].some(v => normalizarAgendaValor(v) === nf) &&
        (agendaIgnorarId === null || Number(a.id) !== Number(agendaIgnorarId))
    );
    return existeNaCarga || existeNaAgenda;
}

function getNotaProdutoAgenda(item) {
    return String(item?.notaProduto || item?.notaFiscal || '').trim();
}

function getNotaPaleteAgenda(item) {
    return String(item?.notaPalete || '').trim();
}

function normalizarNotasAgendaLegado(item) {
    if (!item) return;
    if (!item.notaProduto && item.notaFiscal) item.notaProduto = item.notaFiscal;
    if (!item.notaFiscal && item.notaProduto) item.notaFiscal = item.notaProduto;
    if (!item.transportadoraId && item.transportadora) {
        const transportadora = getTransportadoraPorNomeAgenda(item.transportadora);
        if (transportadora) item.transportadoraId = transportadora.id;
    }
}

function buscarAgendaPendenteMesmoVeiculo(motorista, placa, transportadoraNome = '') {
    const m = normalizarAgendaValor(motorista);
    const p = normalizarAgendaValor(placa);
    const t = normalizarAgendaValor(transportadoraNome);
    if (!m || !p) return null;
    return getAgendaTransportadora().find(item =>
        normalizarAgendaValor(item.motorista) === m &&
        normalizarAgendaValor(item.placa) === p &&
        (!t || normalizarAgendaValor(item.transportadora) === t) &&
        item.status !== 'BAIXADO'
    );
}

function iniciarAgendaTempoReal() {
    pararAgendaTempoReal();
    if (!podeVerAgenda()) return;
    agendaTempoRealTimer = setInterval(() => {
        if (!usuarioAtual || !document.getElementById('agendaTransportadoraPanel')) return;
        if (mysqlAtivo) carregarBancoMySQL();
        else atualizarAgendaTransportadora();
    }, 15000);
}

function pararAgendaTempoReal() {
    if (agendaTempoRealTimer) clearInterval(agendaTempoRealTimer);
    agendaTempoRealTimer = null;
}

function formatarDataHoraAgenda(d) {
    if (!d) return '-';
    const data = new Date(d);
    if (Number.isNaN(data.getTime())) return '-';
    return data.toLocaleDateString('pt-BR') + ' ' + data.toLocaleTimeString('pt-BR', { hour: '2-digit', minute: '2-digit' });
}

function formatarDataInputAgenda(data = new Date()) {
    const local = new Date(data.getTime() - data.getTimezoneOffset() * 60000);
    return local.toISOString().slice(0, 16);
}

function calcularDiasAgenda(item) {
    if (!item?.dataAgenda) return 0;
    const inicio = new Date(item.dataAgenda);
    const fim = item.dataBaixa ? new Date(item.dataBaixa) : new Date();
    if (Number.isNaN(inicio.getTime()) || Number.isNaN(fim.getTime())) return 0;
    return Math.max(0, Math.ceil((fim - inicio) / (1000 * 60 * 60 * 24)));
}

function alternarAgendaTransportadora() {
    if (!podeVerAgenda()) { mostrarToast('Acesso restrito!', 'error'); return; }
    const painel = document.getElementById('agendaTransportadoraPanel');
    if (!painel) return;
    painel.classList.toggle('active');
    atualizarAgendaTransportadora();
    if (painel.classList.contains('active')) painel.scrollIntoView({ behavior: 'smooth', block: 'start' });
}

function alternarDocumentosPanel() {
    if (!podeAnexarDocumento()) { mostrarToast('Acesso restrito!', 'error'); return; }
    const painel = document.getElementById('documentosPanel');
    if (!painel) return;
    painel.classList.toggle('active');
    if (painel.classList.contains('active')) {
        atualizarRegistrosDocumento();
        renderizarDocumentosAnexados();
        painel.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
}

function abrirDocumentosParaRegistro(tipo, id) {
    if (!podeAnexarDocumento()) { mostrarToast('Acesso restrito!', 'error'); return; }
    const painel = document.getElementById('documentosPanel');
    if (painel) painel.classList.add('active');
    const origem = document.getElementById('docOrigem');
    if (origem) origem.value = tipo === 'agenda' ? 'agenda' : 'carga';
    atualizarRegistrosDocumento();
    const select = document.getElementById('docRegistro');
    if (select) select.value = `${tipo}:${id}`;
    renderizarDocumentosAnexados();
    if (painel) painel.scrollIntoView({ behavior: 'smooth', block: 'start' });
}

function getRegistrosDocumentoVisiveis() {
    const cargas = getTodasCargas().map(c => ({
        tipo: 'carga',
        id: c.id,
        label: `Carga | NF ${c.notaFiscal || '-'} | ${c.clienteNome || '-'} | ${c.transportadoraNome || '-'}`,
        busca: [c.notaFiscal, c.sap, c.clienteNome, c.motorista, c.placa, c.transportadoraNome, c.status].join(' ')
    }));
    const agendas = getAgendaTransportadoraVisivel().map(a => ({
        tipo: 'agenda',
        id: a.id,
        label: `${a.tipo === 'descarrego' ? 'Descarrego' : 'Agenda nova carga'} | ${a.cliente || '-'} | ${a.transportadora || '-'} | ${a.placa || '-'}`,
        busca: [a.notaFiscal, a.notaProduto, a.notaPalete, a.cliente, a.motorista, a.placa, a.transportadora, a.status].join(' ')
    }));
    return cargas.concat(agendas);
}

function atualizarRegistrosDocumento() {
    const select = document.getElementById('docRegistro');
    if (!select) return;
    const anterior = select.value;
    const origem = document.getElementById('docOrigem')?.value || 'todos';
    const busca = normalizarAgendaValor(document.getElementById('docBusca')?.value || '');
    let registros = getRegistrosDocumentoVisiveis();
    if (origem !== 'todos') registros = registros.filter(r => r.tipo === origem);
    if (busca) registros = registros.filter(r => normalizarAgendaValor(`${r.label} ${r.busca}`).includes(busca));
    select.innerHTML = registros.length
        ? registros.map(r => `<option value="${r.tipo}:${r.id}">${htmlSeguro(r.label)}</option>`).join('')
        : '<option value="">Nenhuma carga ou descarrego disponivel</option>';
    if (anterior && [...select.options].some(o => o.value === anterior)) select.value = anterior;
    renderizarDocumentosAnexados();
}

function getDocumentosVisiveis() {
    garantirEstruturaBanco();
    const chavesVisiveis = new Set(getRegistrosDocumentoVisiveis().map(r => `${r.tipo}:${r.id}`));
    return bancoDados.documentosAnexados.filter(d => chavesVisiveis.has(`${d.tipoRegistro}:${d.registroId}`));
}

function contarDocumentosRegistro(tipo, id) {
    garantirEstruturaBanco();
    return bancoDados.documentosAnexados.filter(d => d.tipoRegistro === tipo && Number(d.registroId) === Number(id)).length;
}

function formatarTamanhoArquivo(bytes) {
    const n = Number(bytes) || 0;
    if (n < 1024) return `${n} B`;
    if (n < 1024 * 1024) return `${(n / 1024).toFixed(1)} KB`;
    return `${(n / (1024 * 1024)).toFixed(1)} MB`;
}

function renderizarDocumentosAnexados() {
    const lista = document.getElementById('documentosLista');
    if (!lista) return;
    const selecionado = document.getElementById('docRegistro')?.value || '';
    let docs = getDocumentosVisiveis();
    if (selecionado) {
        const [tipo, id] = selecionado.split(':');
        docs = docs.filter(d => d.tipoRegistro === tipo && Number(d.registroId) === Number(id));
    }
    docs.sort((a, b) => new Date(b.criadoEm || 0) - new Date(a.criadoEm || 0));
    if (!docs.length) {
        lista.innerHTML = '<div class="agenda-empty">Nenhum documento anexado para este registro.</div>';
        return;
    }
    lista.innerHTML = docs.map(doc => {
        const podeExcluir = isMaster() || doc.criadoPor === usuarioLogadoNome();
        return `
            <div class="documento-card">
                <div>
                    <strong>${htmlSeguro(doc.tipoDocumento || 'Documento')}${doc.numero ? ' - ' + htmlSeguro(doc.numero) : ''}</strong>
                    <div class="documento-meta">
                        ${htmlSeguro(doc.registroLabel || `${doc.tipoRegistro}:${doc.registroId}`)}<br>
                        Arquivo: ${htmlSeguro(doc.arquivoNome || '-')} (${formatarTamanhoArquivo(doc.arquivoTamanho)}) | ${formatarDataHoraAgenda(doc.criadoEm)} | ${htmlSeguro(doc.criadoPor || '-')}
                        ${doc.observacoes ? `<br>${htmlSeguro(doc.observacoes)}` : ''}
                    </div>
                </div>
                <div class="documento-actions">
                    <button class="btn-acao btn-detalhes" onclick="abrirDocumentoAnexo(${doc.id})"><i class="fas fa-download"></i> Abrir</button>
                    ${podeExcluir ? `<button class="btn-acao btn-excluir" onclick="excluirDocumentoAnexo(${doc.id})"><i class="fas fa-trash"></i> Excluir</button>` : ''}
                </div>
            </div>
        `;
    }).join('');
}

function salvarDocumentoAnexo() {
    if (!podeAnexarDocumento()) { mostrarToast('Acesso restrito!', 'error'); return; }
    const tipoDocumento = document.getElementById('docTipo')?.value;
    const registro = document.getElementById('docRegistro')?.value || '';
    const numero = document.getElementById('docNumero')?.value.trim() || '';
    const arquivoInput = document.getElementById('docArquivo');
    const observacoes = document.getElementById('docObservacoes')?.value.trim() || '';
    const arquivo = arquivoInput?.files?.[0];
    if (!tipoDocumento || !registro) { mostrarToast('Selecione a carga ou descarrego vinculado.', 'error'); return; }
    if (!arquivo) { mostrarToast('Selecione o arquivo do documento.', 'error'); return; }
    if (arquivo.size > 2 * 1024 * 1024) { mostrarToast('Arquivo muito grande. Use ate 2 MB por documento.', 'error'); return; }
    const [tipoRegistro, idRegistro] = registro.split(':');
    const alvo = getRegistrosDocumentoVisiveis().find(r => r.tipo === tipoRegistro && Number(r.id) === Number(idRegistro));
    if (!alvo) { mostrarToast('Registro nao disponivel para este usuario.', 'error'); return; }

    const reader = new FileReader();
    reader.onload = () => {
        garantirEstruturaBanco();
        bancoDados.documentosAnexados.push({
            id: proximoId(bancoDados.documentosAnexados),
            tipoDocumento,
            tipoRegistro,
            registroId: Number(idRegistro),
            registroLabel: alvo.label,
            numero,
            arquivoNome: arquivo.name,
            arquivoTipo: arquivo.type || 'application/octet-stream',
            arquivoTamanho: arquivo.size,
            arquivoData: reader.result,
            observacoes,
            criadoEm: new Date().toISOString(),
            criadoPor: usuarioLogadoNome()
        });
        salvarBanco();
        if (arquivoInput) arquivoInput.value = '';
        const campoNumero = document.getElementById('docNumero');
        const campoObs = document.getElementById('docObservacoes');
        if (campoNumero) campoNumero.value = '';
        if (campoObs) campoObs.value = '';
        renderizarDocumentosAnexados();
        atualizarTabela();
        atualizarAgendaTransportadora();
        mostrarToast('Documento anexado com sucesso!');
    };
    reader.onerror = () => mostrarToast('Nao foi possivel ler o arquivo.', 'error');
    reader.readAsDataURL(arquivo);
}

function abrirDocumentoAnexo(id) {
    const doc = getDocumentosVisiveis().find(d => Number(d.id) === Number(id));
    if (!doc?.arquivoData) { mostrarToast('Documento nao encontrado.', 'error'); return; }
    const link = document.createElement('a');
    link.href = doc.arquivoData;
    link.download = doc.arquivoNome || `${doc.tipoDocumento || 'documento'}.pdf`;
    document.body.appendChild(link);
    link.click();
    link.remove();
}

function excluirDocumentoAnexo(id) {
    const doc = bancoDados.documentosAnexados.find(d => Number(d.id) === Number(id));
    if (!doc) { mostrarToast('Documento nao encontrado.', 'error'); return; }
    if (!isMaster() && doc.criadoPor !== usuarioLogadoNome()) { mostrarToast('Apenas o autor ou master pode excluir este documento.', 'error'); return; }
    if (!confirm('Excluir este documento anexado?')) return;
    bancoDados.documentosAnexados = bancoDados.documentosAnexados.filter(d => Number(d.id) !== Number(id));
    salvarBanco();
    renderizarDocumentosAnexados();
    atualizarTabela();
    atualizarAgendaTransportadora();
    mostrarToast('Documento excluido.', 'info');
}

function atualizarCamposAgendaTransportadora() {
    const tipo = document.getElementById('agendaTipo')?.value;
    const notaProduto = document.getElementById('agendaNotaProduto');
    const notaPalete = document.getElementById('agendaNotaPalete');
    const notaProdutoGrupo = document.getElementById('agendaNotaProdutoGrupo');
    const notaPaleteGrupo = document.getElementById('agendaNotaPaleteGrupo');
    const notaFiscalAntiga = document.getElementById('agendaNotaFiscal');
    const cliente = document.getElementById('agendaCliente');
    const exigeNotaNoAgendamento = tipo === 'descarrego';
    if (notaProdutoGrupo) notaProdutoGrupo.style.display = exigeNotaNoAgendamento ? 'block' : 'none';
    if (notaPaleteGrupo) notaPaleteGrupo.style.display = exigeNotaNoAgendamento ? 'grid' : 'none';
    if (!exigeNotaNoAgendamento) {
        if (notaProduto) notaProduto.value = '';
        if (notaPalete) notaPalete.value = '';
    }
    if (notaProduto) notaProduto.placeholder = 'NF do produto no descarrego';
    if (notaPalete) notaPalete.placeholder = 'NF de palete no descarrego';
    if (notaFiscalAntiga) notaFiscalAntiga.value = notaProduto?.value || '';
    if (cliente) cliente.placeholder = tipo === 'descarrego' ? 'Cliente do descarrego' : 'Cliente que vai fazer a coleta';
}

function abrirModalAgendaTransportadora() {
    if (!podeCriarAgenda()) { mostrarToast('Acesso restrito!', 'error'); return; }
    carregarSelects();
    document.getElementById('modalAgendaTransportadora').style.display = 'flex';
    ['agendaTransportadoraNome', 'agendaMotorista', 'agendaPlaca', 'agendaQuantidade', 'agendaNotaProduto', 'agendaNotaPalete', 'agendaNotaFiscal', 'agendaCliente', 'agendaObservacoes'].forEach(id => {
        const el = document.getElementById(id);
        if (el) el.value = '';
    });
    document.getElementById('agendaTipo').value = 'coleta';
    document.getElementById('agendaVeiculo').value = 'Caminhao';
    document.getElementById('agendaTipoCarga').value = 'Palete';
    document.getElementById('agendaData').value = formatarDataInputAgenda();
    const inputTransportadora = document.getElementById('agendaTransportadoraNome');
    if (inputTransportadora) {
        const transportadoraUsuario = getTransportadoraUsuarioAtual();
        inputTransportadora.readOnly = isTransportadora();
        inputTransportadora.value = isTransportadora() ? (transportadoraUsuario?.nome || '') : '';
    }
    atualizarCamposAgendaTransportadora();
}

function salvarAgendaTransportadora() {
    if (!podeCriarAgenda()) { mostrarToast('Acesso restrito!', 'error'); return; }
    const tipo = document.getElementById('agendaTipo').value;
    const dataAgenda = document.getElementById('agendaData').value;
    let transportadora = document.getElementById('agendaTransportadoraNome').value.trim();
    let transportadoraAgenda = getTransportadoraPorNomeAgenda(transportadora);
    if (isTransportadora()) {
        transportadoraAgenda = getTransportadoraUsuarioAtual();
        if (!transportadoraAgenda) {
            mostrarToast('Seu usuario de transportadora nao esta vinculado a uma transportadora cadastrada.', 'error');
            return;
        }
        transportadora = transportadoraAgenda.nome;
        document.getElementById('agendaTransportadoraNome').value = transportadora;
    }
    const motorista = document.getElementById('agendaMotorista').value.trim();
    const placa = document.getElementById('agendaPlaca').value.trim().toUpperCase();
    const veiculo = document.getElementById('agendaVeiculo').value;
    const tipoCarga = document.getElementById('agendaTipoCarga').value;
    const quantidade = parseInt(document.getElementById('agendaQuantidade').value) || 0;
    const notaProduto = document.getElementById('agendaNotaProduto').value.trim();
    const notaPalete = document.getElementById('agendaNotaPalete').value.trim();
    const notaFiscal = notaProduto;
    const notaFiscalAntiga = document.getElementById('agendaNotaFiscal');
    if (notaFiscalAntiga) notaFiscalAntiga.value = notaProduto;
    const cliente = document.getElementById('agendaCliente').value.trim();
    const observacoes = document.getElementById('agendaObservacoes').value.trim();

    if (!dataAgenda || !transportadora || !motorista || !placa || !quantidade) {
        mostrarToast('Preencha data, transportadora, motorista, placa e quantidade.', 'error');
        return;
    }
    if (!cliente) {
        mostrarToast('Informe o cliente da agenda.', 'error');
        return;
    }
    if (tipo === 'descarrego') {
        if (!notaProduto || !notaPalete) {
            mostrarToast('Informe a nota fiscal do produto e a nota fiscal de palete.', 'error');
            return;
        }
        if (normalizarAgendaValor(notaProduto) === normalizarAgendaValor(notaPalete)) {
            mostrarToast('Nota fiscal do produto e nota fiscal de palete nao podem ser iguais.', 'error');
            return;
        }
    }
    if (!validarFrotaInterlandia(transportadora, motorista, placa)) {
        return;
    }
    if ((notaProduto && notaFiscalJaUsada(notaProduto)) || (notaPalete && notaFiscalJaUsada(notaPalete))) {
        mostrarToast('Nota fiscal ja cadastrada em outra carga ou agendamento. Cada cliente precisa ter suas proprias notas.', 'error');
        return;
    }
    const agendaPendente = buscarAgendaPendenteMesmoVeiculo(motorista, placa, transportadora);
    if (agendaPendente) {
        mostrarToast(`Este motorista e placa ja possuem agendamento pendente. So pode agendar novamente apos a baixa.`, 'error');
        return;
    }

    const item = {
        id: proximoId(getAgendaTransportadora()),
        tipo,
        dataAgenda: new Date(dataAgenda).toISOString(),
        transportadoraId: transportadoraAgenda?.id || null,
        transportadora,
        motorista,
        placa,
        veiculo,
        tipoCarga,
        quantidade,
        notaFiscal,
        notaProduto,
        notaPalete,
        cliente,
        observacoes,
        status: 'PENDENTE',
        dataBaixa: null,
        diasBaixa: null,
        criadoEm: new Date().toISOString(),
        criadoPor: usuarioLogadoNome(),
        baixaPor: '',
        observacaoBaixa: ''
    };

    bancoDados.agendaTransportadora.push(item);
    salvarBanco();
    fecharModal('modalAgendaTransportadora');
    document.getElementById('agendaTransportadoraPanel')?.classList.add('active');
    atualizarAgendaTransportadora();
    mostrarToast('Agendamento salvo!');
}

function getClientePorNomeAgenda(nome) {
    const alvo = normalizarAgendaValor(nome);
    return bancoDados.clientes.find(c => normalizarAgendaValor(c.razao) === alvo);
}

function getTransportadoraPorNomeAgenda(nome) {
    const alvo = normalizarAgendaValor(nome);
    return bancoDados.transportadoras.find(t => normalizarAgendaValor(t.nome) === alvo);
}

function sincronizarCargaDaAgenda(item) {
    if (!item || item.tipo !== 'coleta') return false;
    const notaFiscal = getNotaProdutoAgenda(item);
    const notaPalete = getNotaPaleteAgenda(item);
    const clienteNome = String(item.cliente || '').trim();
    if (!notaFiscal || !notaPalete || !clienteNome) return false;

    const existente = bancoDados.cargas.find(c =>
        normalizarAgendaValor(c.notaFiscal) === normalizarAgendaValor(notaFiscal) &&
        Number(c.agendaTransportadoraId) === Number(item.id)
    );
    if (existente) {
        existente.agendaTransportadoraId = item.id;
        if (!existente.clienteNome) existente.clienteNome = clienteNome;
        if (!existente.motorista) existente.motorista = item.motorista || '';
        if (!existente.placa) existente.placa = item.placa || '';
        if (!existente.transportadoraNome) existente.transportadoraNome = item.transportadora || '';
        if (!existente.notaPalete) existente.notaPalete = notaPalete;
        registrarAlteracao(existente, 'Vinculou baixa de agenda', `Agenda ${item.id}. NF palete ${notaPalete}`);
        return false;
    }

    const cliente = getClientePorNomeAgenda(clienteNome);
    const transportadora = getTransportadoraPorNomeAgenda(item.transportadora);
    const qtde = Number(item.quantidade) || 0;
    const novaCarga = {
        id: proximoId(bancoDados.cargas),
        usuarioId: usuarioAtual?.id || null,
        usuarioNome: usuarioLogadoNome(),
        notaFiscal,
        notaPalete,
        sap: '',
        clienteId: cliente?.id || null,
        clienteNome,
        cnpj: cliente?.cnpj || '',
        endereco: cliente?.endereco || '',
        cidade: cliente?.cidade || '',
        uf: cliente?.uf || '',
        representanteId: null,
        representanteNome: '',
        transportadoraId: transportadora?.id || null,
        transportadoraNome: item.transportadora || '',
        tipo: normalizarAgendaValor(item.tipoCarga) === 'CARGA BATIDA' ? 'nao_paletizada' : 'paletizada',
        qtde,
        valorUnitario: 0,
        valorTotal: 0,
        motorista: item.motorista || '',
        placa: item.placa || '',
        dataCarga: item.dataBaixa || new Date().toISOString(),
        dataRetorno: null,
        dataSaidaColeta: null,
        dataRetornoColeta: null,
        status: 'ABERTO',
        observacoes: `Criado pela baixa do agendamento ${item.id}. NF palete: ${notaPalete}`,
        motivoVale: '',
        motivoNaoColetado: '',
        agendaTransportadoraId: item.id
    };
    registrarAlteracao(novaCarga, 'Criou carga por baixa de agenda', `Agenda ${item.id}. NF produto ${notaFiscal}. NF palete ${notaPalete}`);
    bancoDados.cargas.push(novaCarga);
    return true;
}

function baixarAgendaTransportadora(id) {
    if (!podeBaixarAgenda()) { mostrarToast('Acesso restrito!', 'error'); return; }
    const item = getAgendaTransportadora().find(a => a.id === id);
    if (!item || item.status === 'BAIXADO') return;
    const antes = {
        cliente: item.cliente || '',
        notaFiscal: item.notaFiscal || '',
        notaProduto: item.notaProduto || '',
        notaPalete: item.notaPalete || '',
        status: item.status,
        dataBaixa: item.dataBaixa,
        diasBaixa: item.diasBaixa,
        baixaPor: item.baixaPor || '',
        observacaoBaixa: item.observacaoBaixa || ''
    };
    const cancelarBaixa = () => {
        Object.assign(item, antes);
        mostrarToast('Baixa cancelada.', 'info');
    };
    if (!String(item.cliente || '').trim()) {
        const cliente = prompt('Cliente da carga/coleta (obrigatorio):', item.cliente || '');
        if (cliente === null) { cancelarBaixa(); return; }
        item.cliente = cliente.trim();
    }
    if (!item.cliente) { mostrarToast('Informe o cliente para dar baixa.', 'error'); return; }
    if (!getNotaProdutoAgenda(item)) {
        const notaProduto = prompt('Nota fiscal do produto (obrigatoria para baixa):', item.notaProduto || item.notaFiscal || '');
        if (notaProduto === null) { cancelarBaixa(); return; }
        item.notaProduto = notaProduto.trim();
        item.notaFiscal = item.notaProduto;
    }
    if (!getNotaPaleteAgenda(item)) {
        const notaPalete = prompt('Nota fiscal de palete (obrigatoria para baixa):', item.notaPalete || '');
        if (notaPalete === null) { cancelarBaixa(); return; }
        item.notaPalete = notaPalete.trim();
    }
    if (!getNotaProdutoAgenda(item) || !getNotaPaleteAgenda(item)) { mostrarToast('Informe a nota fiscal do produto e a nota fiscal de palete para dar baixa.', 'error'); return; }
    if (normalizarAgendaValor(getNotaProdutoAgenda(item)) === normalizarAgendaValor(getNotaPaleteAgenda(item))) {
        Object.assign(item, antes);
        mostrarToast('Nota fiscal do produto e nota fiscal de palete nao podem ser iguais.', 'error');
        return;
    }
    if (notaFiscalJaUsada(getNotaProdutoAgenda(item), item.id) || notaFiscalJaUsada(getNotaPaleteAgenda(item), item.id)) {
        Object.assign(item, antes);
        mostrarToast('Nota fiscal ja usada em outra carga ou agendamento. Informe notas fiscais diferentes.', 'error');
        return;
    }
    const obs = prompt('Observacao da baixa (opcional):');
    if (obs === null) { cancelarBaixa(); return; }
    item.status = 'BAIXADO';
    item.dataBaixa = new Date().toISOString();
    item.diasBaixa = calcularDiasAgenda(item);
    item.baixaPor = usuarioLogadoNome();
    item.observacaoBaixa = obs.trim();
    const criouCarga = sincronizarCargaDaAgenda(item);
    salvarBanco();
    atualizarDashboard();
    atualizarTabela();
    atualizarAgendaTransportadora();
    mostrarToast(criouCarga ? `Baixa registrada e carga criada na tabela.` : `Baixa registrada em ${item.diasBaixa} dia(s).`);
}

function atualizarAgendaTransportadora() {
    const resumo = document.getElementById('agendaResumo');
    const lista = document.getElementById('agendaLista');
    const board = document.getElementById('agendaBoardTransportadora');
    if (!resumo || !lista) return;

    if (isTransportadora() && !getTransportadoraUsuarioAtual()) {
        resumo.innerHTML = `
            <div class="agenda-summary-card"><span>Pendentes</span><strong>0</strong></div>
            <div class="agenda-summary-card"><span>Baixados</span><strong>0</strong></div>
            <div class="agenda-summary-card"><span>Nova carga</span><strong>0</strong></div>
            <div class="agenda-summary-card"><span>Descarregos</span><strong>0</strong></div>
        `;
        if (board) {
            board.style.display = 'grid';
            board.innerHTML = '<div class="agenda-empty">Seu usuario precisa estar vinculado a uma transportadora cadastrada.</div>';
        }
        lista.innerHTML = '<div class="agenda-empty">Nenhum agendamento disponivel para este usuario.</div>';
        return;
    }

    const itens = getAgendaTransportadoraVisivel();
    const pendentes = itens.filter(i => i.status !== 'BAIXADO');
    const baixados = itens.filter(i => i.status === 'BAIXADO');
    const descarregos = itens.filter(i => i.tipo === 'descarrego');
    const coletas = itens.filter(i => i.tipo === 'coleta');

    resumo.innerHTML = `
        <div class="agenda-summary-card"><span>Pendentes</span><strong>${pendentes.length}</strong></div>
        <div class="agenda-summary-card"><span>Baixados</span><strong>${baixados.length}</strong></div>
        <div class="agenda-summary-card"><span>Nova carga</span><strong>${coletas.length}</strong></div>
        <div class="agenda-summary-card"><span>Descarregos</span><strong>${descarregos.length}</strong></div>
    `;

    if (board) {
        board.style.display = isTransportadora() ? 'grid' : 'none';
        if (isTransportadora()) {
            const renderItem = item => `
                <div class="agenda-board-item">
                    <strong>${htmlSeguro(item.placa || '-')}</strong> - ${htmlSeguro(item.motorista || '-')}<br>
                    ${item.tipo === 'descarrego' ? 'Descarrego' : 'NOVA CARGA'} | ${htmlSeguro(item.cliente || '-')}<br>
                    NF Produto: ${htmlSeguro(getNotaProdutoAgenda(item) || '-')} | NF Palete: ${htmlSeguro(getNotaPaleteAgenda(item) || '-')}<br>
                    ${htmlSeguro(item.veiculo || '-')} | ${htmlSeguro(item.tipoCarga || '-')} | Qtde ${item.quantidade || 0}<br>
                    <small>${formatarDataHoraAgenda(item.dataAgenda)}${item.dataBaixa ? ' | Baixa: ' + formatarDataHoraAgenda(item.dataBaixa) : ''}</small>
                </div>
            `;
            board.innerHTML = `
                <div class="agenda-board-section">
                    <h4>Faltam dar baixa</h4>
                    <div class="agenda-board-list">${pendentes.map(renderItem).join('') || '<div class="agenda-empty">Nenhum veiculo pendente.</div>'}</div>
                </div>
                <div class="agenda-board-section">
                    <h4>Ja deram baixa</h4>
                    <div class="agenda-board-list">${baixados.slice(0, 20).map(renderItem).join('') || '<div class="agenda-empty">Nenhum veiculo baixado.</div>'}</div>
                </div>
            `;
        }
    }

    if (!itens.length) {
        lista.innerHTML = '<div class="agenda-empty">Nenhum agendamento registrado.</div>';
        return;
    }

    const ordenados = [...itens].sort((a, b) => {
        if (a.status !== b.status) return a.status === 'PENDENTE' ? -1 : 1;
        return new Date(b.dataAgenda) - new Date(a.dataAgenda);
    });

    lista.innerHTML = `
        <div class="agenda-table-wrap">
            <table class="agenda-table">
                <thead>
                    <tr>
                        <th>Status</th><th>Agenda</th><th>Tipo</th><th>Transportadora</th><th>Motorista</th>
                        <th>Placa/Veiculo</th><th>Carga</th><th>Qtde</th><th>NF Produto</th><th>NF Palete</th><th>Cliente</th>
                        <th>Dias</th><th>Baixa</th><th>Acoes</th>
                    </tr>
                </thead>
                <tbody>
                    ${ordenados.map(item => {
                        const dias = item.status === 'BAIXADO' ? (item.diasBaixa ?? calcularDiasAgenda(item)) : calcularDiasAgenda(item);
                        const statusClass = item.status === 'BAIXADO' ? 'baixado' : 'pendente';
                        const qtdDocsAgenda = contarDocumentosRegistro('agenda', item.id);
                        return `
                            <tr>
                                <td><span class="agenda-status ${statusClass}">${item.status === 'BAIXADO' ? 'Baixado' : 'Pendente'}</span></td>
                                <td>${formatarDataHoraAgenda(item.dataAgenda)}</td>
                                <td>${item.tipo === 'descarrego' ? 'Descarrego' : 'NOVA CARGA'}</td>
                                <td>${htmlSeguro(item.transportadora)}</td>
                                <td>${htmlSeguro(item.motorista)}</td>
                                <td><strong>${htmlSeguro(item.placa)}</strong><br><small>${htmlSeguro(item.veiculo)}</small></td>
                                <td>${htmlSeguro(item.tipoCarga)}</td>
                                <td>${item.quantidade || 0}</td>
                                <td>${htmlSeguro(getNotaProdutoAgenda(item) || '-')}</td>
                                <td>${htmlSeguro(getNotaPaleteAgenda(item) || '-')}</td>
                                <td>${htmlSeguro(item.cliente || '-')}</td>
                                <td><strong>${dias}</strong></td>
                                <td>${item.dataBaixa ? `${formatarDataHoraAgenda(item.dataBaixa)}<br><small>${htmlSeguro(item.baixaPor || '')}</small>` : '-'}</td>
                                <td>
                                    <div style="display:flex; gap:3px; flex-wrap:wrap;">
                                        <button class="btn-acao btn-detalhes" onclick="abrirDocumentosParaRegistro('agenda', ${item.id})"><i class="fas fa-paperclip"></i> Doc${qtdDocsAgenda ? ` (${qtdDocsAgenda})` : ''}</button>
                                        ${item.status === 'BAIXADO' ? '<span style="color:#64748b;">Arquivado</span>' : (podeBaixarAgenda() ? `<button class="btn-acao btn-retorno" onclick="baixarAgendaTransportadora(${item.id})"><i class="fas fa-check"></i> Baixar</button>` : '<span style="color:#64748b;">Aguardando baixa</span>')}
                                    </div>
                                </td>
                            </tr>
                        `;
                    }).join('')}
                </tbody>
            </table>
        </div>
    `;
}

// ============================================
// USUÁRIOS
// ============================================
function abrirModalUsuarios() { if (!isMaster()) { mostrarToast('Acesso restrito!', 'error'); return; } atualizarListaUsuarios(); document.getElementById('modalUsuarios').style.display = 'flex'; }
function atualizarListaUsuarios() { const l = document.getElementById('listaUsuarios'); l.innerHTML = '<h3>Usuários</h3>'; bancoDados.users.forEach(u => { l.innerHTML += `<div style="display:flex; justify-content:space-between; align-items:center; padding:10px; border-bottom:1px solid #2a3a4a;"><div><strong>${u.username}</strong> <span style="color:${getPerfilColor(u.role)}">(${getPerfilLabel(u.role).replace(/^[^ ]+ /,'')})</span><br><small>Nome: ${u.nome}</small><br><small style="color:#8a9dc0;">Senha: ${u.password}</small></div><div><button onclick="abrirEdicaoUsuario(${u.id})" style="background:#daa520; border:none; padding:4px 8px; border-radius:4px; margin-right:4px;">Editar</button>${u.id !== 1 ? `<button onclick="excluirUsuario(${u.id})" style="background:#dc3545; border:none; padding:4px 8px; border-radius:4px;">Excluir</button>` : '<span>Master</span>'}</div></div>`; }); }
function abrirEdicaoUsuario(id) { const user = bancoDados.users.find(u => u.id === id); if (!user) return; document.getElementById('editUserId').value = user.id; document.getElementById('editUserName').value = user.username; document.getElementById('editUserPassword').value = user.password; document.getElementById('editUserNome').value = user.nome; document.getElementById('editUserPerfil').value = user.role; document.getElementById('editarUsuarioPanel').style.display = 'block'; }
function salvarEdicaoUsuario() { const id = parseInt(document.getElementById('editUserId').value); const user = bancoDados.users.find(u => u.id === id); if (!user) { mostrarToast('Usuário não encontrado!', 'error'); return; } const nu = document.getElementById('editUserName').value.trim(); const np = document.getElementById('editUserPassword').value.trim(); const nn = document.getElementById('editUserNome').value.trim(); const nr = document.getElementById('editUserPerfil').value; if (!nu || !np) { mostrarToast('Usuário e senha obrigatórios!', 'error'); return; } if (nu !== user.username && bancoDados.users.some(u => u.username === nu)) { mostrarToast('Usuário já existe!', 'error'); return; } user.username = nu; user.password = np; user.nome = nn || nu; user.role = nr; salvarBanco(); cancelarEdicaoUsuario(); atualizarListaUsuarios(); mostrarToast('Usuário atualizado!'); }
function cancelarEdicaoUsuario() { document.getElementById('editarUsuarioPanel').style.display = 'none'; document.getElementById('editUserId').value = ''; document.getElementById('editUserName').value = ''; document.getElementById('editUserPassword').value = ''; document.getElementById('editUserNome').value = ''; }
function criarUsuario() { const u = document.getElementById('novoUser').value.trim(); const p = document.getElementById('novaSenha').value.trim(); const n = document.getElementById('novoNome').value.trim(); const r = document.getElementById('novoPerfil').value; if (!u || !p) { mostrarToast('Preencha usuário e senha!', 'error'); return; } if (bancoDados.users.find(us => us.username === u)) { mostrarToast('Usuário já existe!', 'error'); return; } bancoDados.users.push({ id: bancoDados.users.length + 1, username: u, password: p, role: r, nome: n || u }); salvarBanco(); atualizarListaUsuarios(); document.getElementById('novoUser').value = ''; document.getElementById('novaSenha').value = ''; document.getElementById('novoNome').value = ''; mostrarToast(`Usuário ${u} criado!`); }
function excluirUsuario(id) { if (id === 1) { mostrarToast('Não pode excluir o Master!', 'error'); return; } bancoDados.users = bancoDados.users.filter(u => u.id !== id); salvarBanco(); atualizarListaUsuarios(); mostrarToast('Usuário excluído!'); }
function gerarBackup() { if (!temPermissao('gerarBackup')) { mostrarToast('Acesso restrito!', 'error'); return; } const b = JSON.stringify(bancoDados, null, 2); const blob = new Blob([b], { type: "application/json" }); const link = document.createElement("a"); link.href = URL.createObjectURL(blob); link.download = `backup_${new Date().toISOString().slice(0,19)}.json`; link.click(); mostrarToast('Backup gerado!'); }


function opcoesTransportadoraUsuario(valorAtual = '') {
    const selecionado = String(valorAtual || '');
    return '<option value="">Selecione apenas para perfil Transportadora</option>' +
        bancoDados.transportadoras.map(t => `<option value="${t.id}" ${String(t.id) === selecionado ? 'selected' : ''}>${htmlSeguro(t.nome)}</option>`).join('');
}
function popularSelectTransportadoraUsuario(id, valorAtual = '') {
    const select = document.getElementById(id);
    if (select) select.innerHTML = opcoesTransportadoraUsuario(valorAtual);
}
function getDadosVinculoTransportadoraUsuario(selectId, role) {
    const id = document.getElementById(selectId)?.value || '';
    if (role !== 'transportadora') return { transportadoraId: null, transportadoraNome: '' };
    const transportadora = bancoDados.transportadoras.find(t => Number(t.id) === Number(id));
    if (!transportadora) return null;
    return { transportadoraId: transportadora.id, transportadoraNome: transportadora.nome };
}
function renderizarPermissoesUsuario(containerId, permissoes = {}, role = 'user') {
    const container = document.getElementById(containerId);
    if (!container) return;
    const padrao = permissoesPadraoPorPerfil(role);
    container.innerHTML = Object.entries(PERMISSOES_SISTEMA).map(([chave, label]) => {
        const marcado = Object.prototype.hasOwnProperty.call(permissoes || {}, chave) ? permissoes[chave] === true : padrao[chave] === true;
        return `<label class="permissao-item"><input type="checkbox" data-permissao="${chave}" ${marcado ? 'checked' : ''}> ${label}</label>`;
    }).join('');
}
function lerPermissoesUsuario(containerId) {
    const permissoes = {};
    document.querySelectorAll(`#${containerId} [data-permissao]`).forEach(input => {
        permissoes[input.getAttribute('data-permissao')] = input.checked;
    });
    return permissoes;
}
function abrirModalUsuarios() {
    if (!isMaster()) { mostrarToast('Acesso restrito!', 'error'); return; }
    popularSelectTransportadoraUsuario('novoTransportadoraUsuario');
    popularSelectTransportadoraUsuario('editUserTransportadora');
    renderizarPermissoesUsuario('novoPermissoesUsuario', {}, document.getElementById('novoPerfil')?.value || 'user');
    document.getElementById('novoPerfil').onchange = () => renderizarPermissoesUsuario('novoPermissoesUsuario', {}, document.getElementById('novoPerfil').value);
    atualizarListaUsuarios();
    document.getElementById('modalUsuarios').style.display = 'flex';
}
function atualizarListaUsuarios() {
    const l = document.getElementById('listaUsuarios');
    l.innerHTML = '<h3>Usuarios</h3><div class="usuarios-lista">';
    bancoDados.users.forEach(u => {
        const usuarioId = Number(u.id);
        const vinculo = u.role === 'transportadora'
            ? `<br><small>Transportadora: ${htmlSeguro(getTransportadoraUsuarioAtual(u)?.nome || 'Nao vinculada')}</small>`
            : '';
        const acaoExcluir = usuarioId !== 1
            ? `<button class="btn-acao btn-saida-coleta" onclick="excluirUsuario(${usuarioId})"><i class="fas fa-trash"></i> Excluir</button>`
            : '<span class="badge badge-concluido">Master</span>';
        l.innerHTML += `
            <div class="usuario-card">
                <div>
                    <strong>${htmlSeguro(u.username)}</strong>
                    <span style="color:${getPerfilColor(u.role)}">(${getPerfilLabel(u.role).replace(/^[^ ]+ /,'')})</span><br>
                    <small>Nome: ${htmlSeguro(u.nome)}</small>${vinculo}<br>
                    <small style="color:#8a9dc0;">Senha: ${htmlSeguro(u.password)}</small>
                </div>
                <div class="usuario-card-actions">
                    <button class="btn-acao btn-editar" onclick="abrirEdicaoUsuario(${usuarioId})"><i class="fas fa-edit"></i> Editar</button>
                    ${acaoExcluir}
                </div>
            </div>
        `;
    });
    l.innerHTML += '</div>';
}
function abrirEdicaoUsuario(id) {
    const user = bancoDados.users.find(u => Number(u.id) === Number(id));
    if (!user) return;
    document.getElementById('editUserId').value = user.id;
    document.getElementById('editUserName').value = user.username;
    document.getElementById('editUserPassword').value = user.password;
    document.getElementById('editUserNome').value = user.nome;
    document.getElementById('editUserPerfil').value = user.role;
    popularSelectTransportadoraUsuario('editUserTransportadora', user.transportadoraId || getTransportadoraUsuarioAtual(user)?.id || '');
    renderizarPermissoesUsuario('editPermissoesUsuario', user.permissoes || {}, user.role);
    document.getElementById('editUserPerfil').onchange = () => renderizarPermissoesUsuario('editPermissoesUsuario', user.permissoes || {}, document.getElementById('editUserPerfil').value);
    document.getElementById('editarUsuarioPanel').style.display = 'block';
}
function salvarEdicaoUsuario() {
    const id = parseInt(document.getElementById('editUserId').value);
    const user = bancoDados.users.find(u => Number(u.id) === Number(id));
    if (!user) { mostrarToast('Usuario nao encontrado!', 'error'); return; }
    const nu = document.getElementById('editUserName').value.trim();
    const np = document.getElementById('editUserPassword').value.trim();
    const nn = document.getElementById('editUserNome').value.trim();
    const nr = document.getElementById('editUserPerfil').value;
    const vinculo = getDadosVinculoTransportadoraUsuario('editUserTransportadora', nr);
    if (!nu || !np) { mostrarToast('Usuario e senha obrigatorios!', 'error'); return; }
    if (nr === 'transportadora' && !vinculo) { mostrarToast('Vincule o usuario a uma transportadora cadastrada.', 'error'); return; }
    if (nu !== user.username && bancoDados.users.some(u => u.username === nu)) { mostrarToast('Usuario ja existe!', 'error'); return; }
    user.username = nu;
    user.password = np;
    user.nome = nn || vinculo?.transportadoraNome || nu;
    user.role = nr;
    user.transportadoraId = vinculo?.transportadoraId || null;
    user.transportadoraNome = vinculo?.transportadoraNome || '';
    user.permissoes = lerPermissoesUsuario('editPermissoesUsuario');
    salvarBanco();
    cancelarEdicaoUsuario();
    atualizarListaUsuarios();
    mostrarToast('Usuario atualizado!');
}
function cancelarEdicaoUsuario() {
    document.getElementById('editarUsuarioPanel').style.display = 'none';
    document.getElementById('editUserId').value = '';
    document.getElementById('editUserName').value = '';
    document.getElementById('editUserPassword').value = '';
    document.getElementById('editUserNome').value = '';
    popularSelectTransportadoraUsuario('editUserTransportadora');
    renderizarPermissoesUsuario('editPermissoesUsuario');
}
function criarUsuario() {
    const u = document.getElementById('novoUser').value.trim();
    const p = document.getElementById('novaSenha').value.trim();
    const n = document.getElementById('novoNome').value.trim();
    const r = document.getElementById('novoPerfil').value;
    const vinculo = getDadosVinculoTransportadoraUsuario('novoTransportadoraUsuario', r);
    if (!u || !p) { mostrarToast('Preencha usuario e senha!', 'error'); return; }
    if (r === 'transportadora' && !vinculo) { mostrarToast('Vincule o usuario a uma transportadora cadastrada.', 'error'); return; }
    if (bancoDados.users.find(us => us.username === u)) { mostrarToast('Usuario ja existe!', 'error'); return; }
    bancoDados.users.push({ id: proximoId(bancoDados.users), username: u, password: p, role: r, nome: n || vinculo?.transportadoraNome || u, transportadoraId: vinculo?.transportadoraId || null, transportadoraNome: vinculo?.transportadoraNome || '', permissoes: lerPermissoesUsuario('novoPermissoesUsuario') });
    salvarBanco();
    atualizarListaUsuarios();
    document.getElementById('novoUser').value = '';
    document.getElementById('novaSenha').value = '';
    document.getElementById('novoNome').value = '';
    popularSelectTransportadoraUsuario('novoTransportadoraUsuario');
    renderizarPermissoesUsuario('novoPermissoesUsuario', {}, r);
    mostrarToast(`Usuario ${u} criado!`);
}

// ============================================
// IMPORTAÇÃO, ATALHOS E MELHORIAS
// ============================================
function abrirModalImportar() {
    if (!temPermissao('importarBackup')) { mostrarToast('Acesso restrito!', 'error'); return; }
    document.getElementById('modalImportar').style.display = 'flex';
    document.getElementById('arquivoImportar').value = '';
    document.getElementById('importarSubstituir').checked = false;
}

function marcarPermissoesUsuario(containerId, marcado) {
    document.querySelectorAll(`#${containerId} [data-permissao]`).forEach(input => {
        input.checked = marcado;
    });
}

function excluirUsuario(id) {
    if (!isMaster()) { mostrarToast('Acesso restrito!', 'error'); return; }
    const usuarioId = Number(id);
    if (usuarioId === 1) { mostrarToast('Nao pode excluir o Master!', 'error'); return; }
    const usuario = bancoDados.users.find(u => Number(u.id) === usuarioId);
    if (!usuario) { mostrarToast('Usuario nao encontrado!', 'error'); return; }
    if (usuarioAtual && Number(usuarioAtual.id) === usuarioId) { mostrarToast('Nao exclua o usuario logado.', 'error'); return; }
    if (!confirm(`Excluir o usuario ${usuario.username}?`)) return;
    if (!Array.isArray(bancoDados.usuariosPadraoRemovidos)) bancoDados.usuariosPadraoRemovidos = [];
    if (['encarregado', 'almoxarifado', 'transportadora', 'faturamento'].includes(usuario.username) && !bancoDados.usuariosPadraoRemovidos.includes(usuario.username)) {
        bancoDados.usuariosPadraoRemovidos.push(usuario.username);
    }
    bancoDados.users = bancoDados.users.filter(u => Number(u.id) !== usuarioId);
    if (Number(document.getElementById('editUserId')?.value || 0) === usuarioId) cancelarEdicaoUsuario();
    salvarBanco();
    atualizarListaUsuarios();
    mostrarToast('Usuario excluido!');
}

function normalizarCampo(v) { return String(v || '').trim(); }
function proximoId(lista) { return (lista.reduce((m, i) => Math.max(m, Number(i.id)||0), 0) + 1); }

function processarImportacao() {
    if (!temPermissao('importarBackup')) { mostrarToast('Acesso restrito!', 'error'); return; }
    const file = document.getElementById('arquivoImportar').files[0];
    if (!file) { mostrarToast('Selecione um arquivo!', 'error'); return; }
    const reader = new FileReader();
    reader.onload = function(e) {
        try {
            const texto = e.target.result;
            if (file.name.toLowerCase().endsWith('.json')) {
                const dados = JSON.parse(texto);
                if (!dados.users || !dados.cargas || !dados.clientes) throw new Error('Backup inválido');
                if (document.getElementById('importarSubstituir').checked) {
                    const cargaInvalida = (dados.cargas || []).find(c => !validarFrotaInterlandia(c.transportadoraNome || '', c.motorista || '', c.placa || ''));
                    const transportadoraInvalida = (dados.transportadoras || []).find(t => !validarFrotaInterlandiaLista(t.nome || '', getFrotaTransportadora(t)));
                    if (cargaInvalida || transportadoraInvalida) throw new Error('Backup possui motorista ou placa da INTERLANDIA associado a outra transportadora');
                    bancoDados = dados;
                }
                else {
                    const cargasValidas = (dados.cargas || []).filter(c => validarFrotaInterlandia(c.transportadoraNome || '', c.motorista || '', c.placa || ''));
                    const transportadorasValidas = (dados.transportadoras || []).filter(t => validarFrotaInterlandiaLista(t.nome || '', getFrotaTransportadora(t)));
                    bancoDados.cargas = bancoDados.cargas.concat(cargasValidas.map(c => ({...c, id: proximoId(bancoDados.cargas)})));
                    bancoDados.clientes = bancoDados.clientes.concat((dados.clientes || []).filter(n => !bancoDados.clientes.some(c => c.cnpj === n.cnpj)).map(c => ({...c, id: proximoId(bancoDados.clientes)})));
                    bancoDados.transportadoras = bancoDados.transportadoras.concat(transportadorasValidas.filter(n => !bancoDados.transportadoras.some(t => t.nome === n.nome)).map(t => ({...t, id: proximoId(bancoDados.transportadoras)})));
                    bancoDados.representantes = bancoDados.representantes.concat((dados.representantes || []).filter(n => !bancoDados.representantes.some(r => r.nome === n.nome)).map(r => ({...r, id: proximoId(bancoDados.representantes)})));
                }
                salvarBanco(); carregarSelects(); atualizarDashboard(); atualizarTabela(); fecharModal('modalImportar'); mostrarToast('Backup importado com sucesso!');
                return;
            }
            const linhas = texto.split(/\r?\n/).filter(l => l.trim());
            if (linhas.length < 2) throw new Error('CSV vazio');
            const sep = linhas[0].includes(';') ? ';' : ',';
            const cab = linhas[0].split(sep).map(h => h.trim().toLowerCase());
            const idx = nome => cab.findIndex(h => h.normalize('NFD').replace(/[\u0300-\u036f]/g,'').includes(nome));
            const map = {
                nf: idx('nota'), sap: idx('sap'), cliente: idx('cliente'), cnpj: idx('cnpj'), cidade: idx('cidade'), uf: idx('uf'), motorista: idx('motorista'), placa: idx('placa'), transp: idx('transportadora'), rep: idx('representante'), qtde: idx('quantidade'), valor: idx('valor')
            };
            let importadas = 0, puladas = 0;
            linhas.slice(1).forEach(l => {
                const col = l.split(sep);
                const nf = normalizarCampo(col[map.nf]);
                if (!nf || notaFiscalJaUsada(nf)) { puladas++; return; }
                const clienteNome = normalizarCampo(col[map.cliente]) || 'CLIENTE NÃO INFORMADO';
                let cliente = bancoDados.clientes.find(c => c.razao === clienteNome || (map.cnpj>=0 && c.cnpj === normalizarCampo(col[map.cnpj])));
                if (!cliente) {
                    cliente = { id: proximoId(bancoDados.clientes), razao: clienteNome, cnpj: normalizarCampo(col[map.cnpj]), telefone:'', endereco:'', cidade: normalizarCampo(col[map.cidade]), uf: normalizarCampo(col[map.uf]).toUpperCase() };
                    bancoDados.clientes.push(cliente);
                }
                const transpNome = normalizarCampo(col[map.transp]);
                let transp = transpNome ? bancoDados.transportadoras.find(t => t.nome === transpNome) : null;
                const motoristaCsv = normalizarCampo(col[map.motorista]);
                const placaCsv = normalizarCampo(col[map.placa]).toUpperCase();
                if (!validarFrotaInterlandia(transpNome, motoristaCsv, placaCsv)) { puladas++; return; }
                if (transpNome && !transp) { transp = { id: proximoId(bancoDados.transportadoras), nome: transpNome, cnpj:'', telefone:'', contato:'' }; bancoDados.transportadoras.push(transp); }
                const repNome = normalizarCampo(col[map.rep]);
                let rep = repNome ? bancoDados.representantes.find(r => r.nome === repNome) : null;
                if (repNome && !rep) { rep = { id: proximoId(bancoDados.representantes), nome: repNome, telefone:'', email:'', regiao:'' }; bancoDados.representantes.push(rep); }
                const qtde = parseInt(normalizarCampo(col[map.qtde]).replace(/\D/g,'')) || 0;
                const valorTotal = parseFloat(normalizarCampo(col[map.valor]).replace('R$','').replace(/\./g,'').replace(',','.')) || 0;
                const cargaImportada = { id: proximoId(bancoDados.cargas), notaFiscal:nf, sap:normalizarCampo(col[map.sap]), clienteId:cliente.id, clienteNome:cliente.razao, cnpj:cliente.cnpj, endereco:cliente.endereco, cidade: cliente.cidade || normalizarCampo(col[map.cidade]), uf:cliente.uf || normalizarCampo(col[map.uf]).toUpperCase(), representanteId:rep?.id||null, representanteNome:rep?.nome||'', transportadoraId:transp?.id||null, transportadoraNome:transp?.nome||'', tipo: qtde > 0 ? 'paletizada':'nao_paletizada', qtde, valorUnitario: qtde ? valorTotal/qtde : valorTotal, valorTotal, motorista:motoristaCsv, placa:placaCsv, dataCarga:new Date().toISOString(), dataRetorno:null, dataSaidaColeta:null, dataRetornoColeta:null, status:'ABERTO', observacoes:'Importado via CSV', motivoVale:'', motivoNaoColetado:'' };
                registrarAlteracao(cargaImportada, 'Importou carga por CSV', `NF ${nf}`);
                bancoDados.cargas.push(cargaImportada);
                importadas++;
            });
            salvarBanco(); carregarSelects(); atualizarDashboard(); atualizarTabela(); fecharModal('modalImportar'); mostrarToast(`${importadas} cargas importadas (${puladas} ignoradas).`, 'success');
        } catch(err) { mostrarToast('Erro ao importar: ' + err.message, 'error'); }
    };
    reader.readAsText(file, 'UTF-8');
}

function resetarDadosDemo() {
    if (!temPermissao('resetDemo')) { mostrarToast('Acesso restrito!', 'error'); return; }
    if (!confirm('Restaurar os dados de demonstração? Isso substitui os dados salvos neste navegador.')) return;
    bancoDados = JSON.parse(JSON.stringify(bancoDadosPadrao));
    salvarBanco(); carregarSelects(); atualizarDashboard(); atualizarTabela(); mostrarToast('Dados de demonstração restaurados!', 'info');
}

function preencherBuscaStatus(status) {
    document.getElementById('filtroStatus').value = status;
    aplicarFiltros();
}

function exportarJSONRapido() { gerarBackup(); }

// fechar modal ao clicar fora
window.addEventListener('click', function(e) {
    if (e.target && e.target.classList && e.target.classList.contains('modal')) e.target.style.display = 'none';
});

// busca rápida ao pressionar Enter
window.addEventListener('keydown', function(e) {
    if (e.key === 'Enter' && document.activeElement && document.activeElement.id === 'buscaSAP') buscarCarga();
});

carregarSelects();
atualizarDashboard();
atualizarTabela();
atualizarListas();
atualizarAgendaTransportadora();
</script>
</body>
</html>
