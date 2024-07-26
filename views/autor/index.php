<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php if (isset($autores) && is_array($autores)): ?>
            <?php foreach ($autores as $autor): ?>
                <tr>
                    <td><?php echo $autor['id']; ?></td>
                    <td><?php echo $autor['nome']; ?></td>
                    <td>
                        <a href="index.php?action=read-autor&id=<?php echo $autor['id']; ?>" class="btn btn-info btn-sm">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="index.php?action=edit-autor&id=<?php echo $autor['id']; ?>" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="index.php?action=delete-autor&id=<?php echo $autor['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Você tem certeza que deseja deletar este autor?');">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="7" class="text-center">Nenhum autor encontrado.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
