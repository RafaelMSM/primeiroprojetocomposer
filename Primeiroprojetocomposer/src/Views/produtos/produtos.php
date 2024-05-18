<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap5.css">
  </head>
  <body>
    <main class="container">
        <h1>Produtos</h1>
        <a href="/produtos/inserir" class="btn btn-primary">Novo Produto</a>
        <p><?= $mensagem ?> </p>
        <table class="table table-stripped table-hover" id="tabela">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Valor</th>
                    <th>Categoria ID</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($p = $resultado->fetch(PDO::FETCH_ASSOC)){
                    ?>
                        <tr>
                            <td><?= $p['nome'] ?></td>
                            <td><?= $p['valor'] ?></td>
                            <td><?= $p['categoria_id'] ?></td>
                            <td>
                                <a href="/produtos/alterar/id/<?= $p["id"] ?>" class="btn btn-warning">Alterar</a>
                                <a href="/produtos/excluir/id/<?= $p["id"] ?>" class="btn btn-danger">Excluir</a>
                            </td>
                        </tr>
                    <?php    
                    }
                ?>
            </tbody>
        </table>
    </main>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.js"></script>
    <script>
        new DataTable('#tabela');
    </script>
  </body>
</html>
