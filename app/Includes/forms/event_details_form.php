<div class="container-fluid d-flex flex-column justify-content-center align-items-center min-vh-100">
    <!-- Botão de Voltar para o Evento -->
    <div class="mb-4 w-100 text-center mt-4">
        <a href="/event/<?php echo isset($evento_id) ? htmlspecialchars($evento_id) : ''; ?>" class="btn btn-secondary btn-lg">Voltar para o Evento</a>
    </div>

    <!-- Card de Detalhes do Evento -->
    <div class="card shadow-lg p-5" style="width: 100%; max-width: 700px; background-color: #f9f9f9; border-radius: 10px; border: 1px solid #ccc;">
        <h1 class="text-center mb-4" style="color: #333;">Detalhes do Evento</h1>

        <p><strong>Nome:</strong> <?php echo htmlspecialchars($event->getNome()); ?></p>
        <p><strong>Local:</strong> <?php echo htmlspecialchars($event->getLocal()); ?></p>
        <p><strong>Data:</strong> <?php echo date('d/m/Y', strtotime($event->getData())); ?></p>
        <p><strong>Criado por:</strong> <?php echo htmlspecialchars($event->getIdUserCriador()); ?></p>

        <div class="d-flex justify-content-between">
            <a href="/event/edit/<?php echo $event->getId(); ?>" class="btn text-light" style="background-color: #333333;">Editar</a>
            <a href="/event/delete/<?php echo $event->getId(); ?>" class="btn text-light" style="background-color: #333333;">Excluir</a>
        </div>

        <hr>
        
        <!-- Seção de Bebidas -->
        <h2 class="mt-4">Bebidas</h2>
        <a href="/event/<?php echo $event->getId(); ?>/bebida/create" class="btn text-light" style="background-color: #333333; color: #fff; margin-bottom: 20px;">Adicionar Bebida</a>

        <ul class="list-group">
            <?php foreach ($bebidas as $bebida): ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <?php echo htmlspecialchars($bebida->getNome()); ?> - Quantidade: <?php echo $bebida->getQuantidadePorPessoa(); ?> - Temperatura: <?php echo htmlspecialchars($bebida->getTemperaturaConsumo()); ?>
                    <div>
                        <a href="/event/<?php echo $bebida->getEventoId(); ?>/bebida/edit/<?php echo $bebida->getId(); ?>" class="btn text-light" style="background-color: #333333;">Editar</a>
                        <a href="/event/<?php echo $bebida->getEventoId(); ?>/bebida/delete/<?php echo $bebida->getId(); ?>" class="btn text-light" style="background-color: #333333;">Excluir</a>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
        <hr>
        <h2 class="mt-4">Convidados</h2>
        <form action="/event/<?php echo $event->getId(); ?>/convidado/create" method="POST">
            <label for="convidado">Convidado</label>
            <select id="convidado" name="user_id" class="form-control">
                <?php foreach ($users as $user): ?>
                    <option value="<?php echo htmlspecialchars($user->getId()); ?>">
                        <?php echo htmlspecialchars($user->getName()); ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <button type="submit" class="btn text-light" style="background-color: #333333; color: #fff; margin-bottom: 20px;">Adicionar Convidado</button>

            <?php
            if (isset($_SESSION['error'])) {
                echo "<div class='error-message'>{$_SESSION['error']}</div>";
                unset($_SESSION['error']);
            }
            ?>
        </form>

        <ul>
            <?php foreach ($convidados as $convidado): ?>
                <li > 
                    Nome: <?php echo htmlspecialchars($convidado->getName()); ?> - CPF: <?php echo htmlspecialchars($convidado->getCpf()); ?>
                    <a href="/event/<?php echo $event->getId(); ?>/convidado/delete/<?php echo $convidado->getId(); ?>" class="btn text-light" style="background-color: #333333; color: #fff; margin-bottom: 20px;">Excluir</a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
