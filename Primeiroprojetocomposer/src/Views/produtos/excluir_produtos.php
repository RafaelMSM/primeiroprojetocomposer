<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Excluir Produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <main class="container">
        <h1>Excluir Produto</h1>
        <form method="post" action="/produtos/deletar">
            <div class="form-group">
                <label for="id">ID</label>
                <input type="text" class="form-control" id="id" name="id" value="<?= $resultado["id"] ?>" readonly>
            </div>
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?= $resultado["nome"] ?>" readonly>
            </div>
            <div class="form-group">
                <label for="valor">Valor</label>
                <input type="number" step="0.01" class="form-control" id="valor" name="valor" value="<?= $resultado["valor"] ?>" readonly>
            </div>
            <div class="form-group">
                <label for="categoria_id">Categoria ID</label>
                <input type="number" class="form-control" id="categoria_id" name="categoria_id" value="<?= $resultado["categoria_id"] ?>" readonly>
            </div>
            <br>
            <button type="submit" class="btn btn-danger">Excluir</button>
            <a href="/produtos/index" class="btn btn-secondary">Cancelar</a>
        </form>
    </main>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
