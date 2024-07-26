<?php

require_once "../controllers/AutorController.php";
require_once "../controllers/LivroController.php";

$autorController = new AutorController();
$livroController = new LivroController();

$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : 0;
$autor_id = isset($_GET['autor_id']) ? $_GET['autor_id'] : 0;
$livro_id = isset($_GET['livro_id']) ? $_GET['livro_id'] : 0;

$result = ['view' => '', 'data' => []];

switch ($action) {
    case 'create-autor':
        $result = $autorController->create();
        break;
    case 'read-autor':
        $result = $autorController->read($id);
        break;
    case 'edit-autor':
        $result = $autorController->update($id);
        break;
    case 'delete-autor':
        $autorController->delete($id);
        break;
    case 'list-autores':
        $result = $autorController->index();
        break;
    case 'create-livro':
        $result = $livroController->create();
        break;
    case 'read-livro':
        $result = $livroController->read($id);
        break;
    case 'edit-livro':
        $result = $livroController->update($id);
        break;
    case 'delete-livro':
        $livroController->delete($id);
        break;
    case 'list-livros':
        $result = $livroController->index();
        break;
    case 'cancelar-registro':
        $autorController->removerRegistro($autor_id, $livro_id);
        break;
    case 'associar_v2':
        
    default:
        $result['view'] = '../views/home.php';
        break;
}

$view = $result['view'];
$data = $result['data'];

include("../views/layout.php");
