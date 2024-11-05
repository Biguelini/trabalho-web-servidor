<?php
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}

if (empty($_SESSION['logado']) || $_SESSION['logado'] == false) {
	header('Location: /controllers/login.controller.php');
}

require(__DIR__ . '/../models/pessoas.model.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nome'], $_GET['evento'])) {
	$nomeEvento = $_GET['evento'];

	$pessoa = [
		'nome' => $_POST['nome'],
		'idade' => $_POST['idade'],
		'telefone' => $_POST['telefone'],
		'email' => $_POST['email'],
	];

	addPessoaToEvento($nomeEvento, $pessoa);
}

$nomeEvento = $_GET['evento'] ?? '';
$pessoas = getPessoasDoEvento($nomeEvento);

require(__DIR__ . '/../views/pessoas.view.php');
