<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function addPessoaToEvento($nomeEvento, $pessoa) {
	if (!isset($_SESSION['eventos'])) {
		$_SESSION['eventos'] = [];
	}

	foreach ($_SESSION['eventos'] as &$evento) {
		if ($evento['nome'] === $nomeEvento) {
			$evento['pessoas'][] = [
				'nome' => $pessoa['nome'],
				'idade' => $pessoa['idade'],
				'telefone' => $pessoa['telefone'],
				'email' => $pessoa['email'],
			];
			return;
		}
	}
}

function getPessoasDoEvento($nomeEvento) {
	if (isset($_SESSION['eventos'])) {
		foreach ($_SESSION['eventos'] as $evento) {
			if ($evento['nome'] === $nomeEvento) {
				return $evento['pessoas'] ?? [];
			}
		}
	}
	return [];
}
