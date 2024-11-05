<h1>Pessoas no Evento: <?= htmlspecialchars($nomeEvento) ?></h1>
<table border="1">
    <tr>
        <td>Nome</td>
        <td>Idade</td>
        <td>Telefone</td>
        <td>Email</td>
    </tr>
    <?php foreach ($pessoas as $pessoa): ?>
        <tr>
            <td><?= htmlspecialchars($pessoa['nome']) ?></td>
            <td><?= htmlspecialchars($pessoa['idade']) ?></td>
            <td><?= htmlspecialchars($pessoa['telefone']) ?></td>
            <td><?= htmlspecialchars($pessoa['email']) ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<form method="POST" action="/controllers/pessoas.controller.php?evento=<?= urlencode($nomeEvento) ?>">
    <label for="nome">Nome da Pessoa:</label>
    <input type="text" name="nome" required>

    <label for="idade">Idade:</label>
    <input type="number" name="idade" required>

    <label for="telefone">Telefone:</label>
    <input type="text" name="telefone" required>

    <label for="email">Email:</label>
    <input type="email" name="email" required>

    <button type="submit">Adicionar</button>
</form>

<a href="/controllers/eventos.controller.php">Voltar</a>
