<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Evento</title>
    <!-- Link para o Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark">
    <div class="container-fluid d-flex flex-column justify-content-center align-items-center min-vh-100">
        <!-- Botão de Voltar para a Página Inicial em cima do Card -->
        <div class="mb-4 w-100 text-center">
            <a href="/" class="btn btn-secondary btn-lg">Voltar para a Página Inicial</a>
        </div>

        <!-- Card de Criar Evento -->
        <div class="card shadow-lg p-5" style="width: 100%; max-width: 700px; background-color: #f9f9f9; border-radius: 10px; border: 1px solid #ccc;">
            <h1 class="text-center mb-4" style="color: #333;">Criar Evento</h1>
            <form method="POST" action="/event/create">
                <div class="mb-4">
                    <label for="nome" class="form-label" style="color: #555;">Nome do Evento:</label>
                    <input type="text" id="nome" name="nome" class="form-control form-control-lg" required>
                </div>

                <div class="mb-4">
                    <label for="local" class="form-label" style="color: #555;">Local:</label>
                    <input type="text" id="local" name="local" class="form-control form-control-lg" required>
                </div>

                <div class="mb-4">
                    <label for="data" class="form-label" style="color: #555;">Data:</label>
                    <input type="date" id="data" name="data" class="form-control form-control-lg" required>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-lg" style="background-color: #6c757d; color: #fff;">Criar Evento</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Link para o Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
