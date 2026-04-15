-- ============================================================
-- CRUD Copa do Mundo - Script de Configuração do Banco de Dados
-- Execute este arquivo no MySQL antes de rodar o projeto
-- ============================================================

CREATE DATABASE IF NOT EXISTS copa_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE copa_db;

CREATE TABLE IF NOT EXISTS selecoes (
    id        INT AUTO_INCREMENT PRIMARY KEY,
    nome      VARCHAR(100) NOT NULL,
    grupo     VARCHAR(2)   NOT NULL,
    titulos   INT          NOT NULL DEFAULT 0,
    criado_em DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dados de exemplo
INSERT INTO selecoes (nome, grupo, titulos) VALUES
('Brasil',    'A', 5),
('Alemanha',  'B', 4),
('Argentina', 'C', 3),
('França',    'D', 2),
('Itália',    'E', 4),
('Espanha',   'F', 1),
('Inglaterra','G', 1),
('Uruguai',   'H', 2);
