<h1>Notas da turma</h1>

<form method="POST" action="">
	<h2>Adicionar Evento</h2>
	<label for="evento">Nome do Evento:</label>
	<input type="text" name="evento" required>

	<label for="data">Data:</label>
	<input type="date" name="data" required>

	<button type="submit">Adicionar</button>
</form>

<table border="1">
	<tr>
		<td>Nome</td>
		<td>Data</td>
		<td>Ações</td>
	</tr>
	<?php foreach ($eventos as $evento) : ?>
		<tr>
			<td><?= htmlspecialchars($evento['nome']) ?></td>
			<td><?= htmlspecialchars($evento['data']) ?></td>
			<td>
				<a href="/controllers/pessoas.controller.php?evento=<?= htmlspecialchars($evento['nome']) ?>">Ver Pessoass</a>
				<a href="/controllers/bebidas.controller.php?evento=<?= htmlspecialchars($evento['nome']) ?>">Adicionar Bebidas</a>
			</td>
		</tr>
	<?php endforeach; ?>
</table>