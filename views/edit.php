<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Seleção – Copa do Mundo</title>
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: linear-gradient(135deg, #006633 0%, #004d26 60%, #003d1f 100%);
            min-height: 100vh; color: #333;
        }
        header {
            background: rgba(0,0,0,0.35); padding: 18px 40px;
            display: flex; align-items: center; gap: 18px;
        }
        header h1 { color: #FFD700; font-size: 1.4rem; font-weight: 700; }

        main { max-width: 580px; margin: 48px auto; padding: 0 20px; }

        .card {
            background: #fff; border-radius: 16px;
            padding: 38px 42px; box-shadow: 0 8px 32px rgba(0,0,0,.25);
        }
        .card h2 { color: #004d26; font-size: 1.4rem; margin-bottom: 6px; }
        .card .subtitle { color: #888; font-size: .85rem; margin-bottom: 28px; }

        .form-group { margin-bottom: 22px; }
        .form-group label {
            display: block; font-weight: 600; margin-bottom: 7px;
            color: #004d26; font-size: .92rem;
        }
        .form-group input, .form-group select {
            width: 100%; padding: 11px 15px; border-radius: 9px;
            border: 2px solid #d0e8d8; font-size: .95rem;
            transition: border-color .2s;
        }
        .form-group input:focus, .form-group select:focus {
            outline: none; border-color: #006633;
        }
        small { color: #888; font-size: .8rem; margin-top: 4px; display: block; }

        .btn-row { display: flex; gap: 14px; margin-top: 32px; }
        .btn {
            flex: 1; padding: 13px; border-radius: 9px; font-size: .97rem;
            font-weight: 700; cursor: pointer; text-align: center;
            text-decoration: none; border: none; transition: transform .15s;
        }
        .btn:hover { transform: translateY(-2px); }
        .btn-save   { background: #007bff; color: #fff; }
        .btn-cancel { background: #f0f0f0; color: #555; }

        .alert-error {
            background: #fdecea; color: #c0392b; border-left: 4px solid #e74c3c;
            padding: 12px 16px; border-radius: 8px; margin-bottom: 22px;
            font-weight: 600;
        }

        .info-badge {
            display: inline-block; background: #e8f5e9; color: #2e7d32;
            padding: 3px 12px; border-radius: 20px; font-size: .78rem;
            font-weight: 600; margin-bottom: 24px;
        }
    </style>
</head>
<body>

<header>
    <span style="font-size:1.8rem">🏆</span>
    <h1>Editar Seleção</h1>
</header>

<main>
    <div class="card">
        <h2>✏️ Editar Seleção</h2>
        <span class="info-badge">ID #<?= (int)$selecao['id'] ?></span>

        <?php if (!empty($erro)): ?>
            <div class="alert-error">⚠️ <?= htmlspecialchars($erro) ?></div>
        <?php endif; ?>

        <form method="POST" action="/selecoes/atualizar">
            <input type="hidden" name="id" value="<?= (int)$selecao['id'] ?>">

            <div class="form-group">
                <label for="nome">Nome da Seleção *</label>
                <input type="text" id="nome" name="nome"
                       placeholder="Ex: Brasil" maxlength="100" required
                       value="<?= htmlspecialchars($selecao['nome']) ?>">
            </div>

            <div class="form-group">
                <label for="grupo">Grupo da Copa *</label>
                <select id="grupo" name="grupo" required>
                    <option value="">— Selecione —</option>
                    <?php
                    $grupos = ['A','B','C','D','E','F','G','H'];
                    $grupoAtual = strtoupper($selecao['grupo']);
                    foreach ($grupos as $g):
                    ?>
                        <option value="<?= $g ?>" <?= $grupoAtual === $g ? 'selected' : '' ?>><?= $g ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="titulos">Títulos Mundiais</label>
                <input type="number" id="titulos" name="titulos" min="0" max="10"
                       value="<?= (int)$selecao['titulos'] ?>">
                <small>Número de Copas do Mundo vencidas</small>
            </div>

            <div class="btn-row">
                <button type="submit" class="btn btn-save">✅ Atualizar</button>
                <a href="/selecoes/listar" class="btn btn-cancel">← Cancelar</a>
            </div>

        </form>
    </div>
</main>

</body>
</html>
