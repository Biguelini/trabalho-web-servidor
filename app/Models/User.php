<?php

namespace App\Models;

use App\Database;
use Exception;
use PDO;

class User
{
    private $id;
    private $username;
    private $password;
    private $name;
    private $cpf;
    private $birth_date;

    public function __construct($id = null, $username = null, $password = null, $name = null, $cpf = null, $birth_date)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->name = $name;
        $this->cpf = $cpf;
        $this->birth_date = $birth_date;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setCPF($cpf)
    {
        $this->cpf = $cpf;
    }

    public function getCPF()
    {
        return $this->cpf;
    }

    public function setBirth($birth_date)
    {
        $this->birth_date = $birth_date;
    }

    public function getBirth()
    {
        return $this->birth_date;
    }

    public static function validateLogin($username, $password)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare('SELECT * FROM users WHERE username = :username');
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verificando se o usuário existe e se a senha bate
        if ($user && $user['password'] === $password) {
            return new User($user['id'], $user['username'], $user['password'], $user['name'], $user['cpf'], $user['birth_date']);
        }

        return null;
    }

    public static function getAll()
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->query("SELECT * FROM users");

        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $userObjects = [];

        foreach ($users as $user) {
            // Criar um objeto User para cada linha de dados
            $userObjects[] = new self(
                $user['id'],
                $user['username'],
                $user['password'],
                $user['name'],
                $user['cpf'],
                $user['birth_date']
            );
        }

        return $userObjects;
    }

    public function save()
    {
        $db = Database::getInstance()->getConnection();

        $stmt = $db->prepare("SELECT COUNT(*) FROM users WHERE username = ?");
        $stmt->execute([$this->username]);
        $count = $stmt->fetchColumn();

        if ($count > 0) {
            throw new Exception("O nome de usuário já está em uso.");
        }

        $stmt = $db->prepare("SELECT COUNT(*) FROM users WHERE cpf = ?");
        $stmt->execute([$this->cpf]);
        $cpfCount = $stmt->fetchColumn();

        if ($cpfCount > 0) {
            throw new Exception("O CPF já está em uso.");
        }

        if ($this->id) {
            $stmt = $db->prepare("UPDATE users SET username = ?, password = ?, name = ?, cpf = ?, birth_date = ? WHERE id = ?");
            $stmt->execute([$this->username, $this->password, $this->name, $this->cpf, $this->birth_date, $this->id]);
        } else {
            $stmt = $db->prepare("INSERT INTO users (username, password, name, cpf, birth_date) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$this->username, $this->password, $this->name, $this->cpf, $this->birth_date]);
            $this->id = $db->lastInsertId();
        }
    }
}
