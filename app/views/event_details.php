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
			<?php echo htmlspecialchars($bebida->getNome()); ?> - Quantidade: <?php echo $bebida->getQuantidadePorPessoa(); ?> - Temperatura: <?php echo htmlspecialchars($bebida->getTemperaturaConsumo()); ?>
			<a href="/event/<?php echo $bebida->getEventoId(); ?>/bebida/edit/<?php echo $bebida->getId(); ?>">Editar</a>
			<a href="/event/<?php echo $bebida->getEventoId(); ?>/bebida/delete/<?php echo $bebida->getId(); ?>">Excluir</a>
		</li>
	<?php endforeach; ?>
</ul>