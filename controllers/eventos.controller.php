
<?php
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}

if (empty($_SESSION['logado']) || $_SESSION['logado'] == false) {
	header('Location: /controllers/login.controller.php');
}

require(__DIR__ . '/../models/eventos.model.php');
require(__DIR__ . '/../views/eventos.view.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['evento'], $_POST['local'], $_POST['obs'], $_POST['data'])) {
	$novoEvento = [
		'nome' => $_POST['evento'],
		'local' => $_POST['local'],
		'obs' => $_POST['obs'],
		'data' => $_POST['data'],
		'pessoas' => []
	];

	$_SESSION['eventos'][] = $novoEvento;

	header('Location: /controllers/eventos.controller.php');
	exit;
}
