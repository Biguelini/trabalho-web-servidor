<?php

namespace App\Controllers;

use App\Models\User;

class UserController {
	public function showLoginForm() {
		require(__DIR__ . '/../views/login_form.php');
	}

	public function login() {
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$username = $_POST['username'] ?? '';
			$password = $_POST['password'] ?? '';

			// Valida as credenciais
			$user = User::validateLogin($username, $password);

			if ($user) {
				// Se o login for bem-sucedido, inicia a sessão
				session_start();
				$_SESSION['user'] = [
					'id' => $user->getId(),
					'username' => $user->getUsername(),
					'name' => $user->getName()
				];

				// Redireciona para a página de eventos
				header('Location: /event');
				exit;
			} else {
				// Se as credenciais forem inválidas
				echo 'Credenciais inválidas';
			}
		}
	}

	public function logout() {
		session_start();
		session_destroy();
		header("Location: /login");
		exit;
	}
}
