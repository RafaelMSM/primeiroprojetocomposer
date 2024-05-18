<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   </head>
  <body>
    <main class="container">
        <h1>Fornecedores</h1>
        <a href="/fornecedores/inserir" class="btn btn-primary">Novo Fornecedor</a>
        <p><?= $mensagem ?> </p>
        <table class="table table-stripped table-hover" id="tabela">
            <thead>
                <tr>
                    <th> Nome </th>
                    <th> Endereço </th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($fornecedor = $resultado->fetch(PDO::FETCH_ASSOC)){
                    ?>
                        <tr>
                            <td><?= $fornecedor['nome']?></td>
                            <td><?= $fornecedor['endereco']?></td>
                            <td>
                                <a href="/fornecedores/alterar/id/<?= $fornecedor["id"]?>" class="btn btn-warning">
                                    Alterar
                                </a>
                                <a href="/fornecedores/excluir/id/<?= $fornecedor["id"]?>" class="btn btn-danger">
                                    Excluir
                                </a>
                            </td>
                        </tr>
                    <?php    
                    }
                ?>
            </tbody>
        </table>
    </main>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
