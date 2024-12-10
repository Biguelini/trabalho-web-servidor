<div class="container-fluid d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow-lg p-5" style="width: 100%; max-width: 700px; background-color: #f9f9f9; border-radius: 10px; border: 1px solid #ccc;">
        <h1 class="text-center mb-4" style="color: #333;">Cadastro de Usuário</h1>
        <form action="/cadastro" method="POST">
            <div class="mb-4">
                <label for="username" class="form-label" style="color: #555;">Username:</label>
                <input type="text" id="username" name="username" value="<?php echo isset($user) ? htmlspecialchars($user->getUsername()) : ''; ?>" class="form-control form-control-lg" required>
            </div>

            <div class="mb-4">
                <label for="password" class="form-label" style="color: #555;">Senha:</label>
                <input type="password" id="password" name="password" value="<?php echo isset($user) ? htmlspecialchars($user->getPassword()) : ''; ?>" class="form-control form-control-lg" required>
            </div>

            <div class="mb-4">
                <label for="name" class="form-label" style="color: #555;">Nome:</label>
                <input type="text" id="name" name="name" value="<?php echo isset($user) ? htmlspecialchars($user->getName()) : ''; ?>" class="form-control form-control-lg" required>
            </div>

            <div class="mb-4">
                <label for="cpf" class="form-label" style="color: #555;">CPF:</label>
                <input type="text" id="cpf" name="cpf" value="<?php echo isset($user) ? htmlspecialchars($user->getCPF()) : ''; ?>" class="form-control form-control-lg" required>
            </div>

            <div class="mb-4">
                <label for="birth_date" class="form-label" style="color: #555;">Data de Nascimento:</label>
                <input type="date" id="birth_date" name="birth_date" value="<?php echo isset($user) ? htmlspecialchars($user->getBirth()) : ''; ?>" class="form-control form-control-lg" required>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-lg" style="background-color: #6c757d; color: #fff;">Cadastrar Usuário</button>
            </div>
        </form>

        <!-- Botão Editar Perfil -->
        <?php if (isset($_SESSION['user']['id'])) : ?>
            <div class="d-grid gap-2 mt-3">
                <a href="/perfil/<?php echo $_SESSION['user']['id']; ?>" class="btn btn-lg text-light" style="background-color: #333333;">Editar Perfil</a>
            </div>
        <?php endif; ?>
    </div>
</div>
