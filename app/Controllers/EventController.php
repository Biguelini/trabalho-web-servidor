<?php

namespace App\Controllers;

use App\Models\Bebida;
use App\Models\Event;

class EventController
{

    public function showCreateForm()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user'])) {
            header("Location: /login");
            exit;
        }

        require __DIR__ . '/../views/create_event.php';
    }

    public function create()
    {
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        if (!isset($_SESSION['user'])) {
            header("Location: /login");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'] ?? '';
            $local = $_POST['local'] ?? '';
            $data = $_POST['data'] ?? '';
            $id_user_criador = $_SESSION['user']['id'];

            $event = new Event();
            $event->setNome($nome);
            $event->setLocal($local);
            $event->setData($data);
            $event->setIdUserCriador($id_user_criador);

            $event->save();

            header('Location: /event');
            exit;
        }
    }

    public function index()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user'])) {
            header("Location: /login");
            exit;
        }

        $user = $_SESSION['user'];

        $events = Event::getAll();

        require __DIR__ . '/../views/event_list.php';
    }

    public function show($id)
    {
        if (!isset($_SESSION['user'])) {
            header("Location: /login");
            exit;
        }

        $event = Event::find($id);

        $bebidas = Bebida::getByEventoId($id);

        require __DIR__ . '/../views/event_details.php';
    }

    public function delete($id)
    {
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        if (!isset($_SESSION['user'])) {
            header("Location: /login");
            exit;
        }

        Event::delete($id);

        header('Location: /event');
        exit;
    }

    public function edit($id)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user'])) {
            header("Location: /login");
            exit;
        }

        $event = Event::find($id);

        require __DIR__ . '/../views/edit_event.php';
    }

    public function update($id)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
				
        if (!isset($_SESSION['user'])) {
            header("Location: /login");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'] ?? '';
            $local = $_POST['local'] ?? '';
            $data = $_POST['data'] ?? '';

            $event = Event::find($id);
            $event->setNome($nome);
            $event->setLocal($local);
            $event->setData($data);
            $event->save();

            header('Location: /event/' . $id);
            exit;
        }
    }
}
