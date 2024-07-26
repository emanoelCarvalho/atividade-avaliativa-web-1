<h1 class="my-4">Detalhes do Livro</h1>
<div class="card">
    <div class="card-body">
        <p><strong>ID:</strong> <?php echo $livro->id; ?></p>
        <p><strong>Título:</strong> <?php echo $livro->nome; ?></p>
        <p><strong>Data de Criação:</strong> <?php echo $livro->timestamp_criacao; ?></p>
        <p><strong>Data de Atualização:</strong> <?php echo $livro->timestamp_update; ?></p>
        <a href="index.php?action=list-livros" class="btn btn-primary">Voltar</a>
    </div>
</div>