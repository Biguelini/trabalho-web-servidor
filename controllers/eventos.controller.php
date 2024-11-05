
<?php
session_start();

if (empty($_SESSION['logado']) || $_SESSION['logado'] == false) {
	header('Location: /controllers/login.controller.php');
}

$erros = [];

$nome = $_POST['evento'];
$local = $_POST['local'];
$obs = $_POST['obs'];
$data = $_POST['data'];


if ($evento &&  (!isset($evento) || strlen(trim($evento)) <= 3)) {
	$erros[] = "Nome do evento é um campo obrigatório e deve ter mais de 3 caracteres.";
}

if ($local && (!isset($local) || strlen(trim($local)) <= 3)) {
	$erros[] = "Local é um campo obrigatório e deve ter mais de 3 caracteres.";
}

if ($data) {
	if (!isset($data)) {
		$erros[] = "Data é um campo obrigatório.";
	} else {
		$dataEvento = DateTime::createFromFormat('Y-m-d', $data);
		$dataHoje = new DateTime();

		if (!$dataEvento || $dataEvento <= $dataHoje) {
			$erros[] = "A data deve ser maior que hoje.";
		}
	}
}

if (!empty($erros)) {
	$_SESSION['erros'] = $erros;
}


require(__DIR__ . '/../models/eventos.model.php');
require(__DIR__ . '/../views/eventos.view.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['evento'], $_POST['local'], $_POST['obs'], $_POST['data']) && empty($erros)) {
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
