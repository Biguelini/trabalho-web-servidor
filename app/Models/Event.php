<?php

namespace App\Models;

use App\Database;
use PDO;

class Event {
	private $id;
	private $nome;
	private $local;
	private $data;
	private $id_user_criador;

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

	public function getLocal() {
		return $this->local;
	}

	public function setLocal($local) {
		$this->local = $local;
	}

	public function getData() {
		return $this->data;
	}

	public function setData($data) {
		$this->data = $data;
	}

	public function getIdUserCriador() {
		return $this->id_user_criador;
	}

	public function setIdUserCriador($id_user_criador) {
		$this->id_user_criador = $id_user_criador;
	}

	public function save() {
        $db = Database::getInstance()->getConnection();

        if ($this->id) {
            $stmt = $db->prepare("UPDATE events SET nome = ?, local = ?, data = ?, id_user_criador = ? WHERE id = ?");
            $stmt->execute([$this->nome, $this->local, $this->data, $this->id_user_criador, $this->id]);
        } else {
            $stmt = $db->prepare("INSERT INTO events (nome, local, data, id_user_criador) VALUES (?, ?, ?, ?)");
            $stmt->execute([$this->nome, $this->local, $this->data, $this->id_user_criador]);
            $this->id = $db->lastInsertId();
        }
    }

    public static function getAll() {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->query("SELECT * FROM events");
        return $stmt->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    public static function find($id) {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT * FROM events WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetchObject(self::class);
    }

    public static function delete($id) {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("DELETE FROM events WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
