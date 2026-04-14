<?php

class Selecao
{
    private $conn;
    private $table = "selecoes";

    public function __construct()
    {
        require_once './config/database.php';
        $database = new Database();
        $this->conn = $database->connect();
    }


    public function read()
    {
        $query = "SELECT * FROM " . $this->table . " ORDER BY selecao_id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function create($dados)
    {
        $query = "INSERT INTO " . $this->table . " 
                  (nome, titulos, participacoes)
                  VALUES (:nome, :titulos, :participacoes)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':nome', $dados['nome']);
        $stmt->bindParam(':titulos', $dados['titulos']);
        $stmt->bindParam(':participacoes', $dados['participacoes']);

        return $stmt->execute();
    }

    public function update($dados)
    {
        $query = "UPDATE " . $this->table . " 
                  SET nome = :nome
                  WHERE selecao_id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $dados['id']);
        $stmt->bindParam(':nome', $dados['nome']);

        return $stmt->execute();
    }

    public function delete($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE selecao_id = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }
}