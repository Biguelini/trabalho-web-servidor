<div class="container mt-5">
    <h1 class="text-center mb-5 text-white" style="color: #333;">Lista de Eventos</h1>
    <div class="mb-4 d-flex justify-content-center">
        <div class="d-inline-flex gap-3">
            <a href="/event/create" class="btn btn-lg text-light" style="background-color: #333333;">Adicionar Evento</a>
            <a href="/logout" class="btn btn-lg text-light" style="background-color: #333333;">Logout</a>
        </div>
    </div>
    <div class="row">
        <?php foreach ($events as $event): ?>
            <div class="col-md-4 mb-4">
                <div class="card shadow-lg p-5" style="width: 100%; max-width: 700px; background-color: #f9f9f9; border-radius: 10px; border: 1px solid #ccc;">
                    <div class="card-body">

                        <h5 class="card-title" style="color: #333;"><?php echo htmlspecialchars($event->getNome()); ?></h5>
                        <p class="card-text" style="color: #555;">Local: <?php echo htmlspecialchars($event->getLocal()); ?></p>
                        <p class="card-text" style="color: #555;">Data: <?php echo date('d/m/Y', strtotime($event->getData())); ?></p>
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
