<?php
require_once "../config/database.php";

class AutorLivro
{
    private $conn;
    private $table_name = "autor_livro";

    public $id;
    public $autor_id;
    public $livro_id;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    function registrarLivro()
    {
        $query = "INSERT INTO " . $this->table_name . " (autor_id, livro_id) VALUES (:autor_id, :livro_id)";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":autor_id", $this->autor_id);
        $stmt->bindParam(":livro_id", $this->livro_id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }


    function cancelarRegistro()
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE autor_id = :autor_id AND livro_id = :livro_id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":autor_id", $this->autor_id);
        $stmt->bindParam(":livro_id", $this->livro_id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    function listarLivrosDoAutor()
    {
        try {
            $query = "SELECT a.* FROM livros a INNER JOIN " . $this->table_name . " at ON a.id = at.livro_id WHERE at.autor_id = :autor_id";

            $statement = $this->conn->prepare($query);

            $statement->bindValue(":autor_id", $this->autor_id, PDO::PARAM_INT);

            $statement->execute();

            return $statement;
        } catch (PDOException $e) {
            echo "Erro ao listar livros do autor: " . $e->getMessage();
            return null;
        }
    }
}
