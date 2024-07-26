<?php
require_once "../config/database.php";
require_once "../models/Livro.php";
require_once "../models/AutorLivro.php";

class LivroController
{
    private $db;
    private $livro;
    private $autorLivro;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->livro = new Livro($this->db);
        $this->autorLivro = new AutorLivro($this->db);
    }

    public function index()
    {
        $statement = $this->livro->index();
        $livros = $statement->fetchAll(PDO::FETCH_ASSOC);
        return ['view' => "../views/livro/index.php", 'data' => compact('livros')];
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->livro->titulo = $_POST['titulo'];

            if ($this->livro->create()) {
                header("Location: index.php?action=list-livros");
                exit;
            }
        }

        return ['view' => '../views/livro/create.php', 'data' => []];
    }

    public function read($id)
    {
        $this->livro->id = $id;
        $this->livro->read();
        $this->autorLivro->livro_id = $id;
        $statement = $this->autorLivro->listarLivrosDoAutor();
        $autores = $statement->fetchAll(PDO::FETCH_ASSOC);

        return ['view' => '../views/livro/read.php', 'data' => ['livro' => $this->livro, 'autores' => $autores]];
    }

    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->livro->id = $id;
            $this->livro->titulo = $_POST['titulo'];

            if ($this->livro->update()) {
                header("Location: index.php?action=list-livros");
                exit;
            }
        } else {
            $this->livro->id = $id;
            $this->livro->read();
        }

        return ['view' => '../views/livro/update.php', 'data' => ['livro' => $this->livro]];
    }

    public function delete($id)
    {
        $this->livro->id = $id;
        if ($this->livro->delete()) {
            header("Location: index.php?action=list-livros");
            exit;
        }
    }

    public function removerRegistro($livro_id, $autor_id)
    {
        $this->autorLivro->livro_id = $livro_id;
        $this->autorLivro->autor_id = $autor_id;
        if ($this->autorLivro->cancelarRegistro()) {
            header("Location: index.php?action=read-livro&id=" . $livro_id);
            exit;
        }
    }
}
