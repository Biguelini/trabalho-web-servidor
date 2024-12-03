<?php
require_once '../vendor/autoload.php';

use Pecee\SimpleRouter\SimpleRouter as Router;
use App\Controllers\UserController;
use App\Controllers\EventController;

session_start();

Router::get('/login', [UserController::class, 'showLoginForm']);
Router::post('/login', [UserController::class, 'login']);
Router::get('/logout', [UserController::class, 'logout']);

Router::get('/', [EventController::class, 'index']);
Router::get('/event', [EventController::class, 'index']);
Router::get('/event/create', [EventController::class, 'showCreateForm']);
Router::post('/event/create', [EventController::class, 'create']);
Router::get('/event/{id}', [EventController::class, 'show']);
Router::get('/event/edit/{id}', [EventController::class, 'edit']);
Router::post('/event/update/{id}', [EventController::class, 'update']);
Router::get('/event/delete/{id}', [EventController::class, 'delete']);

Router::error(function() {
    http_response_code(404);
    echo "Página não encontrada.";
});

Router::start();
