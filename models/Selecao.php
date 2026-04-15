<?php
class Selecao {
    private PDO $db;
    private string $table = 'selecoes';

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function create(string $nome, string $grupo, int $titulos, int $participacoes): bool {
        $sql  = "INSERT INTO {$this->table} (nome, grupo, titulos, participacoes) VALUES (:nome, :grupo, :titulos, :participacoes)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':nome',          $nome,          PDO::PARAM_STR);
        $stmt->bindParam(':grupo',         $grupo,         PDO::PARAM_STR);
        $stmt->bindParam(':titulos',       $titulos,       PDO::PARAM_INT);
        $stmt->bindParam(':participacoes', $participacoes, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function read(?string $grupoFiltro = null): array {
        if ($grupoFiltro && $grupoFiltro !== '') {
            $sql  = "SELECT * FROM {$this->table} WHERE grupo = :grupo ORDER BY nome ASC";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':grupo', $grupoFiltro, PDO::PARAM_STR);
        } else {
            $sql  = "SELECT * FROM {$this->table} ORDER BY grupo ASC, nome ASC";
            $stmt = $this->db->prepare($sql);
        }
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function readOne(int $id): array|false {
        $sql  = "SELECT * FROM {$this->table} WHERE id = :id LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function update(int $id, string $nome, string $grupo, int $titulos, int $participacoes): bool {
        $sql  = "UPDATE {$this->table} SET nome = :nome, grupo = :grupo, titulos = :titulos, participacoes = :participacoes WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':nome',          $nome,          PDO::PARAM_STR);
        $stmt->bindParam(':grupo',         $grupo,         PDO::PARAM_STR);
        $stmt->bindParam(':titulos',       $titulos,       PDO::PARAM_INT);
        $stmt->bindParam(':participacoes', $participacoes, PDO::PARAM_INT);
        $stmt->bindParam(':id',            $id,            PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function delete(int $id): bool {
        $sql  = "DELETE FROM {$this->table} WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function getGrupos(): array {
        $stmt = $this->db->query("SELECT DISTINCT grupo FROM {$this->table} ORDER BY grupo ASC");
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }
}