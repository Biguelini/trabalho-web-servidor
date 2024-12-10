<div class="container-fluid d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow-lg p-5" style="width: 100%; max-width: 700px; background-color: #f9f9f9; border-radius: 10px; border: 1px solid #ccc;">
        <h1 class="text-center mb-4" style="color: #333;">Perfil do Usuário</h1>
        <form action="/user/update/<?php echo $user->getId(); ?>" method="POST">
            <div class="mb-4">
                <label for="username" class="form-label" style="color: #555;">Username:</label>
                <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($user->getUsername()); ?>" class="form-control form-control-lg" required>
            </div>

            <div class="mb-4">
                <label for="name" class="form-label" style="color: #555;">Nome:</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($user->getName()); ?>" class="form-control form-control-lg" required>
            </div>

            <div class="mb-4">
                <label for="cpf" class="form-label" style="color: #555;">CPF:</label>
                <input type="text" id="cpf" name="cpf" value="<?php echo htmlspecialchars($user->getCPF()); ?>" class="form-control form-control-lg" required>
            </div>

            <div class="mb-4">
                <label for="birth" class="form-label" style="color: #555;">Data de Nascimento:</label>
                <input type="date" id="birth" name="birth" value="<?php echo htmlspecialchars($user->getBirth()); ?>" class="form-control form-control-lg" required>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-lg" style="background-color: #6c757d; color: #fff;">Atualizar Dados</button>
            </div>
        </form>
    </div>
</div>
