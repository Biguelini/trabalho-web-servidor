<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['eventos'])) {
    $_SESSION['eventos'] = [];
}

$eventos = $_SESSION['eventos'];
