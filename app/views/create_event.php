<?php
$pageTitle = 'Criar Evento'; 
include __DIR__ . '/../includes/header.php'; 
?>

<div class="container-fluid d-flex flex-column justify-content-center align-items-center min-vh-100">
<div class="mb-4 w-100 text-center mt-4">
        <a href="/event/<?php echo isset($evento_id) ? htmlspecialchars($evento_id) : ''; ?>" class="btn btn-secondary btn-lg">Voltar para o Evento</a>
    </div>
    <?php include __DIR__ . '/../includes/forms/event_form.php'; ?>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
