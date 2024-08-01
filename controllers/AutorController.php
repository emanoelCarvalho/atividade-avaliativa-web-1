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
            $this->autor->editora = $_POST['editora'];

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

        $livroModel = new Livro($this->db);

        $livros_disponiveis = $livroModel->livrosNaoCadastrados($id)->fetchAll(PDO::FETCH_ASSOC);

        return ["view" => "../views/autor/read.php", "data" => [
            'autor' => $this->autor,
            'livros' => $livros,
            'livros_disponiveis' => $livros_disponiveis
        ]];
    }

    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->autor->id = $id;
            $this->autor->nome = $_POST['nome'];
            $this->autor->editora = $_POST['editora'];

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

    public function associarV1()
    {
        $errors = [];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $this->autorLivro->autor_id = $_POST['autor_id'];
            $this->autorLivro->livro_id = $_POST['livro_id'];

            $autorModel = new Autor($this->db);
            $livrModel = new Livro($this->db);

            $autorModel->id = $this->autorLivro->autor_id;
            $livrModel->id = $this->autorLivro->livro_id;

            if (!$autorModel->read()) {
                $errors[] = 'ID do autor inválido';
            }

            if (!$livrModel->read()) {
                $errors[] = 'ID do livro inválido';
            }

            if (empty($errors)) {
                if ($this->autorLivro->registrarLivro()) {
                    header("Location: index.php?action=read-autor&id=" . $_POST['autor_id']);
                    exit;
                } else {
                    $errors[] = 'Erro ao associar autor ao livro';
                }
            }
        }
        return ["view" => "../views/autor/associarV1.php", "data" => ['errors' => $errors]];
    }

    public function associarV2()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $this->autorLivro->autor_id = $_POST['autor_id'];
            $this->autorLivro->livro_id = $_POST['livro_id'];

            if ($this->autorLivro->registrarLivro()) {
                header("Location: index.php?action=read-autor&id=" . $_POST['autor_id']);
                exit;
            }
        } else {
            $autores = $this->autor->index()->fetchAll(PDO::FETCH_ASSOC);
            $livros = (new Livro($this->db))->index()->fetchAll(PDO::FETCH_ASSOC);

            return ["view" => "../views/autor/associarV2.php", "data" => ['autores' => $autores, 'livros' => $livros]];
        }
    }


    public function removerRegistro($autor_id, $livro_id)
    {
        $this->autorLivro->autor_id = $autor_id;
        $this->autorLivro->livro_id = $livro_id;
        if ($this->autorLivro->cancelarRegistro()) {
            header("Location: index.php?action=read-autor&id=" . $livro_id);
            exit;
        }
    }
}
