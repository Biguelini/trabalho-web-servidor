<?php
session_start();

function addPessoaToEvento($nomeEvento, $pessoa) {
    if (!isset($_SESSION['eventos'])) {
        $_SESSION['eventos'] = [];
    }

    foreach ($_SESSION['eventos'] as &$evento) {
        if ($evento['nome'] === $nomeEvento) {
            $evento['pessoas'][] = $pessoa;
            return;
        }
    }
}

function getPessoasDoEvento($nomeEvento) {
    if (isset($_SESSION['eventos'])) {
        foreach ($_SESSION['eventos'] as $evento) {
            if ($evento['nome'] === $nomeEvento) {
                return $evento['pessoas'];
            }
        }
    }
    return [];
}