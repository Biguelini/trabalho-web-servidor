<?php

namespace App\Models;

class User {
	private $id;
	private $username;
	private $password;
	private $name;

	public function __construct($id, $username, $password, $name) {
		$this->id = $id;
		$this->username = $username;
		$this->password = $password;
		$this->name = $name;
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

	public static function validateLogin($username, $password) {
		$users = [
			new User(1, 'admin', '123456', 'Administrador')
		];

		foreach ($users as $user) {
			if ($user->getUsername() === $username && $user->getPassword() === $password) {
				return $user;
			}
		}
		return null;
	}
}
