<form method="POST" action="/event/update/<?php echo $event->getId(); ?>">
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($event->getNome()); ?>" required><br>

    <label for="local">Local:</label>
    <input type="text" id="local" name="local" value="<?php echo htmlspecialchars($event->getLocal()); ?>" required><br>

    <label for="data">Data:</label>
    <input type="date" id="data" name="data" value="<?php echo htmlspecialchars($event->getData()); ?>" required><br>

    <button type="submit">Atualizar Evento</button>
</form>
