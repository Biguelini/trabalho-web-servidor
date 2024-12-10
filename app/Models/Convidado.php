<?php

namespace App\Models;

use App\Database;
use PDO;

class Convidado
{
    private $id;
    private $user_id;
    private $event_id;

    public function __construct($id, $user_id, $event_id, $nome = null, $cpf = null)
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->event_id = $event_id;
        $this->nome = $nome;
        $this->cpf = $cpf;
    }

    public function getName()
    {
        return $this->nome;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getEventoId()
    {
        return $this->event_id;
    }

    public function save()
    {
        $db = Database::getInstance()->getConnection();

        $stmt = $db->prepare("SELECT COUNT(*) FROM convidados WHERE user_id = ? AND event_id = ?");
        $stmt->execute([$this->user_id, $this->event_id]);
        $count = $stmt->fetchColumn();

        if ($count > 0) {
            $_SESSION['error'] = 'Este convidado já foi adicionado para este evento.';
            header("Location: /event/{$this->event_id}");
            exit;
        }

        $stmt = $db->prepare("INSERT INTO convidados (user_id, event_id) VALUES (?, ?)");
        $stmt->execute([$this->user_id, $this->event_id]);
    }

    public static function find($id)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("
            SELECT u.id AS user_id, u.name, u.cpf
            FROM convidados c
            JOIN users u ON c.user_id = u.id
            WHERE c.id = ?
        ");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function delete($id)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("DELETE FROM convidados WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public static function getAll()
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->query("SELECT c.*, u.name, u.cpf
                            FROM convidados c
                            JOIN users u ON c.user_id = u.id");

        $convidados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $convidadoObjects = [];

        foreach ($convidados as $convidado) {
            $convidadoObjects[] = new self(
                $convidado['id'],
                $convidado['user_id'],
                $convidado['event_id'],
                $convidado['name'],
                $convidado['cpf']
            );
        }

        return $convidadoObjects;
    }

}
