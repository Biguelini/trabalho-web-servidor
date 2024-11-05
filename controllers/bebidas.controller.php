<?php
session_start();

if (empty($_SESSION['logado']) || $_SESSION['logado'] == false) {
	header('Location: /controllers/login.controller.php');
}


$erros = [];

$nome = $_POST['nome'] ?? '';
$marca = $_POST["marca"] ?? '';
$quantidade = $_POST["quantidade"] ?? '';
$temperatura = $_POST["temperatura"] ?? '';

if (empty($_SESSION['logado']) || $_SESSION['logado'] == false) {
	header('Location: /controllers/login.controller.php');
}

if ($nome && !isset($nome)) {
	$erros[] = "O nome é obrigatório.";
}

if ($marca && !isset($marca)) {
	$erros[] = "A marca é obrigatória.";
}

if (isset($quantidade)) {
	$quantidade = (int)$quantidade;
	if ($quantidade < 0) {
		$erros[] = "A quantidade deve ser um número maior que 0.";
	}
} else {
	$erros[] = "A quantidade é um campo obrigatório.";
}

if (!isset($temperatura)) {
	$erros[] = "A temperatura é um campo obrigatório.";
} 

if (!empty($erros)) {
	$_SESSION['erros'] = $erros;
}

require(__DIR__ . '/../models/bebidas.model.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nome'], $_POST['marca'], $_POST['quantidade'], $_POST['temperatura'], $_GET['evento']) && empty($erros)) {
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
