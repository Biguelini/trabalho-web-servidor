<?php
session_start();
require(__DIR__ . '/../models/bebidas.model.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['bebida'], $_GET['evento'])) {
    $nomeEvento = $_GET['evento'];
    $bebida = $_POST['bebida'];
    addBebidaToEvento($nomeEvento, $bebida);
}

$nomeEvento = $_GET['evento'] ?? '';
$bebidas = getBebidasDoEvento($nomeEvento);

require(__DIR__ . '/../views/bebidas.view.php');
?>
