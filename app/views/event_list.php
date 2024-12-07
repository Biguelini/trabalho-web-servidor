<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Eventos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark text-light" style="font-family: Arial, sans-serif;">
    <div class="container mt-5">

        <h1 class="text-center mb-5 text-white">Lista de Eventos</h1>


        <div class="mb-4 d-flex justify-content-center">
            <div class="d-inline-flex gap-3">
                <a href="/event/create" class="btn btn-lg text-light" style="background-color: #333333;">Adicionar Evento</a>
                <a href="/logout" class="btn btn-lg text-light" style="background-color: #333333;">Logout</a>
            </div>
        </div>


        <div class="row">
            <?php foreach ($events as $event): ?>
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm" style="background-color: rgba(255, 255, 255, 0.9); border-radius: 10px;">
                        <div class="card-body">
                            <h5 class="card-title text-dark"><?php echo htmlspecialchars($event->getNome()); ?></h5>
                            <p class="card-text text-secondary">Local: <?php echo htmlspecialchars($event->getLocal()); ?></p>
                            <p class="card-text text-secondary">Data: <?php echo date('d/m/Y', strtotime($event->getData())); ?></p>
                            <div class="d-flex justify-content-between">
                                <a href="/event/<?php echo $event->getId(); ?>" class="btn text-light" style="background-color: #333333;">Detalhes</a>
                                <a href="/event/edit/<?php echo $event->getId(); ?>" class="btn text-light" style="background-color: #333333;">Editar</a>
                                <a href="/event/delete/<?php echo $event->getId(); ?>" class="btn text-light" style="background-color: #333333;">Excluir</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
