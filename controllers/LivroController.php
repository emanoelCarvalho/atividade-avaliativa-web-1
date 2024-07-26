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
        $livro = $statement->fetchAll(PDO::FETCH_ASSOC);
        return ['view' => "../views/livro/index.php", 'data' => compact('livro')];
    }

    public function create()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->livro->titulo = $_POST['titulo'];

            if ($this->livro->create()) {
                header("Location: index.php?action=list-livros");
            }
        }
        return ['view' => '../views/livro/create.php', 'data' => []];
    }

    public function read($id)
    {
        $this->livro->id = $id;
        $this->livro->read();
        $this->autorLivro->listarLivrosDoAutor();
        $statement = $this->autorLivro->listarLivrosDoAutor();
        $livros_registrados = $statement->fetchAll(PDO::FETCH_ASSOC);

        $livroModel = new Livro($this->db);
        $livros_disponiveis = $livroModel->livrosNaoCadastrados($id)->fetchAll(PDO::FETCH_ASSOC);

        return ['view' => '../views/livro/read.php', 'data' => [
            'livro' => $this->livro,
            'livros_registrados' => $livros_registrados,
            'livros_disponiveis' => $livros_disponiveis,
        ]];
    }

    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->livro->id = $id;
            $this->livro->titulo = $_POST["titulo"];

            if ($this->livro->update()) {
                header("Location: index.php?action=list-livros");
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
        $this->livro->delete();
        header("Location: index.php?action=list-livroes");
    }
}
