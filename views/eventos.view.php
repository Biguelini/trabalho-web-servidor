<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="../styles/eventos.css">
    <title>Eventos</title>
</head>
<body class="bg-dark text-white">
    <header><?php require('header.view.php'); ?></header>
    <div class="container mt-5">
        <h1 class="text-center text-info">Eventos</h1>

        <form method="POST" action="" class="mt-4">
            <h2 class="text-light">Adicionar Evento</h2>
            <div class="form-group">
                <label for="evento" class="form-label">Nome do Evento:</label>
                <input type="text" name="evento" class="form-control bg-secondary text-white" required>
            </div>

            <div class="form-group">
                <label for="data" class="form-label">Data:</label>
                <input type="date" name="data" class="form-control bg-secondary text-white" required>
            </div>

            <div class="form-group">
                <label for="local" class="form-label">Local do Evento:</label>
                <input type="text" name="local" class="form-control bg-secondary text-white" required>
            </div>

            <div class="form-group">
                <label for="obs" class="form-label">Observações do Evento:</label>
                <input type="text" name="obs" class="form-control bg-secondary text-white" required>
            </div>

            <button type="submit" class="btn btn-danger">Adicionar</button>
        </form>

        <table class="table table-bordered mt-4 bg-secondary text-white">
            <thead class="thead-dark">
                <tr>
                    <th>Nome</th>
                    <th>Local</th>
                    <th>Observação</th>
                    <th>Data</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($eventos as $evento) : ?>
                    <tr>
                        <td><?= htmlspecialchars($evento['nome']) ?></td>
                        <td><?= htmlspecialchars($evento['local']) ?></td>
                        <td><?= htmlspecialchars($evento['obs']) ?></td>
                        <td><?= htmlspecialchars($evento['data']) ?></td>
                        <td>
                            <a href="/trabalho-web-servidor/controllers/pessoas.controller.php?evento=<?= htmlspecialchars($evento['nome']) ?>" class="btn btn-info btn-sm">Ver Pessoas</a>
                            <a href="/trabalho-web-servidor/controllers/bebidas.controller.php?evento=<?= htmlspecialchars($evento['nome']) ?>" class="btn btn-info btn-sm">Adicionar Bebidas</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <a href="/trabalho-web-servidor/controllers/logout.controller.php" class="btn btn-danger">Sair</a>
    </div>
    <footer><?php require('footer.view.php'); ?></footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
