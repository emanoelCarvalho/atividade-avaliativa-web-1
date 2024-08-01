<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Detalhes do Livro</title>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        h1 {
            color: #343a40;
        }

        .card {
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .card-body p {
            margin-bottom: 15px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="my-4 text-center">Detalhes do Livro</h1>
        <div class="card">
            <div class="card-body">
                <p><strong>ID:</strong> <?php echo htmlspecialchars($livro->id); ?></p>
                <p><strong>Título:</strong> <?php echo htmlspecialchars($livro->titulo); ?></p>
                <p><strong>Gênero:</strong> <?php echo htmlspecialchars($livro->genero); ?></p>
                <p><strong>Data de Criação:</strong> <?php echo htmlspecialchars($livro->timestamp_criacao); ?></p>
                <p><strong>Data de Atualização:</strong> <?php echo htmlspecialchars($livro->timestamp_update); ?></p>
                <a href="index.php?action=list-livros" class="btn btn-primary">
                    <i class="fas fa-arrow-left"></i> Voltar
                </a>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
