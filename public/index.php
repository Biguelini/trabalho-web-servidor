<?php
require_once '../vendor/autoload.php';

use App\Controllers\BebidaController;
use App\Controllers\ConvidadoController;
use App\Controllers\EventController;
use App\Controllers\UserController;
use Pecee\SimpleRouter\SimpleRouter as Router;

session_start();

Router::get('/cadastro', [UserController::class, 'showRegisterForm']);
Router::post('/cadastro', [UserController::class, 'register']);

Router::get('/login', [UserController::class, 'showLoginForm']);
Router::get('/logout', [UserController::class, 'logout']);
Router::get('/perfil/{user_id}', [UserController::class, 'showUser']);
Router::post('/login', [UserController::class, 'login']);
Router::post('/user/update/{id}', [UserController::class, 'update']);

Router::get('/', [EventController::class, 'index']);
Router::get('/event', [EventController::class, 'index']);
Router::get('/event/create', [EventController::class, 'showCreateForm']);
Router::get('/event/{id}', [EventController::class, 'show']);
Router::get('/event/edit/{id}', [EventController::class, 'edit']);
Router::get('/event/delete/{id}', [EventController::class, 'delete']);
Router::post('/event/create', [EventController::class, 'create']);
Router::post('/event/update/{id}', [EventController::class, 'update']);

Router::get('/event/{evento_id}/bebidas', [BebidaController::class, 'index']);
Router::get('/event/{evento_id}/bebida/create', [BebidaController::class, 'create']);
Router::get('/event/{evento_id}/bebida/edit/{id}', [BebidaController::class, 'edit']);
Router::get('/event/{evento_id}/bebida/delete/{id}', [BebidaController::class, 'delete']);
Router::post('/event/{evento_id}/bebida/create', [BebidaController::class, 'create']);
Router::post('/event/{evento_id}/bebida/edit/{id}', [BebidaController::class, 'edit']);

Router::get('/event/{evento_id}/convidados', [ConvidadoController::class, 'index']);
Router::get('/event/{evento_id}/convidado/create', [ConvidadoController::class, 'create']);
Router::get('/event/{evento_id}/convidado/delete/{id}', [ConvidadoController::class, 'delete']);
Router::post('/event/{evento_id}/convidado/create', [ConvidadoController::class, 'create']);

Router::error(function () {
    http_response_code(404);
    echo "Página não encontrada.";
});

Router::start();
