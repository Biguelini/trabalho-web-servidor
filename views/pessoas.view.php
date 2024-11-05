<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Pessoas no Evento</title>
</head>

<body class="bg-dark text-white">
    <div class="container mt-5">
        <h1 class="text-center text-info">Pessoas no Evento: <?= htmlspecialchars($nomeEvento) ?></h1>
        <table class="table table-bordered mt-4 bg-secondary text-white">
            <thead class="thead-dark">
                <tr>
                    <th>Nome</th>
                    <th>Idade</th>
                    <th>Telefone</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pessoas as $pessoa): ?>
                    <tr>
                        <td><?= htmlspecialchars($pessoa['nome']) ?></td>
                        <td><?= htmlspecialchars($pessoa['idade']) ?></td>
                        <td><?= htmlspecialchars($pessoa['telefone']) ?></td>
                        <td><?= htmlspecialchars($pessoa['email']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <form method="POST" action="/controllers/pessoas.controller.php?evento=<?= urlencode($nomeEvento) ?>">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" class="form-control bg-secondary text-white" required>
            </div>
            
            <div class="form-group">
                <label for="idade">Idade:</label>
                <input type="number" name="idade" class="form-control bg-secondary text-white" required>
            </div>
            
            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type="text" name="telefone" class="form-control bg-secondary text-white" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control bg-secondary text-white" required>
            </div>
            
            <button type="submit" class="btn btn-danger">Adicionar</button>
        </form>

        <a href="/controllers/eventos.controller.php" class="btn btn-danger mt-3">Voltar</a>
    </div>

</body>
</html>
