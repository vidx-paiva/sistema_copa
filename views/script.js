document.addEventListener("DOMContentLoaded", () => {

  // ── Dark / Light mode ──────────────────────────────
  const toggle = document.getElementById('themeToggle');
  const label  = document.getElementById('themeLabel');

  const saved = localStorage.getItem('theme');
  if (saved === 'light') {
    document.body.classList.add('light');
    if (label) label.textContent = 'Light';
  }

  if (toggle) {
    toggle.addEventListener('click', () => {
      document.body.classList.toggle('light');
      const isLight = document.body.classList.contains('light');
      localStorage.setItem('theme', isLight ? 'light' : 'dark');
      if (label) label.textContent = isLight ? 'Light' : 'Dark';
    });
  }

  // ── Modal ──────────────────────────────────────────
  const modal    = document.getElementById("modalSelecao");
  const btnOpen  = document.getElementById("btnNovaSelecao");
  const btnClose = document.getElementById("btnFechar");

  if (modal && btnOpen) {
    btnOpen.addEventListener("click", () => modal.classList.add("show"));
    if (btnClose) btnClose.addEventListener("click", () => modal.classList.remove("show"));
    window.addEventListener("click", e => { if (e.target === modal) modal.classList.remove("show"); });
  }

});