<?php
// controllers/SelecaoController.php
// Controller: coordena as ações entre o Model (Selecao) e as Views

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Selecao.php';

class SelecaoController {
    private Selecao $model;

    public function __construct() {
        $database    = new Database();
        $db          = $database->getConnection();
        $this->model = new Selecao($db);
    }

    // ── LIST ──────────────────────────────────────────────────────────────────
    public function listar(): void {
        $grupoFiltro = $_GET['grupo'] ?? '';
        $selecoes    = $this->model->read($grupoFiltro);
        $grupos      = $this->model->getGrupos();
        $sucesso     = $_GET['sucesso'] ?? '';
        require_once __DIR__ . '/../views/index.php';
    }

    // ── CREATE FORM ───────────────────────────────────────────────────────────
    public function criar(): void {
        $erro = '';
        require_once __DIR__ . '/../views/create.php';
    }

    // ── SAVE (POST) ───────────────────────────────────────────────────────────
    public function salvar(): void {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /selecoes/criar');
            exit;
        }

        $nome          = trim($_POST['nome']          ?? '');
        $grupo         = strtoupper(trim($_POST['grupo']         ?? ''));
        $titulos       = (int) ($_POST['titulos']       ?? 0);
        $participacoes = (int) ($_POST['participacoes'] ?? 0);

        if ($nome === '' || $grupo === '') {
            $erro = 'Nome e Grupo são obrigatórios.';
            require_once __DIR__ . '/../views/create.php';
            return;
        }

        $this->model->create($nome, $grupo, $titulos, $participacoes);
        header('Location: /selecoes/listar?sucesso=criado');
        exit;
    }

    // ── EDIT FORM ─────────────────────────────────────────────────────────────
    public function editar(): void {
        $id      = (int) ($_GET['id'] ?? 0);
        $selecao = $this->model->readOne($id);

        if (!$selecao) {
            header('Location: /selecoes/listar');
            exit;
        }

        $erro = '';
        require_once __DIR__ . '/../views/edit.php';
    }

    // ── UPDATE (POST) ─────────────────────────────────────────────────────────
        public function atualizar(): void {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /selecoes/listar');
            exit;
        }

        $id            = (int) ($_POST['id']            ?? 0);
        $nome          = trim($_POST['nome']             ?? '');
        $grupo         = strtoupper(trim($_POST['grupo'] ?? ''));
        $titulos       = (int) ($_POST['titulos']        ?? 0);
        $participacoes = (int) ($_POST['participacoes']  ?? 0);

        if ($nome === '' || $grupo === '') {
            $selecao = ['id' => $id, 'nome' => $nome, 'grupo' => $grupo, 'titulos' => $titulos, 'participacoes' => $participacoes];
            $erro    = 'Nome e Grupo são obrigatórios.';
            require_once __DIR__ . '/../views/edit.php';
            return;
        }

        $this->model->update($id, $nome, $grupo, $titulos, $participacoes);
        header('Location: /selecoes/listar?sucesso=atualizado');
        exit;
    }

    // ── DELETE ────────────────────────────────────────────────────────────────
    public function excluir(): void {
        $id = (int) ($_GET['id'] ?? 0);
        if ($id > 0) {
            $this->model->delete($id);
        }
        header('Location: /selecoes/listar?sucesso=excluido');
        exit;
    }
}
