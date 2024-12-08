<div class="container">
  <div>
    <div>
      <h3>Perfil do Usuário</h3>
      <form action="/user/update/<?php echo $user->getId(); ?>" method="POST">
        <div>
          <label for="username">Username:</label>
          <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($user->getUsername()); ?>" required>
        </div>

        <div>
          <label for="name">Nome:</label>
          <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($user->getName()); ?>" required>
        </div>

        <div>
          <label for="cpf">CPF:</label>
          <input type="text" id="cpf" name="cpf" value="<?php echo htmlspecialchars($user->getCPF()); ?>" required>
        </div>

        <div>
          <label for="birth">Data de Nascimento:</label>
          <input type="date" id="birth" name="birth" value="<?php echo htmlspecialchars($user->getBirth()); ?>" required>
        </div>

        <button type="submit">Atualizar Dados</button>
        <button><a href="/">Voltar</a></button>

      </form>
    </div>
  </div>
</div>
