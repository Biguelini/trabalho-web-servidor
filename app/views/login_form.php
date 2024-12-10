<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<title>Login</title>
</head>

<body>
	<h1>Login</h1>
	<form action="/login" method="POST">
		<label for="username">Usuário:</label>
		<input type="text" id="username" name="username" required><br><br>

		<label for="password">Senha:</label>
		<input type="password" id="password" name="password" required><br><br>

		<button type="submit">Entrar</button>
		<button><a href="/cadastro">Cadastrar</a></button>
	</form>
</body>

</html>