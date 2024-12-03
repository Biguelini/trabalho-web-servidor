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