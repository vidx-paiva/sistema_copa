<?php
// public/index.php
// Ponto de entrada único da aplicação — funciona como "roteador"

// Autoload simples (sem Composer)
spl_autoload_register(function (string $class): void {
    $dirs = [
        __DIR__ . '/../controllers/',
        __DIR__ . '/../models/',
    ];
    foreach ($dirs as $dir) {
        $file = $dir . $class . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../controllers/SelecaoController.php';

// ── Roteamento simples ─────────────────────────────────────────────────────
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = rtrim($uri, '/');

$controller = new SelecaoController();

$routes = [
    ''                    => [$controller, 'listar'],
    '/selecoes'           => [$controller, 'listar'],
    '/selecoes/listar'    => [$controller, 'listar'],
    '/selecoes/criar'     => [$controller, 'criar'],
    '/selecoes/salvar'    => [$controller, 'salvar'],
    '/selecoes/editar'    => [$controller, 'editar'],
    '/selecoes/atualizar' => [$controller, 'atualizar'],
    '/selecoes/excluir'   => [$controller, 'excluir'],
];

if (isset($routes[$uri])) {
    call_user_func($routes[$uri]);
} else {
    http_response_code(404);
    echo '<h1 style="font-family:sans-serif;text-align:center;margin-top:80px">404 – Página não encontrada</h1>';
    echo '<p style="text-align:center"><a href="/selecoes/listar">← Voltar ao início</a></p>';
}
