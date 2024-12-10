<?php
$pageTitle = 'Adicionar Bebida'; // Define o título da página
include __DIR__ . '/../includes/header.php'; // Caminho correto para o header
?>

<div class="container-fluid d-flex flex-column justify-content-center align-items-center min-vh-100">
    <div class="mb-4 w-100 text-center">
        <a href="/event/<?php echo isset($eventId) ? htmlspecialchars($eventId) : ''; ?>" class="btn btn-secondary btn-lg">Voltar para o Evento</a>
    </div>

    <?php include __DIR__ . '/../includes/forms/bebida_form.php'; ?> <!-- Caminho correto para o formulário -->
</div>

<?php include __DIR__ . '/../includes/footer.php'; // Caminho correto para o footer ?>
