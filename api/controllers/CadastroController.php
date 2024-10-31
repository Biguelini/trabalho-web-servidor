<?php
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../views/response_view.php.php';

class CadastroController {
	public function cadastro() {
		$data = json_decode(file_get_contents("php://input"));

		if (!$data) {
			http_response_code(400);
			echo renderResponse(["message" => "Falha ao decodificar JSON."]);
			return;
		}

		if (isset($data->username) && isset($data->password)) {
			$errors = [];

			try {
				if (!$data->username) {
					$errors[] = "Username é obrigatório";
				}
				if (!$data->password) {
					$errors[] = "Senha é obrigatório";
				}
				if (!$data->name) {
					$errors[] = "Nome é obrigatório";
				}
				if (!$data->email) {
					$errors[] = "Email é obrigatório";
				}
				if (!$data->cpf) {
					$errors[] = "CPF é obrigatório";
				}
				if (!$data->phone) {
					$errors[] = "Telefone é obrigatório";
				}

				if ($errors) {
					http_response_code(422);
					echo renderResponse(["message" => $errors]);
					return;
				}

				$user = new User($data->username, $data->password, $data->name, $data->email, $data->cpf, $data->phone);

				echo renderResponse([
					"message" => "Cadastro bem-sucedido!",
					"user" => [
						"name" => $user->name,
						"email" => $user->email,
						"cpf" => $user->cpf,
						"phone" => $user->phone
					]
				]);
				return;
			} catch (Exception $e) {
				http_response_code(500);
				echo renderResponse(["message" => $e->getMessage()]);
				return;
			}
		} else {
			http_response_code(400);
			echo renderResponse(["message" => "Dados de cadastro não fornecidos."]);
		}
	}
}
