<div class="card shadow-lg p-5" style="width: 100%; max-width: 700px; background-color: #f9f9f9; border-radius: 10px; border: 1px solid #ccc;">
    <h1 class="text-center mb-4" style="color: #333;">Editar Bebida</h1>
    
    <?php if ($bebida): ?>
        <form method="POST" action="/event/<?php echo isset($eventId) ? htmlspecialchars($eventId) : ''; ?>/bebida/edit/<?php echo $bebida->getId(); ?>">

            <div class="mb-4">
                <label for="nome" class="form-label" style="color: #555;">Nome:</label>
                <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($bebida->getNome()); ?>" required class="form-control form-control-lg">
            </div>
            <div class="mb-4">
                <label for="quantidade_por_pessoa" class="form-label" style="color: #555;">Quantidade por Pessoa:</label>
                <input type="number" id="quantidade_por_pessoa" name="quantidade_por_pessoa" value="<?php echo $bebida->getQuantidadePorPessoa(); ?>" required class="form-control form-control-lg">
            </div>

            <div class="mb-4">
                <label for="temperatura_consumo" class="form-label" style="color: #555;">Temperatura de Consumo:</label>
                <input type="text" id="temperatura_consumo" name="temperatura_consumo" value="<?php echo htmlspecialchars($bebida->getTemperaturaConsumo()); ?>" required class="form-control form-control-lg">
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn text-light" style="background-color: #333333;">Salvar Alterações</button>
            </div>
        </form>
    <?php else: ?>
        <p>Erro: Bebida não encontrada.</p>
    <?php endif; ?>
</div>
