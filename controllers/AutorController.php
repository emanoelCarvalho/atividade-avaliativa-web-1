<?php
require_once "../config/database.php";
require_once "../models/Autor.php";
require_once "../models/AutorLivro.php";

class AutorController
{
    private $db;
    private $autor;
    private $autorLivro;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->autor = new Autor($this->db);
        $this->autorLivro = new AutorLivro($this->db);
    }

    public function index()
    {
        $statement = $this->autor->index();
        $autores = $statement->fetchAll(PDO::FETCH_ASSOC);
        return ['view' => "../views/autor/index.php", 'data' => compact('autores')];
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->autor->nome = $_POST['nome'];

            if ($this->autor->create()) {
                header("Location: index.php?action=list-autores");
                exit;
            }
        }

        return ["view" => "../views/autor/create.php", "data" => []];
    }

    public function read($id)
    {
        $this->autor->id = $id;
        $this->autor->read();
        $this->autorLivro->autor_id = $id;
        $statement = $this->autorLivro->listarLivrosDoAutor();
        $livros = $statement->fetchAll(PDO::FETCH_ASSOC);

        return ["view" => "../views/autor/read.php", "data" => ['autor' => $this->autor, 'livros' => $livros]];
    }

    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->autor->id = $id;
            $this->autor->nome = $_POST['nome'];

            if ($this->autor->update()) {
                header("Location: index.php?action=list-autores");
                exit;
            }
        } else {
            $this->autor->id = $id;
            $this->autor->read();
        }

        return ["view" => "../views/autor/update.php", "data" => ['autor' => $this->autor]];
    }

    public function delete($id)
    {
        $this->autor->id = $id;
        if ($this->autor->delete()) {
            header("Location: index.php?action=list-autores");
            exit;
        }
    }

    public function removerRegistro($autor_id, $livro_id)
    {
        $this->autorLivro->autor_id = $autor_id;
        $this->autorLivro->livro_id = $livro_id;
        if ($this->autorLivro->cancelarRegistro()) {
            header("Location: index.php?action=read-turma&id=" . $livro_id);
            exit;
        }
    }
}
