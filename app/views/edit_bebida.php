<h1>Editar Bebida</h1>

<form method="POST">
    <label for="nome">Nome</label>
    <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($bebida->getNome()); ?>" required>

    <label for="quantidade_por_pessoa">Quantidade por Pessoa</label>
    <input type="number" id="quantidade_por_pessoa" name="quantidade_por_pessoa" value="<?php echo $bebida->getQuantidadePorPessoa(); ?>" required>

    <label for="temperatura_consumo">Temperatura de Consumo</label>
    <input type="text" id="temperatura_consumo" name="temperatura_consumo" value="<?php echo htmlspecialchars($bebida->getTemperaturaConsumo()); ?>" required>

    <button type="submit">Salvar Alterações</button>
</form>
