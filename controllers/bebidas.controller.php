<?php
session_start();

if (empty($_SESSION['logado']) || $_SESSION['logado'] == false) {
	header('Location: /controllers/login.controller.php');
}

require(__DIR__ . '/../models/bebidas.model.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nome'], $_POST['marca'], $_POST['quantidade'], $_POST['temperatura'], $_GET['evento'])) {
	$nomeEvento = $_GET['evento'];
	$bebida = [
		'nome' => $_POST['nome'],
		'marca' => $_POST['marca'],
		'quantidade' => $_POST['quantidade'],
		'temperatura' => $_POST['temperatura'],
	];
	addBebidaToEvento($nomeEvento, $bebida);
}

$nomeEvento = $_GET['evento'] ?? '';
$bebidas = getBebidasDoEvento($nomeEvento);

require(__DIR__ . '/../views/bebidas.view.php');
