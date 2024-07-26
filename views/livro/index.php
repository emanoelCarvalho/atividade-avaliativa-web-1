<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Títulos</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php if (isset($livros) && is_array($livros)): ?>
            <?php foreach ($livros as $livro): ?>
                <tr>
                    <td><?php echo $livro['id']; ?></td>
                    <td><?php echo $livro['titulo']; ?></td>
                    <td>
                        <a href="index.php?action=read-livro&id=<?php echo $livro['id']; ?>" class="btn btn-info btn-sm">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="index.php?action=edit-livro&id=<?php echo $livro['id']; ?>" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="index.php?action=delete-livro&id=<?php echo $livro['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Você tem certeza que deseja deletar este livro?');">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="7" class="text-center">Nenhum livro encontrado.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
