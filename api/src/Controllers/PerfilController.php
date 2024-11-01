<?php

namespace App\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PerfilController {
	public function update(Request $request, int $id): JsonResponse {
		$data = json_decode($request->getContent(), true);

		$user = new User(
			$data['username'],
			password_hash($data['password'], PASSWORD_DEFAULT),
			$data['name'],
			$data['email'],
			$data['cpf'],
			$data['phone']
		);

		$user->setId($id);

		return new JsonResponse($user, 200);
	}

	public function get(int $id): JsonResponse {
		$user = new User(
			'cliente',
			'123456',
			'Teste Cliente',
			'email@gmail.com',
			'11122233344',
			'42998349909'
		);

		$user->setId($id);

		return new JsonResponse($user, 200);
	}
}
