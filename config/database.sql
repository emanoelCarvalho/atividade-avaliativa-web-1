CREATE DATABASE BibliotecaDB;

USE BibliotecaDB;

CREATE TABLE autores (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL
);

CREATE TABLE livros (
    id INT PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(100) NOT NULL
);

CREATE TABLE autor_livro (
    autor_id INT,
    livro_id INT,
    PRIMARY KEY (autor_id, livro_id),
    FOREIGN KEY (autor_id) REFERENCES autores(ID) ON DELETE CASCADE,
    FOREIGN KEY (livro_id) REFERENCES livros(ID) ON DELETE CASCADE
);
