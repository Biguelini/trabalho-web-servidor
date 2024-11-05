<?php
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}

function addBebidaToEvento($nomeEvento, $bebida) {
	if (!isset($_SESSION['eventos'])) {
		$_SESSION['eventos'] = [];
	}

	foreach ($_SESSION['eventos'] as &$evento) {
		if ($evento['nome'] === $nomeEvento) {
			$evento['bebidas'][] = $bebida;
			return;
		}
	}
}

function getBebidasDoEvento($nomeEvento) {
	if (isset($_SESSION['eventos'])) {
		foreach ($_SESSION['eventos'] as $evento) {
			if ($evento['nome'] === $nomeEvento) {
				return $evento['bebidas'];
			}
		}
	}
	return [];
}
