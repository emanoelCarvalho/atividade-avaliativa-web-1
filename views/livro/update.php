<h1>Editar livro</h1>
<form action="index.php?action=edit-livro&id=<?php echo $livro->id; ?>" method="POST">
    <div class="form-group">
        <label for="titulo">Título:</label>
        <input type="text" class="form-control" name="titulo" value="<?php echo $livro->titulo; ?>" required>
    </div>
    <input type="submit" class="btn btn-primary" value="Salvar">
</form>