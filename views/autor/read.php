<h1 class="my-4">Detalhes do Autor</h1>
<div class="card">
    <div class="card-body">
        <p><strong>ID:</strong> <?php echo $autor->id; ?></p>
        <p><strong>Nome:</strong> <?php echo $autor->nome; ?></p>
        <p><strong>Data de Criação:</strong> <?php echo $autor->timestamp_criacao; ?></p>
        <p><strong>Data de Atualização:</strong> <?php echo $autor->timestamp_update; ?></p>
        <a href="index.php?action=list-autores" class="btn btn-primary">Voltar</a>
    </div>
</div>

<h2 class="my-4">Livros que o autor já escreveu</h2>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Título</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($livros as $livro) : ?>
            <tr>
                <td><?php echo $livro['id']; ?></td>
                <td><a href="index.php?action=read-livro&id=<?php echo $livro['id']; ?>"><?php echo $livro['titulo']; ?></a></td>
                <td>
                    <a href="index.php?action=desmatricular&autor_id=<?php echo $autor->id; ?>&livro_id=<?php echo $livro['id']; ?>" class="btn btn-danger btn-sm">
                        <i class="fas fa-trash"></i> Cancelar Registro
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>