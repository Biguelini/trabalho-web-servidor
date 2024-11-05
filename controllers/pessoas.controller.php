<?php
session_start();
require(__DIR__ . '/../models/pessoas.model.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nome'], $_GET['evento'])) {
    $nomeEvento = $_GET['evento'];
    
    // Captura os dados da pessoa como um array associativo
    $pessoa = [
        'nome' => $_POST['nome'],
        'idade' => $_POST['idade'],
        'telefone' => $_POST['telefone'],
        'email' => $_POST['email'],
    ];
    
    addPessoaToEvento($nomeEvento, $pessoa); // Adiciona a pessoa ao evento
}

$nomeEvento = $_GET['evento'] ?? '';
$pessoas = getPessoasDoEvento($nomeEvento); // Obtém as pessoas do evento

require(__DIR__ . '/../views/pessoas.view.php'); // Inclui a view
?>
