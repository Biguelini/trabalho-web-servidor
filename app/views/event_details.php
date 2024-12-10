<?php
$pageTitle = 'Atualizar Evento'; 
include __DIR__ . '/../includes/header.php'; 
?>

<div class="container-fluid d-flex flex-column justify-content-center align-items-center min-vh-100">
    <div class="mb-4 w-100 text-center">
        <a href="/event" class="btn btn-secondary btn-lg">Voltar para a Página Inicial</a>
    </div>
    <?php include __DIR__ . '/../includes/forms/edit_event_form.php'; ?>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>

