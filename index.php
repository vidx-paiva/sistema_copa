<?php if (!isset($selecoes)) $selecoes = []; ?>
<link rel="stylesheet" href="/style.css">

<header>🏆 Copa do Mundo</header>

<div class="container">

<div class="card">

    
    <button class="btn" id="btnNovaSelecao">+ Nova Seleção</button>

    <table>
        <tr>
            <th>Nome</th>
            <th>Títulos</th>
            <th>Participações</th>
        </tr>

        <?php foreach ($selecoes as $s): ?>
        <tr>
            <td><?= $s['nome'] ?></td>
            <td><?= $s['titulos'] ?></td>
            <td>
                <a class="btn" href="/edit?id=<?= $s['selecao_id'] ?>">Editar</a>
                <a class="btn" href="/delete?id=<?= $s['selecao_id'] ?>">Excluir</a>
            </td>
            <td><?= $s['participacoes'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

</div>


<div id="modal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    
    <h2>Nova Seleção</h2>
    
 <form action="/Copa_do_mundo_php/selecoes/store" method="POST">
  <label>Nome:</label>
  <input type="text" name="nome" required>

  <label>Títulos:</label>
  <input type="number" name="titulos" required>

  <label>Participações:</label>
  <input type="number" name="participacoes" required>

  <button type="submit" class="btn">Salvar</button>
</form>
  </div>
</div>


<script>
document.addEventListener("DOMContentLoaded", function() {

  const modal = document.getElementById("modal");
  const btn = document.getElementById("btnNovaSelecao");
  const close = document.querySelector(".close");

  if (!btn) {
    console.error("Botão não encontrado");
    return;
  }

  
  btn.addEventListener("click", function() {
    modal.classList.add("show");
  });


  close.addEventListener("click", function() {
    modal.classList.remove("show");
  });
  
  window.addEventListener("click", function(event) {
    if (event.target === modal) {
      modal.classList.remove("show");
    }
  });

});
</script>

</div>