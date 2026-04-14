<?php

class Database {

    private $host = "localhost";
    private $user = "root";
    private $pass = "alunolab";
    private $db   = "db_copadomundo";

    public function connect() {
        $conn = new mysqli($this->host, $this->user, $this->pass, $this->db);

        if ($conn->connect_error) {
            die("Erro de conexão: " . $conn->connect_error);
        }
        
        return $conn;
    }
}