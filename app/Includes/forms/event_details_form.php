<div class="card shadow-lg p-5" style="width: 100%; max-width: 700px; background-color: #f9f9f9; border-radius: 10px; border: 1px solid #ccc;">
    <h1 class="text-center mb-4" style="color: #333;">Atualizar Evento</h1>
    <form method="POST" action="/event/update/<?php echo $event->getId(); ?>">

        <div class="mb-4">
            <label for="nome" class="form-label" style="color: #555;">Nome do Evento:</label>
            <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($event->getNome()); ?>" class="form-control form-control-lg" required>
        </div>

        <div class="mb-4">
            <label for="local" class="form-label" style="color: #555;">Local:</label>
            <input type="text" id="local" name="local" value="<?php echo htmlspecialchars($event->getLocal()); ?>" class="form-control form-control-lg" required>
        </div>

        <div class="mb-4">
            <label for="data" class="form-label" style="color: #555;">Data:</label>
            <input type="date" id="data" name="data" value="<?php echo htmlspecialchars($event->getData()); ?>" class="form-control form-control-lg" required>
        </div>

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-lg" style="background-color: #6c757d; color: #fff;">Atualizar Evento</button>
        </div>
    </form>
</div>
