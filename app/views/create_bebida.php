<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Bebida</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark">
    <div class="container-fluid d-flex flex-column justify-content-center align-items-center min-vh-100">
        <div class="mb-4 w-100 text-center">
            <a href="/event/<?php echo isset($eventId) ? htmlspecialchars($eventId) : ''; ?>" class="btn btn-secondary btn-lg">Voltar para o Evento</a>
        </div>

        <div class="card shadow-lg p-5" style="width: 100%; max-width: 700px; background-color: #f9f9f9; border-radius: 10px; border: 1px solid #ccc;">
            <h1 class="text-center mb-4" style="color: #333;">Adicionar Bebida</h1>

            <form method="POST" action="/event/<?php echo isset($eventId) ? htmlspecialchars($eventId) : ''; ?>/bebida/store">
                <div class="mb-3">
                    <label for="nome" class="form-label" style="color: #555;">Nome</label>
                    <input type="text" id="nome" name="nome" class="form-control form-control-lg" placeholder="Ex.: Coca-Cola" required>
                </div>

                <div class="mb-3">
                    <label for="quantidade_por_pessoa" class="form-label" style="color: #555;">Quantidade por Pessoa</label>
                    <input type="number" id="quantidade_por_pessoa" name="quantidade_por_pessoa" class="form-control form-control-lg" placeholder="Ex.: 2" required>
                </div>

                <div class="mb-3">
                    <label for="temperatura_consumo" class="form-label" style="color: #555;">Temperatura de Consumo</label>
                    <input type="text" id="temperatura_consumo" name="temperatura_consumo" class="form-control form-control-lg" placeholder="Ex.: Gelada" required>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn text-light" style="background-color: #333333;">Adicionar Bebida</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
