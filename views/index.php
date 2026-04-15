<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Copa do Mundo – Seleções</title>
    <style>
        /* ── Variáveis dark (padrão) ── */
        :root {
            --bg-page:       #0a0e1a;
            --bg-card:       #111827;
            --bg-table:      #1a2235;
            --bg-thead:      #0d1b3e;
            --accent:        #2563eb;
            --accent-hover:  #3b82f6;
            --gold:          #f59e0b;
            --text-main:     #f1f5f9;
            --text-muted:    #94a3b8;
            --border:        rgba(59,130,246,0.18);
            --badge-bg:      rgba(37,99,235,0.15);
            --badge-color:   #60a5fa;
            --thead-color:   #93c5fd;
            --row-hover:     rgba(59,130,246,0.07);
            --stripe:        rgba(255,255,255,0.025);
            --shadow:        0 4px 24px rgba(0,0,0,0.45);
            --alert-bg:      rgba(34,197,94,0.12);
            --alert-color:   #4ade80;
            --alert-border:  #22c55e;
            --toggle-track:  #1e293b;
            --toggle-thumb:  #3b82f6;
            --edit-bg:       rgba(37,99,235,0.15);
            --edit-color:    #60a5fa;
            --edit-border:   rgba(37,99,235,0.3);
            --del-bg:        rgba(220,38,38,0.12);
            --del-color:     #f87171;
            --del-border:    rgba(220,38,38,0.25);
            --footer-bg:     #0d1320;
            --footer-border: rgba(59,130,246,0.12);
        }

        /* ── Variáveis light ── */
        body.light {
            --bg-page:       #e8eef7;
            --bg-card:       #ffffff;
            --bg-table:      #f8faff;
            --bg-thead:      #1e40af;
            --accent:        #1d4ed8;
            --accent-hover:  #2563eb;
            --gold:          #d97706;
            --text-main:     #0f172a;
            --text-muted:    #475569;
            --border:        rgba(30,64,175,0.15);
            --badge-bg:      rgba(29,78,216,0.08);
            --badge-color:   #1d4ed8;
            --thead-color:   #bfdbfe;
            --row-hover:     rgba(29,78,216,0.04);
            --stripe:        rgba(0,0,0,0.02);
            --shadow:        0 4px 20px rgba(30,64,175,0.12);
            --alert-bg:      #d1fae5;
            --alert-color:   #065f46;
            --alert-border:  #10b981;
            --toggle-track:  #bfdbfe;
            --toggle-thumb:  #1d4ed8;
            --edit-bg:       rgba(29,78,216,0.08);
            --edit-color:    #1d4ed8;
            --edit-border:   rgba(29,78,216,0.2);
            --del-bg:        rgba(220,38,38,0.07);
            --del-color:     #dc2626;
            --del-border:    rgba(220,38,38,0.2);
            --footer-bg:     #dde6f4;
            --footer-border: rgba(30,64,175,0.12);
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: var(--bg-page);
            color: var(--text-main);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            transition: background .3s, color .3s;
        }

        /* ══════════════════════════════
           HEADER
        ══════════════════════════════ */
        header {
            background: rgba(10,14,26,0.96);
            border-bottom: 1px solid var(--border);
            padding: 0 32px;
            height: 62px;
            display: flex;
            align-items: center;
            gap: 14px;
            justify-content: space-between;
            backdrop-filter: blur(10px);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .header-icon {
            width: 38px; height: 38px;
            background: var(--accent);
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
        }

        .header-title { font-size: 1rem; font-weight: 600; color: #f1f5f9; letter-spacing: .3px; }
        .header-sub   { font-size: .72rem; color: #64748b; margin-top: 1px; }

        /* ── Toggle dark/light ── */
        .toggle-wrap {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .toggle-label {
            font-size: .75rem;
            color: #94a3b8;
            min-width: 32px;
            text-align: right;
        }

        .toggle-track {
            width: 46px; height: 24px;
            background: var(--toggle-track);
            border-radius: 12px;
            cursor: pointer;
            position: relative;
            border: 1px solid var(--border);
            transition: background .25s;
            flex-shrink: 0;
        }

        .toggle-track::after {
            content: '';
            position: absolute;
            top: 4px; left: 4px;
            width: 14px; height: 14px;
            border-radius: 50%;
            background: var(--toggle-thumb);
            transition: left .25s, background .25s;
        }

        body.light .toggle-track::after { left: 26px; }

        .toggle-icon {
            font-size: 15px;
            line-height: 1;
        }

        /* ══════════════════════════════
           MAIN
        ══════════════════════════════ */
        main { max-width: 1100px; width: 100%; margin: 32px auto; padding: 0 24px; flex: 1; }

        /* ── Alertas ── */
        .alert {
            padding: 13px 18px; border-radius: 10px; margin-bottom: 24px;
            font-size: .88rem; font-weight: 600;
            display: flex; align-items: center; gap: 9px;
            border-left: 4px solid var(--alert-border);
            background: var(--alert-bg);
            color: var(--alert-color);
        }

        /* ── Barra de ações ── */
        .actions-bar {
            display: flex; flex-wrap: wrap; gap: 12px;
            align-items: center; margin-bottom: 24px;
        }

        .btn {
            display: inline-flex; align-items: center; gap: 6px;
            padding: 9px 20px; border-radius: 8px; font-size: .85rem;
            font-weight: 600; cursor: pointer; text-decoration: none;
            border: none; transition: transform .15s, opacity .15s;
        }
        .btn:hover { transform: translateY(-1px); opacity: .88; }

        .btn-primary { background: var(--accent); color: #fff; }
        .btn-primary:hover { background: var(--accent-hover); opacity: 1; }

        .btn-edit {
            background: var(--edit-bg); color: var(--edit-color);
            border: 1px solid var(--edit-border);
            padding: 5px 12px; font-size: .78rem;
        }
        .btn-delete {
            background: var(--del-bg); color: var(--del-color);
            border: 1px solid var(--del-border);
            padding: 5px 12px; font-size: .78rem;
        }

        /* ── Filtro ── */
        .filter-form { display: flex; align-items: center; gap: 8px; margin-left: auto; }
        .filter-form label { font-size: .8rem; color: var(--text-muted); font-weight: 600; }
        .filter-form select {
            padding: 8px 12px; border-radius: 8px;
            border: 1px solid var(--border);
            background: var(--bg-card); color: var(--text-main);
            font-size: .85rem; cursor: pointer;
        }
        .filter-form button {
            padding: 8px 16px; border-radius: 8px; border: none;
            background: var(--accent); color: #fff;
            font-weight: 600; font-size: .85rem; cursor: pointer;
            transition: background .15s;
        }
        .filter-form button:hover { background: var(--accent-hover); }

        /* ── Grupos ── */
        .grupo-section { margin-bottom: 32px; }

        .grupo-title {
            font-size: .7rem; font-weight: 700; letter-spacing: 2.5px;
            text-transform: uppercase; color: var(--accent-hover);
            margin-bottom: 10px;
            display: flex; align-items: center; gap: 10px;
        }
        .grupo-title::after {
            content: ''; flex: 1; height: 1px; background: var(--border);
        }

        /* ── Tabela ── */
        .table-wrap {
            background: var(--bg-card);
            border-radius: 12px; overflow: hidden;
            border: 1px solid var(--border);
            box-shadow: var(--shadow);
        }

        table { width: 100%; border-collapse: collapse; }

        thead { background: var(--bg-thead); }
        thead th {
            padding: 12px 16px; text-align: left;
            font-size: .7rem; font-weight: 600;
            letter-spacing: 1px; text-transform: uppercase;
            color: var(--thead-color);
        }

        tbody tr { border-bottom: 1px solid var(--border); transition: background .15s; }
        tbody tr:last-child { border-bottom: none; }
        tbody tr:nth-child(even) { background: var(--stripe); }
        tbody tr:hover { background: var(--row-hover); }
        tbody td { padding: 12px 16px; font-size: .88rem; vertical-align: middle; }

        .badge-grupo {
            display: inline-block; padding: 3px 11px; border-radius: 20px;
            font-size: .72rem; font-weight: 700;
            background: var(--badge-bg); color: var(--badge-color);
            border: 1px solid var(--border);
        }

        .titulos-cell { display: flex; align-items: center; gap: 3px; }
        .titulos-cell .star { color: var(--gold); font-size: 13px; }
        .titulos-cell .count { font-size: .82rem; color: var(--text-muted); margin-left: 4px; }

        .empty-msg {
            text-align: center; padding: 48px;
            color: var(--text-muted); font-size: .95rem; font-style: italic;
        }
        .empty-msg a { color: var(--accent-hover); }

        /* ══════════════════════════════
           FOOTER
        ══════════════════════════════ */
        footer {
            background: var(--footer-bg);
            border-top: 1px solid var(--footer-border);
            margin-top: 48px;
            padding: 0;
        }

        .footer-inner {
            max-width: 1100px;
            margin: 0 auto;
            padding: 28px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 20px;
        }

        .footer-dev {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .footer-avatar {
            width: 44px; height: 44px;
            border-radius: 50%;
            background: var(--accent);
            border: 2px solid var(--accent-hover);
            display: flex; align-items: center; justify-content: center;
            font-size: 15px; font-weight: 700; color: #fff;
            flex-shrink: 0;
        }

        .footer-dev-name {
            font-size: .9rem;
            font-weight: 700;
            color: var(--text-main);
        }

        .footer-dev-role {
            font-size: .75rem;
            color: var(--text-muted);
            margin-top: 2px;
        }

        .footer-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 3px 11px;
            border-radius: 20px;
            font-size: .68rem;
            font-weight: 700;
            background: var(--badge-bg);
            color: var(--badge-color);
            border: 1px solid var(--border);
            margin-top: 5px;
        }

        .footer-center {
            text-align: center;
        }

        .footer-logo {
            font-size: 1.5rem;
            margin-bottom: 4px;
        }

        .footer-app-name {
            font-size: .78rem;
            font-weight: 700;
            color: var(--text-muted);
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        .footer-copy {
            font-size: .7rem;
            color: var(--text-muted);
            margin-top: 3px;
            opacity: .6;
        }

        .footer-right {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 6px;
        }

        .footer-tech {
            font-size: .72rem;
            color: var(--text-muted);
            opacity: .7;
        }

        .footer-stack {
            display: flex;
            gap: 6px;
            flex-wrap: wrap;
            justify-content: flex-end;
        }

        .stack-tag {
            padding: 2px 9px;
            border-radius: 20px;
            font-size: .68rem;
            font-weight: 600;
            background: var(--badge-bg);
            color: var(--badge-color);
            border: 1px solid var(--border);
        }

        .footer-divider {
            border: none;
            border-top: 1px solid var(--footer-border);
        }

        .footer-bottom {
            max-width: 1100px;
            margin: 0 auto;
            padding: 12px 24px;
            text-align: center;
            font-size: .68rem;
            color: var(--text-muted);
            opacity: .5;
        }
    </style>
</head>
<body>

<header>
    <div class="header-left">
        <div class="header-icon">🏆</div>
        <div>
            <div class="header-title">Copa do Mundo — Gerenciador de Seleções</div>
            <div class="header-sub">Dashboard principal</div>
        </div>
    </div>

    <div class="toggle-wrap">
        <span class="toggle-icon" id="themeIcon">🌙</span>
        <div class="toggle-track" id="themeToggle" title="Alternar tema"></div>
        <span class="toggle-label" id="themeLabel">Dark</span>
    </div>
</header>

<main>

    <?php if (($sucesso ?? '') === 'criado'): ?>
        <div class="alert">✅ Seleção cadastrada com sucesso!</div>
    <?php elseif (($sucesso ?? '') === 'atualizado'): ?>
        <div class="alert">✅ Seleção atualizada com sucesso!</div>
    <?php elseif (($sucesso ?? '') === 'excluido'): ?>
        <div class="alert">✅ Seleção removida com sucesso!</div>
    <?php endif; ?>

    <div class="actions-bar">
        <a href="/selecoes/criar" class="btn btn-primary">＋ Nova Seleção</a>

        <form class="filter-form" method="GET" action="/selecoes/listar">
            <label for="grupo">Filtrar por Grupo:</label>
            <select name="grupo" id="grupo">
                <option value="">Todos</option>
                <?php foreach ($grupos as $g): ?>
                    <option value="<?= htmlspecialchars($g) ?>"
                        <?= $grupoFiltro === $g ? 'selected' : '' ?>>
                        Grupo <?= htmlspecialchars($g) ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <button type="submit">Filtrar</button>
        </form>
    </div>

    <?php if (empty($selecoes)): ?>
        <div class="table-wrap">
            <p class="empty-msg">Nenhuma seleção encontrada. <a href="/selecoes/criar">Adicione a primeira!</a></p>
        </div>
    <?php else: ?>
        <?php
        $porGrupo = [];
        foreach ($selecoes as $s) {
            $porGrupo[$s['grupo']][] = $s;
        }
        foreach ($porGrupo as $grupo => $lista): ?>
            <div class="grupo-section">
                <div class="grupo-title">⚽ Grupo <?= htmlspecialchars($grupo) ?></div>
                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Seleção</th>
                                <th>Grupo</th>
                                <th>Títulos Mundiais</th>
                                <th>Participações</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($lista as $i => $sel): ?>
                            <tr>
                                <td><?= $i + 1 ?></td>
                                <td><strong><?= htmlspecialchars($sel['nome']) ?></strong></td>
                                <td><span class="badge-grupo"><?= htmlspecialchars($sel['grupo']) ?></span></td>
                                <td>
                                    <div class="titulos-cell">
                                        <?php for ($t = 0; $t < (int)$sel['titulos']; $t++): ?>
                                            <span class="star">★</span>
                                        <?php endfor; ?>
                                        <span class="count"><?= (int)$sel['titulos'] ?></span>
                                    </div>
                                </td>
                                <td><?= (int)$sel['participacoes'] ?> vezes</td>
                                <td>
                                    <a href="/selecoes/editar?id=<?= $sel['id'] ?>" class="btn btn-edit">✏️ Editar</a>
                                    <a href="/selecoes/excluir?id=<?= $sel['id'] ?>"
                                       class="btn btn-delete"
                                       onclick="return confirm('Excluir <?= htmlspecialchars($sel['nome']) ?>?')">
                                        🗑️ Excluir
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

</main>

<footer>
    <div class="footer-inner">

        <!-- Desenvolvedor -->
        <div class="footer-dev">
            <div class="footer-avatar">DP</div>
            <div>
                <div class="footer-dev-name">Deyvid Paiva</div>
                <div class="footer-dev-role">Desenvolvedor JR — Criador do sistema</div>
                <span class="footer-badge">⚡ v1.0</span>
            </div>
        </div>

        <!-- Centro -->
        <div class="footer-center">
            <div class="footer-logo">🏆</div>
            <div class="footer-app-name">Copa do Mundo</div>
            <div class="footer-copy">Sistema de gerenciamento de seleções</div>
        </div>

        <!-- Stack -->
        <div class="footer-right">
            <span class="footer-tech">Desenvolvido com</span>
            <div class="footer-stack">
                <span class="stack-tag">PHP</span>
                <span class="stack-tag">MySQL</span>
                <span class="stack-tag">HTML</span>
                <span class="stack-tag">CSS</span>
            </div>
        </div>

    </div>
    <hr class="footer-divider">
    <div class="footer-bottom">
        &copy; <?= date('Y') ?> Deyvid Paiva &mdash; Todos os direitos reservados
    </div>
</footer>

<script>
    (function () {
        const body   = document.body;
        const toggle = document.getElementById('themeToggle');
        const label  = document.getElementById('themeLabel');
        const icon   = document.getElementById('themeIcon');

        function applyTheme(theme) {
            if (theme === 'light') {
                body.classList.add('light');
                label.textContent = 'Light';
                icon.textContent  = '☀️';
            } else {
                body.classList.remove('light');
                label.textContent = 'Dark';
                icon.textContent  = '🌙';
            }
        }

        // Carrega preferência salva
        applyTheme(localStorage.getItem('theme') || 'dark');

        toggle.addEventListener('click', function () {
            const next = body.classList.contains('light') ? 'dark' : 'light';
            localStorage.setItem('theme', next);
            applyTheme(next);
        });
    })();
</script>

</body>
</html>