document.addEventListener("DOMContentLoaded", function() {

  console.log("JS carregou");

  const modal = document.getElementById("modal");
  const btn = document.getElementById("btnNovaSelecao");
  const close = document.querySelector(".close");

  if (!btn) {
    console.error("Botão não encontrado");
    return;
  }

  btn.addEventListener("click", function() {
    console.log("clicou");
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