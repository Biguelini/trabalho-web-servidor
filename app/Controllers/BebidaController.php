<?php

namespace App\Controllers;

use App\Models\Bebida;

class BebidaController {

	public function create($evento_id) {
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);

		if (!isset($_SESSION['user'])) {
			header("Location: /login");
			exit;
		}

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			ini_set('display_errors', 1);
			ini_set('display_startup_errors', 1);
			error_reporting(E_ALL);

			$nome = $_POST['nome'] ?? '';
			$quantidade = $_POST['quantidade_por_pessoa'] ?? '';
			$temperatura = $_POST['temperatura_consumo'] ?? '';

			$bebida = new Bebida();
			$bebida->setNome($nome);
			$bebida->setQuantidadePorPessoa($quantidade);
			$bebida->setTemperaturaConsumo($temperatura);
			$bebida->setEventoId($evento_id);

			$bebida->save();

			header('Location: /event/' . $evento_id);
			exit;
		}

		require(__DIR__ . '/../views/create_bebida.php');
	}

	public function edit($id) {
		session_start();
		if (!isset($_SESSION['user'])) {
			header("Location: /login");
			exit;
		}

		$bebida = Bebida::find($id);

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$nome = $_POST['nome'] ?? '';
			$quantidade = $_POST['quantidade_por_pessoa'] ?? '';
			$temperatura = $_POST['temperatura_consumo'] ?? '';

			$bebida->setNome($nome);
			$bebida->setQuantidadePorPessoa($quantidade);
			$bebida->setTemperaturaConsumo($temperatura);
			$bebida->save();

			header('Location: /event/' . $bebida->getEventoId());
			exit;
		}

		require(__DIR__ . '/../views/edit_bebida.php');
	}

	public function delete($id) {
		session_start();
		if (!isset($_SESSION['user'])) {
			header("Location: /login");
			exit;
		}

		$bebida = Bebida::find($id);
		$evento_id = $bebida->getEventoId();

		Bebida::delete($id);

		header('Location: /event/' . $evento_id);
		exit;
	}
}
