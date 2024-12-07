<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Evento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark">
    <div class="container-fluid d-flex flex-column justify-content-center align-items-center min-vh-100">
        <!-- Botão Voltar -->
        <div class="mb-4 w-100 text-center">
            <a href="/event" class="btn btn-secondary btn-lg">Voltar para a Página Inicial</a>
        </div>

        <!-- Detalhes do Evento -->
        <div class="card shadow-lg p-5" style="width: 100%; max-width: 700px; background-color: #f9f9f9; border-radius: 10px; border: 1px solid #ccc;">
            <h1 class="text-center mb-4" style="color: #333;">Detalhes do Evento</h1>

            <p><strong>Nome:</strong> <?php echo htmlspecialchars($event->getNome()); ?></p>
            <p><strong>Local:</strong> <?php echo htmlspecialchars($event->getLocal()); ?></p>
            <p><strong>Data:</strong> <?php echo date('d/m/Y', strtotime($event->getData())); ?></p>
            <p><strong>Criado por:</strong> <?php echo htmlspecialchars($event->getIdUserCriador()); ?></p>

            <div class="d-flex justify-content-between">
                <a href="/event/edit/<?php echo $event->getId(); ?>" class="btn btn-primary">Editar</a>
                <a href="/event/delete/<?php echo $event->getId(); ?>" class="btn btn-danger">Excluir</a>
            </div>

            <hr>

            <!-- Bebidas do Evento -->
            <h2 class="mt-4">Bebidas</h2>
            <a href="/event/<?php echo $event->getId(); ?>/bebida/create" class="btn btn-success mb-4">Adicionar Bebida</a>

            <ul class="list-group">
                <?php foreach ($bebidas as $bebida): ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <?php echo htmlspecialchars($bebida->getNome()); ?> - Quantidade: <?php echo $bebida->getQuantidadePorPessoa(); ?> - Temperatura: <?php echo htmlspecialchars($bebida->getTemperaturaConsumo()); ?>
                        <div>
                            <a href="/event/<?php echo $bebida->getEventoId(); ?>/bebida/edit/<?php echo $bebida->getId(); ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="/event/<?php echo $bebida->getEventoId(); ?>/bebida/delete/<?php echo $bebida->getId(); ?>" class="btn btn-danger btn-sm">Excluir</a>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
