<?php

namespace App\Controllers;

use App\Models\Convidado;

class ConvidadoController
{

    public function create($evento_id)
    {
        // Ativar exibição de erros para facilitar depuração
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user_id = $_POST['user_id'] ?? '';
            $event_id = $evento_id;

            // Verificar se os campos estão preenchidos
            if (!empty($user_id) && !empty($event_id)) {
                $convidado = new Convidado(null, $user_id, $event_id);
                $convidado->save();

                // Verificar se ocorreu erro
                if (isset($_SESSION['error'])) {
                    header('Location: /event/' . $event_id);
                    exit;
                } else {
                    // Caso o convite tenha sido adicionado com sucesso, redireciona
                    header('Location: /event/' . $event_id);
                    exit;
                }
            } else {
                $_SESSION['error'] = 'Por favor, selecione um convidado e um evento.';
            }
        }
    }

    public function edit($id)
    {
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

        require __DIR__ . '/../views/edit_convidado.php';
    }

    public function delete($event_id, $id)
    {
        session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: /login");
            exit;
        }
        echo $id;
        $convidado = Convidado::find($id);

        if ($convidado instanceof Convidado) {
            $evento_id = $convidado->getEventoId();
        } else {
            echo "Convidado não encontrado.";
        }

        Convidado::delete($id);

        header('Location: /event/' . $event_id);
        exit;
    }
}
