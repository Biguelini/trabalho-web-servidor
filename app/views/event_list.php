<h1>Lista de Eventos</h1>

<div>
	<a href="/event/create">
		<button>Adicionar Evento</button>
	</a>

	<a href="/logout">
		<button>Logout</button>
	</a>
</div>

<ul>
	<?php foreach ($events as $event): ?>
		<li>
			<a href="/event/<?php echo $event->getId(); ?>"><?php echo htmlspecialchars($event->getNome()); ?></a>
			<a href="/event/edit/<?php echo $event->getId(); ?>">Editar</a>
			<a href="/event/delete/<?php echo $event->getId(); ?>">Excluir</a>
		</li>
	<?php endforeach; ?>
</ul>