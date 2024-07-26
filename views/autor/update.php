<h1>Editar Autor</h1>
<form action="index.php?action=edit-autor&id=<?php echo $autor->id; ?>" method="POST">
    <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" class="form-control" name="nome" value="<?php echo $autor->nome; ?>" required>
    </div>
    <input type="submit" class="btn btn-primary" value="Salvar">
</form>
