<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Copa do Mundo – Seleções</title>
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: linear-gradient(135deg, #006633 0%, #004d26 60%, #003d1f 100%);
            min-height: 100vh;
            color: #333;
        }

        header {
            background: rgba(0,0,0,0.35);
            padding: 18px 40px;
            display: flex;
            align-items: center;
            gap: 18px;
            backdrop-filter: blur(6px);
        }
        header .trophy { font-size: 2rem; }
        header h1 { color: #FFD700; font-size: 1.5rem; font-weight: 700; letter-spacing: 1px; }
        header span { color: #fff; font-size: 0.9rem; opacity: .7; }

        main { max-width: 1100px; margin: 36px auto; padding: 0 20px 60px; }

        /* ── Alertas ── */
        .alert {
            padding: 14px 20px; border-radius: 10px; margin-bottom: 24px;
            font-weight: 600; font-size: .95rem;
            display: flex; align-items: center; gap: 10px;
        }
        .alert-success { background: #d4edda; color: #155724; border-left: 5px solid #28a745; }

        /* ── Barra de ações ── */
        .actions-bar {
            display: flex; flex-wrap: wrap; gap: 14px;
            align-items: center; margin-bottom: 28px;
        }
        .btn {
            display: inline-flex; align-items: center; gap: 7px;
            padding: 10px 22px; border-radius: 8px; font-size: .92rem;
            font-weight: 600; cursor: pointer; text-decoration: none;
            border: none; transition: transform .15s, box-shadow .15s;
        }
        .btn:hover { transform: translateY(-2px); box-shadow: 0 4px 14px rgba(0,0,0,.25); }
        .btn-primary   { background: #FFD700; color: #003d1f; }
        .btn-edit      { background: #007bff; color: #fff; padding: 7px 14px; font-size: .82rem; }
        .btn-delete    { background: #dc3545; color: #fff; padding: 7px 14px; font-size: .82rem; }

        /* ── Filtro ── */
        .filter-form {
            display: flex; align-items: center; gap: 10px; margin-left: auto;
        }
        .filter-form label { color: #fff; font-weight: 600; font-size: .9rem; }
        .filter-form select {
            padding: 8px 12px; border-radius: 8px; border: none;
            background: #fff; font-size: .9rem; cursor: pointer;
        }
        .filter-form button {
            padding: 8px 16px; border-radius: 8px; border: none;
            background: #FFD700; color: #003d1f; font-weight: 700;
            cursor: pointer;
        }

        /* ── Cards de grupos ── */
        .grupo-section { margin-bottom: 36px; }
        .grupo-title {
            color: #FFD700; font-size: 1.15rem; font-weight: 700;
            letter-spacing: 2px; text-transform: uppercase;
            margin-bottom: 12px; padding-bottom: 6px;
            border-bottom: 2px solid rgba(255,215,0,.35);
        }

        /* ── Tabela ── */
        .table-wrap { background: #fff; border-radius: 14px; overflow: hidden; box-shadow: 0 6px 24px rgba(0,0,0,.2); }
        table { width: 100%; border-collapse: collapse; }
        thead { background: #004d26; color: #FFD700; }
        thead th { padding: 14px 18px; text-align: left; font-size: .88rem; letter-spacing: .5px; }
        tbody tr { border-bottom: 1px solid #f0f0f0; }
        tbody tr:last-child { border-bottom: none; }
        tbody tr:hover { background: #f5fbf7; }
        tbody td { padding: 13px 18px; font-size: .93rem; vertical-align: middle; }

        .badge-grupo {
            display: inline-block; padding: 3px 12px; border-radius: 20px;
            font-weight: 700; font-size: .8rem;
            background: #e8f5e9; color: #2e7d32; border: 1px solid #a5d6a7;
        }
        .titulos-cell { display: flex; align-items: center; gap: 6px; }
        .titulos-cell .star { color: #FFD700; font-size: 1rem; }

        .empty-msg {
            text-align: center; padding: 40px;
            color: #888; font-size: 1rem; font-style: italic;
        }

        footer {
            text-align: center; color: rgba(255,255,255,.45);
            font-size: .78rem; padding: 20px;
        }
    </style>
</head>
<body>

<header>
    <span class="trophy">🏆</span>
    <div>
        <h1>Copa do Mundo – Gerenciador de Seleções</h1>
    </div>
</header>

<main>

    <?php if ($sucesso === 'criado'): ?>
        <div class="alert alert-success">✅ Seleção cadastrada com sucesso!</div>
    <?php elseif ($sucesso === 'atualizado'): ?>
        <div class="alert alert-success">✅ Seleção atualizada com sucesso!</div>
    <?php elseif ($sucesso === 'excluido'): ?>
        <div class="alert alert-success">✅ Seleção removida com sucesso!</div>
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
        // Agrupa por grupo
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
                                <th>Cadastrado em</th>
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
                                        <span><?= (int)$sel['titulos'] ?></span>
                                    </div>
                                </td>
                                <td><?= date('d/m/Y H:i', strtotime($sel['criado_em'])) ?></td>
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


</body>
</html>
