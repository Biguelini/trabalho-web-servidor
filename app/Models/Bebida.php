<?php

namespace App\Models;

use App\Database;
use PDO;

class Bebida {
	private $id;
	private $nome;
	private $quantidade_por_pessoa;
	private $temperatura_consumo;
	private $evento_id;

	// Getters e setters para os campos
	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function getNome() {
		return $this->nome;
	}

	public function setNome($nome) {
		$this->nome = $nome;
	}

	public function getQuantidadePorPessoa() {
		return $this->quantidade_por_pessoa;
	}

	public function setQuantidadePorPessoa($quantidade) {
		$this->quantidade_por_pessoa = $quantidade;
	}

	public function getTemperaturaConsumo() {
		return $this->temperatura_consumo;
	}

	public function setTemperaturaConsumo($temperatura) {
		$this->temperatura_consumo = $temperatura;
	}

	public function getEventoId() {
		return $this->evento_id;
	}

	public function setEventoId($evento_id) {
		$this->evento_id = $evento_id;
	}

	// Função para salvar a bebida no banco de dados
	public function save() {
		$db = Database::getInstance()->getConnection();

		if ($this->id) {
			$stmt = $db->prepare("UPDATE bebidas SET nome = ?, quantidade_por_pessoa = ?, temperatura_consumo = ?, evento_id = ? WHERE id = ?");
			$stmt->execute([$this->nome, $this->quantidade_por_pessoa, $this->temperatura_consumo, $this->evento_id, $this->id]);
		} else {
			$stmt = $db->prepare("INSERT INTO bebidas (nome, quantidade_por_pessoa, temperatura_consumo, evento_id) VALUES (?, ?, ?, ?)");
			$stmt->execute([$this->nome, $this->quantidade_por_pessoa, $this->temperatura_consumo, $this->evento_id]);
			$this->id = $db->lastInsertId();
		}
	}

	// Função para obter todas as bebidas de um evento
	public static function getByEventoId($evento_id) {
		$db = Database::getInstance()->getConnection();
		$stmt = $db->prepare("SELECT * FROM bebidas WHERE evento_id = ?");
		$stmt->execute([$evento_id]);
		return $stmt->fetchAll(PDO::FETCH_CLASS, self::class);
	}

	// Função para encontrar uma bebida por ID
	public static function find($id) {
		$db = Database::getInstance()->getConnection();
		$stmt = $db->prepare("SELECT * FROM bebidas WHERE id = ?");
		$stmt->execute([$id]);
		return $stmt->fetchObject(self::class);
	}

	// Função para deletar uma bebida
	public static function delete($id) {
		$db = Database::getInstance()->getConnection();
		$stmt = $db->prepare("DELETE FROM bebidas WHERE id = ?");
		return $stmt->execute([$id]);
	}
}
