<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Lista de Livros</title>
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
            margin-bottom: 20px;
        }

        .btn-sm {
            margin: 0 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center">Lista de Livros</h1>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Títulos</th>
                    <th>Gênero</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($livros) && is_array($livros)): ?>
                    <?php foreach ($livros as $livro): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($livro['id']); ?></td>
                            <td><?php echo htmlspecialchars($livro['titulo']); ?></td>
                            <td><?php echo htmlspecialchars($livro['genero']); ?></td>
                            <td>
                                <a href="index.php?action=read-livro&id=<?php echo htmlspecialchars($livro['id']); ?>" class="btn btn-info btn-sm" title="Visualizar">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="index.php?action=edit-livro&id=<?php echo htmlspecialchars($livro['id']); ?>" class="btn btn-warning btn-sm" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="index.php?action=delete-livro&id=<?php echo htmlspecialchars($livro['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Você tem certeza que deseja deletar este livro?');" title="Deletar">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">Nenhum livro encontrado.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
