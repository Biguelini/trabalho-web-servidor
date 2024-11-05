<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
	<title>Login</title>
</head>

<body>
	<header>
		<h2>Entre em sua conta </h2>
	</header>

	<main>
		<form method="POST" action="/controllers/login.controller.php">
			<?php if ($erro) : ?>
				<div style="background: #555555; padding: 15px; margin-bottom: 24px;">
					Usuário ou Senha inválidos! Tente novamente.
				</div>
			<?php endif; ?>

			<label>Usuário: </label><br />
			<input type="text" name="usuario" /><br />

			<label>Senha: </label><br />
			<input type="password" name="senha" /><br />

			<button>Entrar</button>
		</form>
	</main>
</body>

</html>