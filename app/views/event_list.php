<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Eventos</title>
    <!-- Link para o Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark text-white">
    <div class="container mt-5">
        <!-- Título -->
        <h1 class="text-center mb-5" style="color: #E3CCAE;">Lista de Eventos</h1>

        <!-- Botões de adicionar evento e logout -->
        <div class="mb-4 text-center">
            <a href="/event/create">
                <button class="btn btn-lg" style="background-color: #B8621B; color: #000000;">Adicionar Evento</button>
            </a>

            <a href="/logout">
                <button class="btn btn-lg ms-3" style="background-color: #B8621B; color: #000000;">Logout</button>
            </a>
        </div>

        <!-- Lista de Eventos -->
        <div class="row">
            <?php foreach ($events as $event): ?>
                <div class="col-md-4 mb-4">
                    <div class="card" style="background-color: #262A56; border: 2px solid #B8621B;">
                        <div class="card-body">
                            <h5 class="card-title" style="color: #E3CCAE;"><?php echo htmlspecialchars($event->getNome()); ?></h5>
                            <p class="card-text" style="color: #E3CCAE;">Local: <?php echo htmlspecialchars($event->getLocal()); ?></p>
                            <p class="card-text" style="color: #E3CCAE;">Data: <?php echo htmlspecialchars($event->getData()); ?></p>

                            <div class="d-flex justify-content-between">
                                <a href="/event/<?php echo $event->getId(); ?>" class="btn" style="background-color: #B8621B; color: #000000;">Detalhes</a>
                                <a href="/event/edit/<?php echo $event->getId(); ?>" class="btn" style="background-color: #B8621B; color: #000000;">Editar</a>
                                <a href="/event/delete/<?php echo $event->getId(); ?>" class="btn" style="background-color: #B8621B; color: #000000;">Excluir</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Link para o Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
