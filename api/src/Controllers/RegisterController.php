<?php

namespace App\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RegisterController {
	public function register(Request $request): JsonResponse {
		$data = json_decode($request->getContent(), true);

		$errors = [];

		if (empty($data['username'])) {
			$errors['username'] = "O campo username é obrigatório.";
		}

		if (strlen($data['password']) < 6) {
			$errors['password'] = "A senha deve ter pelo menos 6 caracteres.";
		}

		if (empty($data['name'])) {
			$errors['name'] = "O campo name é obrigatório.";
		}

		if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
			$errors['email'] = "O campo email é inválido.";
		}

		if (strlen($data['cpf']) !== 11) {
			$errors['cpf'] = "O CPF deve ter 11 caracteres.";
		}

		if (empty($data['phone'])) {
			$errors['phone'] = "O campo phone é obrigatório.";
		}

		if (!empty($errors)) {
			return new JsonResponse(['errors' => $errors], 400);
		}

		$user = new User(
			$data['username'],
			password_hash($data['password'], PASSWORD_DEFAULT),
			$data['name'],
			$data['email'],
			$data['cpf'],
			$data['phone']
		);

		$user->setId(1);

		return new JsonResponse($user, 200);
	}
}
