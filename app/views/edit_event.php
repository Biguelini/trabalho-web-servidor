<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Evento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark">
    <div class="container-fluid d-flex flex-column justify-content-center align-items-center min-vh-100">
        <!-- Botão Voltar -->
        <div class="mb-4 w-100 text-center">
            <a href="/event" class="btn btn-secondary btn-lg">Voltar para a Página Inicial</a>
        </div>

        <!-- Atualizar Evento -->
        <div class="card shadow-lg p-5" style="width: 100%; max-width: 700px; background-color: #f9f9f9; border-radius: 10px; border: 1px solid #ccc;">
            <h1 class="text-center mb-4" style="color: #333;">Atualizar Evento</h1>
            
            <form method="POST" action="/event/update/<?php echo $event->getId(); ?>">
                <div class="mb-4">
                    <label for="nome" class="form-label" style="color: #555;">Nome do Evento:</label>
                    <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($event->getNome()); ?>" required class="form-control form-control-lg"><br>
                </div>

                <div class="mb-4">
                    <label for="local" class="form-label" style="color: #555;">Local:</label>
                    <input type="text" id="local" name="local" value="<?php echo htmlspecialchars($event->getLocal()); ?>" required class="form-control form-control-lg"><br>
                </div>

                <div class="mb-4">
                    <label for="data" class="form-label" style="color: #555;">Data:</label>
                    <input type="date" id="data" name="data" value="<?php echo htmlspecialchars($event->getData()); ?>" required class="form-control form-control-lg"><br>
                </div>

                <!-- Botão Atualizar com a mesma cor de fundo -->
                <div class="d-grid gap-2">
                    <button type="submit" class="btn text-light" style="background-color: #333333;">Atualizar Evento</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
