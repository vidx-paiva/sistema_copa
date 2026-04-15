use copa_db;
ALTER TABLE selecoes ADD COLUMN participacoes INT NOT NULL DEFAULT 0 AFTER titulos;