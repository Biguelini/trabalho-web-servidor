<?php

namespace App\Controllers;

use App\Models\User;

class UserController
{
    public function showLoginForm()
    {   
        $this->ensureSessionStarted();
        require __DIR__ . '/../views/login_form.php';
    }

    public function login()
    {
        $this->enableErrorReporting();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            // Valida as credenciais
            $user = User::validateLogin($username, $password);

            if ($user) {
                // Se o login for bem-sucedido, inicia a sessão
                $this->ensureSessionStarted();
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

    public function logout()
    {
        $this->ensureSessionStarted();
        session_destroy();
        header("Location: /login");
        exit;
    }

    public function showUser($userId)
    {
        $this->ensureAuthenticated();

        $user = $this->getUserById($userId);

        if (!$user) {
            require __DIR__ . '/../views/errors/404.php';
            exit;
        }

        require __DIR__ . '/../views/perfil.php';
    }

    public function update()
    {
        $this->ensureAuthenticated();

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

    private function ensureSessionStarted()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    private function ensureAuthenticated()
    {
        $this->ensureSessionStarted();

        if (!isset($_SESSION['user'])) {
            header("Location: /login");
            exit;
        }
    }

    private function enableErrorReporting()
    {
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
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
