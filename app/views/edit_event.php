<?php
$pageTitle = 'Editar Evento'; 
include __DIR__ . '/../Includes/header.php'; 
?>

<div class="container-fluid d-flex flex-column justify-content-center align-items-center min-vh-100">
    <div class="mb-4 w-100 text-center">
        <a href="/event/<?php echo isset($eventId) ? htmlspecialchars($eventId) : ''; ?>" class="btn btn-secondary btn-lg">Voltar para o Evento</a>
    </div>
    <?php include __DIR__ . '/../Includes/forms/edit_event_form.php'; ?>
</div>

<?php include __DIR__ . '/../Includes/footer.php';  ?>
