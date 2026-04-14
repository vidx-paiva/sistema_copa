<h1>Editar Seleção</h1>

<form method="POST" action="/update">
    <input type="hidden" name="id" value="<?= $selecao['selecao_id'] ?>">

    Nome: <input type="text" name="nome" value="<?= $selecao['nome'] ?>"><br>
    Títulos: <input type="number" name="titulos" value="<?= $selecao['titulos'] ?>"><br>

    <button type="submit">Atualizar</button>
</form>