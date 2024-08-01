<?php
require_once "../config/database.php";

class Livro
{
    private $conn;
    private $table_name = "livros";

    public $id;
    public $titulo;
    public $genero;
    public $timestamp_criacao;
    public $timestamp_update;
    public function __construct($db)
    {
        $this->conn = $db;
    }

    function create()
    {
        $query = "INSERT INTO " . $this->table_name . " SET titulo=:titulo, genero=:genero";
        $stmt = $this->conn->prepare($query);
        $this->titulo = htmlspecialchars(strip_tags($this->titulo));
        $this->genero = htmlspecialchars(strip_tags($this->genero));
        $stmt->bindParam(":titulo", $this->titulo);
        $stmt->bindParam(":genero", $this->genero);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    function index()
    {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function read()
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $this->titulo = $row['titulo'];
            $this->genero = $row['genero'];
            $this->timestamp_criacao = $row['timestamp_criacao'];
            $this->timestamp_update = $row['timestamp_update'];
            return true;
        }

        return false;
    }

    function update()
    {
        $query = "UPDATE " . $this->table_name . " SET titulo = :titulo, genero = :genero WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $this->titulo = htmlspecialchars(strip_tags($this->titulo));
        $this->id = htmlspecialchars(strip_tags($this->id));
        $stmt->bindParam(":titulo", $this->titulo);
        $stmt->bindParam(":genero", $this->genero);
        $stmt->bindParam(":id", $this->id);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    function delete()
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $this->id = htmlspecialchars(strip_tags($this->id));
        $stmt->bindParam(1, $this->id);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function livrosNaoCadastrados($autor_id)
    {
        $query = "SELECT * FROM livros WHERE id NOT IN (SELECT livro_id FROM autor_livro WHERE autor_id = ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $autor_id);
        $stmt->execute();
        return $stmt;
    }
}
