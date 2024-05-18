<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcionários</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap5.css">
</head>

<body>
    <main class="container">
        <h1>Funcionários</h1>
        <a href="/funcionarios/inserir" class="btn btn-primary">Novo Funcionário</a>
        <p><?= $mensagem ?></p>
        <table class="table table-stripped table-hover" id="tabela">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Cargo</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($f = $resultado->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <tr>
                        <td><?= $f['nome'] ?></td>
                        <td><?= $f['cargo'] ?></td>
                        <td>
                            <a href="/funcionarios/alterar/id/<?= $f['id'] ?>" class="btn btn-warning">Alterar</a>
                            <a href="/funcionarios/excluir/id/<?= $f['id'] ?>" class="btn btn-danger">Excluir</a>
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
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
        var table = new DataTable('#tabela', {
            language: {
                url: 'https://cdn.datatables.net/plug-ins/2.0.6/i18n/pt-BR.json',
            },
        });
    </script>
</body>

</html>
