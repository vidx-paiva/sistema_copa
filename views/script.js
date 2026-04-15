document.addEventListener("DOMContentLoaded", () => {

    const modal = document.getElementById("modalSelecao");
    const btn = document.getElementById("btnNovaSelecao");
    const btnFechar = document.getElementById("btnFechar");

    if (!modal || !btn) {
        console.error("Erro: Modal ou botão não encontrados.");
        return;
    }

    // Abrir modal
    btn.addEventListener("click", () => {
        modal.classList.add("show");
    });

    // Fechar no botão X
    if (btnFechar) {
        btnFechar.addEventListener("click", () => {
            modal.classList.remove("show");
        });
    } else {
        console.warn("Botão fechar não encontrado");
    }

    // Fechar clicando fora
    window.addEventListener("click", (event) => {
        if (event.target === modal) {
            modal.classList.remove("show");
        }
    });

});