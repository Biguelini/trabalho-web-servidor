<div>
	<a href="/event">
		<button>Voltar</button>
	</a>
</div>
<h1>Detalhes do Evento</h1>
<p>Nome: <?php echo htmlspecialchars($event->getNome()); ?></p>
<p>Local: <?php echo htmlspecialchars($event->getLocal()); ?></p>
<p>Data: <?php echo htmlspecialchars($event->getData()); ?></p>
<p>Criado por: <?php echo htmlspecialchars($event->getIdUserCriador()); ?></p>
<a href="/event/edit/<?php echo $event->getId(); ?>">Editar</a>
<a href="/event/delete/<?php echo $event->getId(); ?>">Excluir</a>

<h2>Bebidas</h2>

<a href="/event/<?php echo $event->getId(); ?>/bebida/create">Adicionar Bebida</a>

<ul>
	<?php foreach ($bebidas as $bebida): ?>
		<li>
			Nome: <?php echo htmlspecialchars($bebida->getNome()); ?> - Quantidade: <?php echo $bebida->getQuantidadePorPessoa(); ?> - Temperatura: <?php echo htmlspecialchars($bebida->getTemperaturaConsumo()); ?>
			<a href="/event/<?php echo $bebida->getEventoId(); ?>/bebida/edit/<?php echo $bebida->getId(); ?>">Editar</a>
			<a href="/event/<?php echo $bebida->getEventoId(); ?>/bebida/delete/<?php echo $bebida->getId(); ?>">Excluir</a>
		</li>
	<?php endforeach;?>
</ul>

<h2>Convidados</h2>

<form action="/event/<?php echo $event->getId(); ?>/convidado/create" method="POST">
    <label for="convidado">Convidado</label>
    <select id="convidado" name="user_id">
        <?php foreach ($users as $user): ?>
            <option value="<?php echo htmlspecialchars($user->getId()); ?>">
                <?php echo htmlspecialchars($user->getName()); ?>
            </option>
        <?php endforeach;?>
    </select>
    <button type="submit">Adicionar Convidado</button>
		<?php
			if (isset($_SESSION['error'])) {
				echo "<div class='error-message'>{$_SESSION['error']}</div>";
				unset($_SESSION['error']); 
		}
		?>
</form>

<ul>
	<?php foreach ($convidados as $convidado): ?>
		<li>
			Nome: <?php echo htmlspecialchars($convidado->getName()); ?> - CPF: <?php echo htmlspecialchars($convidado->getCpf()); ?>
			<a href="/event/<?php echo $event->getId(); ?>/convidado/delete/<?php echo $convidado->getId(); ?>">Excluir</a>
		</li>
	<?php endforeach;?>
</ul>