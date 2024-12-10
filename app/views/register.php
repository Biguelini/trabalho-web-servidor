<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<title>Cadastro</title>
</head>

<body>
    <h1>Cadastro</h1>
    <form action="/cadastro" method="POST">
        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username"
                value="<?php echo isset($user) ? htmlspecialchars($user->getUsername()) : ''; ?>" required>
        </div>

        <div>
            <label for="password">Senha:</label>
            <input type="password" id="password" name="password"
                value="<?php echo isset($user) ? htmlspecialchars($user->getPassword()) : ''; ?>" required>
        </div>

        <div>
            <label for="name">Nome:</label>
            <input type="text" id="name" name="name"
                value="<?php echo isset($user) ? htmlspecialchars($user->getName()) : ''; ?>" required>
        </div>

        <div>
            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" name="cpf"
                value="<?php echo isset($user) ? htmlspecialchars($user->getCPF()) : ''; ?>" required>
        </div>

        <div>
            <label for="birth_date">Data de Nascimento:</label>
            <input type="date" id="birth_date" name="birth_date"
                value="<?php echo isset($user) ? htmlspecialchars($user->getBirth()) : ''; ?>" required>
        </div>

        <div>
            <button type="submit">Cadastrar Usuário</button>
            <a href="/">Voltar</a>
        </div>
    </form>
</body>

</html>