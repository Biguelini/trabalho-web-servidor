<?php
session_start();

if (!isset($_SESSION['eventos'])) {
    $_SESSION['eventos'] = [];
}

$eventos = $_SESSION['eventos'];