<?php

namespace App\Controllers;

use Exception;
use App\Models\User;

class UserController
{
    public function showLoginForm()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        require __DIR__ . '/../views/login_form.php';
    }

    public function showRegisterForm()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        require __DIR__ . '/../views/register.php';
    }

    public function login()
    {
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            // Valida as credenciais
            $user = User::validateLogin($username, $password);

            if ($user) {
                // Se o login for bem-sucedido, inicia a sessão
                session_start();
                $_SESSION['user'] = [
                    'id' => $user->getId(),
                    'username' => $user->getUsername(),
                    'name' => $user->getName(),
                ];

                // Redireciona para a página de eventos
                header('Location: /event');
                exit;
            } else {
                // Se as credenciais forem inválidas
                echo 'Credenciais inválidas';
            }
        }
    }
    public function register()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $username = $_POST['username'] ?? '';
                $password = $_POST['password'] ?? '';
                $name = $_POST['name'] ?? '';
                $cpf = $_POST['cpf'] ?? '';
                $birth_date = $_POST['birth_date'] ?? '';

                $user = new User(null, $username, $password, $name, $cpf, $birth_date);

                $user->save();

                header('Location: /');
                exit;
            }
        } catch (Exception $e) {
            echo 'Erro: ' . $e->getMessage();
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header("Location: /login");
        exit;
    }

    public function showUser($userId)
    {
        if (!isset($_SESSION['user'])) {
            header("Location: /login");
            exit;
        }
        $user = $this->getUserById($userId);

        if (!$user) {
            require __DIR__ . '/../views/errors/404.php';
            exit;
        }

        require __DIR__ . '/../views/perfil.php';
    }

    private function getUserById($userId)
    {
        $db = \App\Database::getInstance()->getConnection();
        $stmt = $db->prepare('SELECT * FROM users WHERE id = :id');
        $stmt->bindParam(':id', $userId, \PDO::PARAM_INT);
        $stmt->execute();
        $user = $stmt->fetch(\PDO::FETCH_ASSOC);

        if ($user) {
            return new User($user['id'], $user['username'], $user['password'], $user['name'], $user['cpf'], $user['birth_date']);
        }

        return null;
    }

    public function update()
    {

        if (!isset($_SESSION['user'])) {
            header("Location: /login");
            exit;
        }

        $username = $_POST['username'] ?? '';
        $name = $_POST['name'] ?? '';
        $cpf = $_POST['cpf'] ?? '';
        $birth = $_POST['birth'] ?? '';

        $userId = $_SESSION['user']['id'];
        $this->updateUserData($userId, $username, $name, $cpf, $birth);

        $_SESSION['user']['username'] = $username;
        $_SESSION['user']['name'] = $name;

        header("Location: /perfil/$userId");
        exit;
    }

    private function updateUserData($userId, $username, $name, $cpf, $birth)
    {
        $db = \App\Database::getInstance()->getConnection();
        $stmt = $db->prepare('UPDATE users SET username = :username, name = :name, cpf = :cpf, birth_date = :birth_date WHERE id = :id');
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':birth_date', $birth);
        $stmt->bindParam(':id', $userId, \PDO::PARAM_INT);
        $stmt->execute();
    }

}
