<h1>Bebidas no Evento: <?= htmlspecialchars($nomeEvento) ?></h1>
<table border="1">
    <tr>
        <td>Nome</td>
        <td>Marca</td>
        <td>Quantidade</td>
        <td>Temperatura</td>
    </tr>
    <?php foreach ($bebidas as $bebida): ?>
        <tr>
            <td><?= htmlspecialchars($bebida['nome']) ?></td>
            <td><?= htmlspecialchars($bebida['marca']) ?></td>
            <td><?= htmlspecialchars($bebida['quantidade']) ?></td>
            <td><?= htmlspecialchars($bebida['temperatura']) ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<form method="POST" action="/controllers/bebidas.controller.php?evento=<?= urlencode($nomeEvento) ?>">
    <label for="nome">Nome da Bebida:</label>
    <input type="text" name="nome" required>
    
    <label for="marca">Marca da Bebida:</label>
    <input type="text" name="marca" required>
    
    <label for="quantidade">Quantidade Recomendada por Pessoa:</label>
    <input type="number" name="quantidade" required>
    
    <label for="temperatura">Temperatura da Bebida:</label>
    <input type="text" name="temperatura" required>
    
    <button type="submit">Adicionar</button>
</form>

<a href="/controllers/eventos.controller.php">Voltar</a>
