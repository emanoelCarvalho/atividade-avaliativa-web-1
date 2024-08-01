<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layout</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        header {
            background-color: #343a40;
            color: white;
            padding: 20px 0;
        }

        .navbar {
            margin-bottom: 20px;
        }

        .navbar-brand, .nav-link {
            color: white !important;
        }

        .dropdown-menu a {
            color: #343a40 !important;
        }

        footer {
            background-color: #343a40;
            color: white;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .card {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <header class="my-4 text-center">
            <h1>Biblioteca Digital</h1>
        </header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php"><i class="fas fa-book"></i> Home</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="autorDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user"></i> Autor
                        </a>
                        <div class="dropdown-menu" aria-labelledby="autorDropdown">
                            <a class="dropdown-item" href="index.php?action=create-autor"><i class="fas fa-plus"></i> Adicionar Autor</a>
                            <a class="dropdown-item" href="index.php?action=list-autores"><i class="fas fa-list"></i> Listar Autores</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="livroDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-book"></i> Livros
                        </a>
                        <div class="dropdown-menu" aria-labelledby="livroDropdown">
                            <a class="dropdown-item" href="index.php?action=create-livro"><i class="fas fa-plus"></i> Adicionar Livro</a>
                            <a class="dropdown-item" href="index.php?action=list-livros"><i class="fas fa-list"></i> Listar Livros</a>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=associar_v1"><i class="fas fa-link"></i> Associar livros autores v1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=associar_v2"><i class="fas fa-link"></i> Associar livros autores v2</a>
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
    <footer class="text-center bg-dark py-3">
        <p>&copy; 2024 Biblioteca Digital</p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
