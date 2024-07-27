<h1 class="my-4">Matricular Aluno na Turma (Versão 2)</h1>
<div class="card">
    <div class="card-body">
        <form action="index.php?action=associar_v2" method="POST">
            <div class="form-group">
                <label for="autor_id">Selecione o Autor</label>
                <select class="form-control" id="autor_id" name="autor_id" required>
                    <?php foreach ($autores as $autor): ?>
                        <option value="<?php echo $autor['id']; ?>">
                            <?php echo $autor['id'] . ' - ' . $autor['nome']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="livro_id">Selecione o Livro</label>
                <select class="form-control" id="livro_id" name="livro_id" required>
                    <?php foreach ($livros as $livro): ?>
                        <option value="<?php echo $livro['id']; ?>">
                            <?php echo $livro['id'] . ' - ' . $livro['titulo']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Associar</button>
        </form>
        <a href="index.php?action=list-autores" class="btn btn-secondary mt-3">Voltar</a>
    </div>
</div>
