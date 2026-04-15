<?php
// models/Selecao.php
// Model: representa uma seleção e sabe interagir com a tabela `selecoes`

class Selecao {
    private PDO $db;
    private string $table = 'selecoes';

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    // CREATE — insere uma nova seleção
    public function create(string $nome, string $grupo, int $titulos): bool {
        $sql  = "INSERT INTO {$this->table} (nome, grupo, titulos) VALUES (:nome, :grupo, :titulos)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':nome',    $nome,    PDO::PARAM_STR);
        $stmt->bindParam(':grupo',   $grupo,   PDO::PARAM_STR);
        $stmt->bindParam(':titulos', $titulos, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // READ — retorna todas as seleções (com filtro opcional por grupo)
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

    // READ ONE — busca uma única seleção pelo ID
    public function readOne(int $id): array|false {
        $sql  = "SELECT * FROM {$this->table} WHERE id = :id LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    // UPDATE — atualiza os dados de uma seleção existente
    public function update(int $id, string $nome, string $grupo, int $titulos): bool {
        $sql  = "UPDATE {$this->table} SET nome = :nome, grupo = :grupo, titulos = :titulos WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':nome',    $nome,    PDO::PARAM_STR);
        $stmt->bindParam(':grupo',   $grupo,   PDO::PARAM_STR);
        $stmt->bindParam(':titulos', $titulos, PDO::PARAM_INT);
        $stmt->bindParam(':id',      $id,      PDO::PARAM_INT);
        return $stmt->execute();
    }

    // DELETE — remove uma seleção pelo ID
    public function delete(int $id): bool {
        $sql  = "DELETE FROM {$this->table} WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Retorna lista de grupos distintos (para o filtro)
    public function getGrupos(): array {
        $stmt = $this->db->query("SELECT DISTINCT grupo FROM {$this->table} ORDER BY grupo ASC");
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }
}
