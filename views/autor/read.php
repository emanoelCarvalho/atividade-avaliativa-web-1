<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Detalhes do Autor</title>
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

        h1, h2 {
            color: #343a40;
        }

        .card {
            margin-bottom: 20px;
        }

        .table thead th {
            background-color: #007bff;
            color: white;
        }

        .table tbody tr:nth-child(odd) {
            background-color: #f2f2f2;
        }

        .btn-sm {
            margin: 0 2px;
        }

        .btn-info {
            background-color: #17a2b8;
            border: none;
        }

        .btn-info:hover {
            background-color: #138496;
        }

        .btn-warning {
            background-color: #ffc107;
            border: none;
        }

        .btn-warning:hover {
            background-color: #e0a800;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="my-4">Detalhes do Autor</h1>
        <div class="card">
            <div class="card-body">
                <p><strong>ID:</strong> <?php echo htmlspecialchars($autor->id); ?></p>
                <p><strong>Nome:</strong> <?php echo htmlspecialchars($autor->nome); ?></p>
                <p><strong>Editora:</strong> <?php echo htmlspecialchars($autor->editora); ?></p>
                <p><strong>Data de Criação:</strong> <?php echo htmlspecialchars($autor->timestamp_criacao); ?></p>
                <p><strong>Data de Atualização:</strong> <?php echo htmlspecialchars($autor->timestamp_update); ?></p>
                <a href="index.php?action=list-autores" class="btn btn-primary">Voltar</a>
            </div>
        </div>

        <h2 class="my-4">Registrar Livro ao Autor</h2>
        <div class="card mb-4">
            <div class="card-body">
                <?php if (empty($livros_disponiveis)) : ?>
                    <p class="text-danger">Não há livros disponíveis para registros.</p>
                <?php else : ?>
                    <form action="index.php?action=associar_v2" method="POST">
                        <input type="hidden" name="autor_id" value="<?php echo htmlspecialchars($autor->id); ?>">
                        <div class="form-group">
                            <label for="livro_id">Selecione o Livro</label>
                            <select class="form-control" id="livro_id" name="livro_id" required>
                                <?php foreach ($livros_disponiveis as $livro) : ?>
                                    <option value="<?php echo htmlspecialchars($livro['id']); ?>">
                                        <?php echo htmlspecialchars($livro['id']) . ' - ' . htmlspecialchars($livro['titulo']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>

        <h2 class="my-4">Livros que o Autor Já Escreveu</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($livros as $livro) : ?>
                        <tr>
                            <td><?php echo htmlspecialchars($livro['id']); ?></td>
                            <td><a href="index.php?action=read-livro&id=<?php echo htmlspecialchars($livro['id']); ?>"><?php echo htmlspecialchars($livro['titulo']); ?></a></td>
                            <td>
                                <a href="index.php?action=cancelar-registro&autor_id=<?php echo htmlspecialchars($autor->id); ?>&livro_id=<?php echo htmlspecialchars($livro['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Você tem certeza que deseja cancelar o registro deste livro para o autor?');">
                                    <i class="fas fa-trash"></i> Cancelar Registro
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
