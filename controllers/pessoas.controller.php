<?php

session_start();

$erros = [];

$nome = $_POST['nome'] ?? '';
$idade = $_POST["idade"] ?? '';
$telefone = $_POST["telefone"] ?? '';
$email = $_POST["email"] ?? '';

if (empty($_SESSION['logado']) || $_SESSION['logado'] == false) {
	header('Location: /controllers/login.controller.php');
}

if (preg_match("/\d/", $nome)) {
	$erros[] = "O nome não pode conter números.";
}

if ($email && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
	$erros[] = "O email não é válido.";
}

if ($telefone && !preg_match("/^\d{11}$/", $telefone)) {
	$erros[] = "O telefone deve conter exatamente 11 dígitos.";
}

if (isset($idade)) {
	$idade = (int)$idade;
	if ($idade < 0 || $idade > 120) {
		$erros[] = "A idade deve ser um número entre 0 e 120.";
	}
} else {
	$erros[] = "A idade é um campo obrigatório.";
}

if (!empty($erros)) {
	$_SESSION['erros'] = $erros;
}

require(__DIR__ . '/../models/pessoas.model.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($nome, $_GET['evento']) && empty($erros)) {
	$nomeEvento = $_GET['evento'];

	$pessoa = [
		'nome' => $nome,
		'idade' => $idade,
		'telefone' => $telefone,
		'email' => $email,
	];

	addPessoaToEvento($nomeEvento, $pessoa);

	header("Location: " . $_SERVER['REQUEST_URI']);
	exit();
}

$nomeEvento = $_GET['evento'] ?? '';
$pessoas = getPessoasDoEvento($nomeEvento);

require(__DIR__ . '/../views/pessoas.view.php');
