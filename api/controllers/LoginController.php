<?php
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../views/login_view.php';

class LoginController {
	public function login() {
		$data = json_decode(file_get_contents("php://input"));

		if (!$data) {
			http_response_code(400);
			echo renderLoginResponse(["message" => "Falha ao decodificar JSON."]);
			return;
		}

		if (isset($data->username) && isset($data->password)) {
			$user = new User("admin", "123456", "Nome do Usuário", "usuario@example.com", "123.456.789-00", "(11) 91234-5678");

			if ($data->username === $user->username && $data->password === $user->password) {
				http_response_code(200);
				echo renderLoginResponse([
					"message" => "Login bem-sucedido!",
					"user" => [
						"name" => $user->name,
						"email" => $user->email,
						"cpf" => $user->cpf,
						"phone" => $user->phone
					]
				]);
			} else {
				http_response_code(401);
				echo renderLoginResponse(["message" => "Usuário ou senha inválidos."]);
			}
		} else {
			http_response_code(400);
			echo renderLoginResponse(["message" => "Dados de login não fornecidos."]);
		}
	}
}
