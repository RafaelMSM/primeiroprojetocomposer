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
    <h1>Marcas</h1>
    <a href="/marcas/inserir" class="btn btn-primary">Nova Marca</a>
    <p><?= $mensagem ?> </p>
    <table class="table table-stripped table-hover" id="tabela">
        <thead>
        <tr>
            <th> Nome da marca: </th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php
    while($marca = $resultado->fetch(PDO::FETCH_ASSOC)){ 

            ?>
            <tr>
                <td><?= $marca['nome']?></td>
                <td>
                    <a href="/marcas/alterar/id/<?= $marca["id"]?>" class="btn btn-warning">
                        Alterar
                    </a>
                    <a href="/marcas/excluir/id/<?= $marca["id"]?>" class="btn btn-danger">
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
