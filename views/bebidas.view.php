<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<title>Bebidas no Evento</title>
</head>

<body class="bg-dark text-white">
	<div class="container mt-5">
		<a href="/controllers/eventos.controller.php" class="btn btn-danger mt-3">Voltar</a>

		<h1 class="text-center text-info">Bebidas no Evento: <?= htmlspecialchars($nomeEvento) ?></h1>

		<form method="POST" action="/controllers/bebidas.controller.php?evento=<?= urlencode($nomeEvento) ?>">
			<div class="form-group">
				<label for="nome">Nome da Bebida:</label>
				<input type="text" name="nome" class="form-control bg-secondary text-white" required>
			</div>

			<div class="form-group">
				<label for="marca">Marca da Bebida:</label>
				<input type="text" name="marca" class="form-control bg-secondary text-white" required>
			</div>

			<div class="form-group">
				<label for="quantidade">Quantidade Recomendada por Pessoa:</label>
				<input type="number" name="quantidade" class="form-control bg-secondary text-white" required>
			</div>

			<div class="form-group">
				<label for="temperatura">Temperatura da Bebida:</label>
				<input type="text" name="temperatura" class="form-control bg-secondary text-white" required>
			</div>

			<button type="submit" class="btn btn-primary">Adicionar</button>
		</form>

		<table class="table table-bordered mt-4 bg-secondary text-white">
			<thead class="thead-dark">
				<tr>
					<th>Nome</th>
					<th>Marca</th>
					<th>Quantidade</th>
					<th>Temperatura</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($bebidas as $bebida): ?>
					<tr>
						<td><?= htmlspecialchars($bebida['nome']) ?></td>
						<td><?= htmlspecialchars($bebida['marca']) ?></td>
						<td><?= htmlspecialchars($bebida['quantidade']) ?></td>
						<td><?= htmlspecialchars($bebida['temperatura']) ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</body>

</html>