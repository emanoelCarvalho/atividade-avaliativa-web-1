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

<h2 class="my-4">Resgistrar Livro ao Autor </h2>
<div class="card mb-4">
    <div class="card-body">
        <?php if (empty($livros_disponiveis)) : ?>
            <p class="text-danger">Não há livros disponíveis para registros.</p>
        <?php else : ?>
            <form action="index.php?action=associar_v2" method="POST">
                <input type="hidden" name="autor_id" value="<?php echo $autor->id; ?>">
                <div class="form-group">
                    <label for="livro_id">Selecione o Livro</label>
                    <select class="form-control" id="livro_id" name="livro_id" required>
                        <?php foreach ($livros_disponiveis as $livro) : ?>
                            <option value="<?php echo $livro['id']; ?>">
                                <?php echo $livro['id'] . ' - ' . $livro['titulo']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Registrar</button>
            </form>
        <?php endif; ?>
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
                    <a href="index.php?action=cancelar-registro&autor_id=<?php echo $autor->id; ?>&livro_id=<?php echo $livro['id']; ?>" class="btn btn-danger btn-sm">
                        <i class="fas fa-trash"></i> Cancelar Registro
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>