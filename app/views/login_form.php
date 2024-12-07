<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class=" bg-dark text-light" style="font-family: Arial, sans-serif;">
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="text-center p-4 rounded shadow" 
             style="background-color: rgba(255, 255, 255, 0.9); max-width: 350px; width: 100%; border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);">
            <h1 class="text-dark">Login</h1>
            <form action="/login" method="POST" class="mt-4">
                <div class="mb-3">
                    <label for="username" class="form-label text-secondary">Usuário:</label>
                    <input type="text" id="username" name="username" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label text-secondary">Senha:</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn text-white" style="background-color: #333333;">Entrar</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
