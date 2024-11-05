<h1>Bebidass no Evento: <?= htmlspecialchars($nomeEvento) ?></h1>
<table border="1">
    <tr>
        <td>Nome</td>
    </tr>
    <?php foreach ($bebidas as $bebida): ?>
        <tr>
            <td><?= htmlspecialchars($bebida) ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<form method="POST" action="/controllers/bebidas.controller.php?evento=<?= urlencode($nomeEvento) ?>">
    <label for="bebida">Nome da Bebida:</label>
    <input type="text" name="bebida" required>
    <button type="submit">Adicionar</button>
</form>

<a href="/controllers/eventos.controller.php">Voltar</a>

