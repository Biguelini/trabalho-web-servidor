<?php
require_once 'controllers/LoginController.php';

header("Content-Type: application/json; charset=UTF-8");

$loginController = new LoginController();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && strpos($_SERVER['REQUEST_URI'], '/login') !== false) {
    $loginController->login();
}
