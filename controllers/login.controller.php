<?php
$usuario = $_POST['usuario'] ?? '';
$senha = $_POST['senha'] ?? '';
$erro = false;

if (session_status() === PHP_SESSION_NONE) {
	session_start();
}

if ($usuario == 'admin' && $senha == '123456') {
	$_SESSION['logado'] = true;
	$_SESSION['usuario'] = 'admin';

	header('Location: /controllers/eventos.controller.php');
} else if (!empty($_POST)) {
	$erro = true;
}

//Checar se o usuário já está logado
if (!empty($_SESSION['logado']) && $_SESSION['logado']) {
	header('Location: /controllers/eventos.controller.php');
}

require(__DIR__ . '/../views/login.view.php');