<?php
session_start();
require(__DIR__ . '/../models/pessoas.model.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pessoa'], $_GET['evento'])) {
    $nomeEvento = $_GET['evento'];
    $pessoa = $_POST['pessoa'];
    addPessoaToEvento($nomeEvento, $pessoa);
}

$nomeEvento = $_GET['evento'] ?? '';
$pessoas = getPessoasDoEvento($nomeEvento);

require(__DIR__ . '/../views/pessoas.view.php');
?>
