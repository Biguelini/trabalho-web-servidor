<?php
$pageTitle = 'Eventos'; 
include_once __DIR__ . '/../Includes/header.php';

include_once __DIR__ . '/../Includes/forms/event_list_form.php';
?>

<a href="/perfil/<?php echo $_SESSION['user']['id']?>">
    <button>Perfil</button>
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
    <?php endforeach;?>
</ul>

<?php
include_once __DIR__ . '/../Includes/footer.php';
?>
