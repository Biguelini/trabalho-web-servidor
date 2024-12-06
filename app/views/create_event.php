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
    <div class="container-fluid d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg p-5" style="width: 100%; max-width: 700px; background-color: #000000; border-radius: 10px; border: 2px solid #B8621B;">
            <h1 class="text-center mb-4" style="color: #E3CCAE;">Criar Evento</h1>
            <form method="POST" action="/event/create">
                <div class="mb-4">
                    <label for="nome" class="form-label" style="color: #E3CCAE;">Nome do Evento:</label>
                    <input type="text" id="nome" name="nome" class="form-control form-control-lg" required>
                </div>

                <div class="mb-4">
                    <label for="local" class="form-label" style="color: #E3CCAE;">Local:</label>
                    <input type="text" id="local" name="local" class="form-control form-control-lg" required>
                </div>

                <div class="mb-4">
                    <label for="data" class="form-label" style="color: #E3CCAE;">Data:</label>
                    <input type="date" id="data" name="data" class="form-control form-control-lg" required>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn" style="background-color: #B8621B; color: #000000;">Criar Evento</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Link para o Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
