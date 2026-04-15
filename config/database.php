<?php
// config/database.php
// Classe responsável por estabelecer a conexão com o MySQL via PDO

class Database {
    private string $host     = 'localhost';
    private string $dbName   = 'copa_db';
    private string $user     = 'root';      // ← altere se necessário
    private string $password = 'alunolab';          // ← altere se necessário
    private string $charset  = 'utf8mb4';

    private ?PDO $connection = null;

    public function getConnection(): PDO {
        if ($this->connection === null) {
            $dsn = "mysql:host={$this->host};dbname={$this->dbName};charset={$this->charset}";
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            try {
                $this->connection = new PDO($dsn, $this->user, $this->password, $options);
            } catch (PDOException $e) {
                // Em produção, nunca exponha a mensagem de erro ao usuário
                die(json_encode(['erro' => 'Falha na conexão com o banco de dados: ' . $e->getMessage()]));
            }
        }
        return $this->connection;
    }
}
