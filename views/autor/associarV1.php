<h1 class="my-4">Associar Livro a autor</h1>
<div class="card">
    <div class="card-body">
        <form action="index.php?action=associar_v1" method="POST">
            <div class="form-group">
                <label for="autor_id">ID do Autor</label>
                <input type="number" class="form-control" id="autor_id" name="autor_id" required>
            </div>
            <div class="form-group">
                <label for="livro_id">ID do Livro</label>
                <input type="number" class="form-control" id="livro_id" name="livro_id" required>
            </div>
            <button type="submit" class="btn btn-primary">Associar</button>
        </form>
        <a href="index.php?action=list-autores" class="btn btn-secondary mt-3">Voltar</a>
    </div>
</div>

