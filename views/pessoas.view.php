<h1>Pessoas no Evento: <?= htmlspecialchars($nomeEvento) ?></h1>
<table border="1">
    <tr>
        <td>Nome</td>
    </tr>
    <?php foreach ($pessoas as $pessoa): ?>
        <tr>
            <td><?= htmlspecialchars($pessoa) ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<form method="POST" action="/controllers/pessoas.controller.php?evento=<?= urlencode($nomeEvento) ?>">
    <label for="pessoa">Nome da Pessoa:</label>
    <input type="text" name="pessoa" required>
    <button type="submit">Adicionar</button>
</form>

<a href="/controllers/eventos.controller.php">Voltar</a>

