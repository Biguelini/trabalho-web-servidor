<?php

namespace App\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LoginController {
	public function login(Request $request) {
		$user = new User(
			'cliente',
			'123456',
			'Teste Cliente',
			'email@gmail.com',
			'11122233344',
			'42998349909'
		);

		$user->setId(1);

		$data = json_decode($request->getContent(), true);

		if ($data['username'] == $user->getUsername() &&  $data['password'] == $user->getPassword()) {
			return new JsonResponse($user, 200);
		}

		return new JsonResponse(["Errors" => "Login e/ou senha incorretos!"], 413);
	}
}
