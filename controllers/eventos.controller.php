
<?php
require(__DIR__ . '/../models/eventos.model.php');
require(__DIR__ . '/../views/eventos.view.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['evento'], $_POST['data'])) {
    $novoEvento = [
        'nome' => $_POST['evento'],
        'data' => $_POST['data'],
        'pessoas' => []
    ];

    $_SESSION['eventos'][] = $novoEvento;

    header('Location: /controllers/eventos.controller.php');
    exit;
}
