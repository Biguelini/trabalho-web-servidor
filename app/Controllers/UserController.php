<?php

namespace App\Controllers;

use App\Models\User;

class UserController {
	public function showLoginForm() {
		require(__DIR__ . '/../views/login_form.php');
	}

	public function login() {
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$username = $_POST['username'] ?? '';
			$password = $_POST['password'] ?? '';

			$user = User::validateLogin($username, $password);

			if ($user) {
				session_start();
				$_SESSION['user'] = [
					'id' => $user->getId(),
					'username' => $user->getUsername(),
					'name' => $user->getName()
				];

				header('Location: /event');
				exit;
			} else {
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
