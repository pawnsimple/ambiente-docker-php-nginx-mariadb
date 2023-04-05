-- CREATE DATABASE equipe_db;
-- Base de dados criada por default, database
USE database; 

CREATE TABLE Equipe (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  idade INT NOT NULL,
  trabalho VARCHAR(255) NOT NULL,
  data_criacao DATE NOT NULL DEFAULT CURRENT_DATE
);