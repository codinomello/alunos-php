/* SQL para criar a base de dados se ainda não existe no MySQL */
CREATE DATABASE IF NOT EXISTS escola;
USE escola;

/* SQL para criar a tabela alunos num banco de dados MySQL */
CREATE TABLE IF NOT EXISTS alunos (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    idade INT NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL
);

/* SQL para inserir alguns dados de exemplo na tabela alunos */
INSERT INTO alunos (nome, idade, email) VALUES ("Joãzinho", 20, "joaozinho@gmail.com")