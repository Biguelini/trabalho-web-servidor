<?php
require_once 'controllers/LoginController.php';
require_once 'controllers/CadastroController.php';

header("Content-Type: application/json; charset=UTF-8");

$loginController = new LoginController();
$cadastroController = new CadastroController();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && strpos($_SERVER['REQUEST_URI'], '/login') !== false) {
	$loginController->login();
} else if ($_SERVER['REQUEST_METHOD'] === 'POST' && strpos($_SERVER['REQUEST_URI'], '/register') !== false) {
	$cadastroController->cadastro();
}
