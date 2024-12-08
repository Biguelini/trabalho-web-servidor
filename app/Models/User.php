<?php

namespace App\Models;

use App\Database;
use PDO;

class User {
	private $id;
	private $username;
	private $password;
	private $name;
	private $cpf;
	private $birth;

	public function __construct($id, $username, $password, $name, $cpf, $birth) {
		$this->id = $id;
		$this->username = $username;
		$this->password = $password;
		$this->name = $name;
		$this->cpf = $cpf;
		$this->birth = $birth;
	}

	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function getUsername() {
		return $this->username;
	}

	public function setUsername($username) {
		$this->username = $username;
	}

	public function getPassword() {
		return $this->password;
	}

	public function setPassword($password) {
		$this->password = $password;
	}

	public function getName() {
		return $this->name;
	}

	public function setName($name) {
		$this->name = $name;
	}

	public function setCPF ($cpf){
		$this->cpf = $cpf;
	}

	public function getCPF() {
			return $this->cpf;
	}

	public function setBirth($birth){
		$this->brith = $birth;
	}

	public function getBirth() {
		return $this->birth;
}

	public static function validateLogin($username, $password) {
		$db = Database::getInstance()->getConnection();
		$stmt = $db->prepare('SELECT * FROM users WHERE username = :username');
		$stmt->bindParam(':username', $username);
		$stmt->execute();
		$user = $stmt->fetch(PDO::FETCH_ASSOC);

		// Verificando se o usuário existe e se a senha bate
		if ($user && $user['password'] === $password) {
			return new User($user['id'], $user['username'], $user['password'], $user['name']);
		}

		return null;
	}
}
