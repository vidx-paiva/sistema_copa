<?php

class SelecaoController
{
    private $selecaoModel;

    public function __construct()
    {
        require_once './models/Selecao.php';
        $this->selecaoModel = new Selecao();
    }

    public function listar()
    {
        $selecoes = $this->selecaoModel->read();
        include '../views/selecoes/listar.php';
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $dados = [
                'nome' => $_POST['nome'] ?? '',
                'titulos' => $_POST['titulos'] ?? 0,
                'participacoes' => $_POST['participacoes'] ?? 0
            ];

            $this->selecaoModel->create($dados);

            header('Location: /Copa_do_mundo_php/selecoes/listar');
            exit;
        }
    }


    public function atualizar($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dados = [
                'id' => $id,
                'nome' => $_POST['nome'] ?? '',
            ];

            $this->selecaoModel->update($dados);

            header('Location: /Copa_do_mundo_php/selecoes/listar');
            exit;
        }
    }


    public function deletar($id)
    {
        $this->selecaoModel->delete($id);

        header('Location: /Copa_do_mundo_php/selecoes/listar');
        exit;
    }
}