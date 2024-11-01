<?php

namespace App\Models;

class User implements \JsonSerializable {
	private int $id;
	private string $username;
	private string $password;
	private string $name;
	private string $email;
	private string $cpf;
	private string $phone;

	public function __construct(string $username, string $password, string $name, string $email, string $cpf, string $phone) {
		$this->username = $username;
		$this->password = $password;
		$this->name = $name;
		$this->email = $email;
		$this->cpf = $cpf;
		$this->phone = $phone;
	}


	public function jsonSerialize() {
		return [
			'id' => $this->id,
			'username' => $this->username,
			'name' => $this->name,
			'email' => $this->email,
			'cpf' => $this->cpf,
			'phone' => $this->phone
		];
	}

	public function getId(): int {
		return $this->id;
	}

	public function getUsername(): string {
		return $this->username;
	}

	public function getPassword(): string {
		return $this->password;
	}

	public function getName(): string {
		return $this->name;
	}

	public function getEmail(): string {
		return $this->email;
	}

	public function getCpf(): string {
		return $this->cpf;
	}

	public function getPhone(): string {
		return $this->phone;
	}

	public function setId(int $id): void {
		$this->id = $id;
	}

	public function setUsername(string $username): void {
		$this->username = $username;
	}

	public function setPassword(string $password): void {
		$this->password = $password;
	}

	public function setName(string $name): void {
		$this->name = $name;
	}

	public function setEmail(string $email): void {
		$this->email = $email;
	}

	public function setCpf(string $cpf): void {
		$this->cpf = $cpf;
	}

	public function setPhone(string $phone): void {
		$this->phone = $phone;
	}
}
