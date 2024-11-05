<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Login</title>
</head>
<body class="bg-dark text-white">
    <div class="container mt-5">
        <header>
            <h2 class="text-center text-info">Entre em sua conta</h2>
        </header>

        <main>
            <form method="POST" action="/controllers/login.controller.php">

                <div class="form-group">
                    <label>Usuário:</label>
                    <input type="text" name="usuario" class="form-control" required />
                </div>

                <div class="form-group">
                    <label>Senha:</label>
                    <input type="password" name="senha" class="form-control" required />
                </div>

                <?php if ($erro) : ?>
                    <div class="alert alert-danger" role="alert">
                        <p>Usuário ou Senha inválidos! Tente novamente.</p>
                    </div>
                <?php endif; ?>

                <button type="submit" class="btn btn-danger">Entrar</button>
            </form>
        </main>
    </div>
</body>
</html>
