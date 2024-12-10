<?php

namespace App\Controllers;

use App\Models\Bebida;

class BebidaController {

	public function create($evento_id) {
		if (!isset($_SESSION['user'])) {
			header("Location: /login");
			exit;
		}

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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

	public function edit($eventId, $id) {
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

			header('Location: /event/' . $eventId);
			exit;
		}

		require(__DIR__ . '/../views/edit_bebida.php');
	}

	public function delete($evento_id, $id) {
		session_start();
		if (!isset($_SESSION['user'])) {
			header("Location: /login");
			exit;
		}
		echo $id;
		$bebida = Bebida::find($id);
		$evento_id = $bebida->getEventoId();

		Bebida::delete($id);

		header('Location: /event/' . $evento_id);
		exit;
	}
}
