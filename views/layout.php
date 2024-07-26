<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Exemplo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../css/styles.css"> 
</head>

<body>
    <div class="container">
        <header class="my-4">
            <h1 class="text-center">Biblioteca Digital</h1>
        </header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.php">Home</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="autorDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Autor
                        </a>
                        <div class="dropdown-menu" aria-labelledby="autorDropdown">
                            <a class="dropdown-item" href="index.php?action=create-autor">Adicionar Autor</a>
                            <a class="dropdown-item" href="index.php?action=list-autores">Listar Autores</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="livroDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Livros
                        </a>
                        <div class="dropdown-menu" aria-labelledby="livroDropdown">
                            <a class="dropdown-item" href="index.php?action=create-livro">Adicionar Livro</a>
                            <a class="dropdown-item" href="index.php?action=list-livros">Listar Livros</a>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=associar_v1">Associar livros autores v1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=associar_v2">Associar livros autores v2</a>
                    </li>
                </ul>

            </div>
        </nav>
        <section class="my-4">
            <?php
            if (!empty($view)) {
                extract($data);

                if (!empty($errors)) : ?>
                    <div class="alert alert-danger">
                        <?php foreach ($errors as $error) : ?>
                            <p><?php echo $error; ?></p>
                        <?php endforeach; ?>
                    </div>
            <?php endif;

                include($view);
            } else {
                echo "<p>View não encontrada.</p>";
            }
            ?>
        </section>

    </div>
    <footer class="text-center bg-light py-3">
        <p>&copy; 2024 Biblioteca Digital'</p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>