<?php

namespace App\Controllers;

use App\Models\Convidado;

class ConvidadoController
{
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

			$user_id = $_POST['user_id'];

			$convidado = new Convidado($user_id, $evento_id);

			$convidado->save();

			header('Location: /event/' . $evento_id);
			exit;
		}

		require(__DIR__ . '/../views/add_convidado.php');
	}

	public function edit($id) {
		session_start();
		if (!isset($_SESSION['user'])) {
			header("Location: /login");
			exit;
		}

		$convidado = Convidado::find($id);

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$nome = $_POST['nome'] ?? '';
			$cpf = $_POST['cpf'] ?? '';

			$convidado->setNome($nome);
			$convidado->setCPF($cpf);
			
			$convidado->save();

			header('Location: /event/' . $convidado->getEventoId());
			exit;
		}

		require(__DIR__ . '/../views/edit_convidado.php');
	}

	public function delete($evento_id, $id) {
		session_start();
		if (!isset($_SESSION['user'])) {
			header("Location: /login");
			exit;
		}
		echo $id;
		$convidado = Convidado::find($id);
		$evento_id = $convidado->getEventoId();

		Convidado::delete($id);

		header('Location: /event/' . $evento_id);
		exit;
	}
}
