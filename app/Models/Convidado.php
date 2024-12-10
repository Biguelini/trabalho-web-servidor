<?php

namespace App\Models;

use App\Database;
use PDO;

class Convidado
{
    private $id;
    private $user_id;
    private $evento_id;

    public function __construct($id, $user_id, $evento_id)
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->evento_id = $evento_id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getEventoId()
    {
        return $this->evento_id;
    }

    public function setCPF($cpf)
    {
        $this->cpf = $cpf;
    }
    
    public function getCPF()
    {
        return $this->cpf;
    }

    public function save() {
        $db = Database::getInstance()->getConnection();
    
        if ($this->id) {
            $stmt = $db->prepare("UPDATE convidados SET user_id = ?, event_id = ? WHERE id = ?");
            $stmt->execute([$this->user_id, $this->evento_id, $this->id]);
        } else {
            $stmt = $db->prepare("INSERT INTO convidados (user_id, event_id) VALUES (?, ?)");
            $stmt->execute([$this->user_id, $this->evento_id]);
            $this->id = $db->lastInsertId();
        }
    }
    
    // Função para obter todos os convidados de um evento (com dados do usuário)
    public static function getByEventoId($evento_id) {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("
            SELECT u.id AS user_id, u.name, u.cpf 
            FROM convidados c
            JOIN users u ON c.user_id = u.id
            WHERE c.event_id = ?
        ");
        $stmt->execute([$evento_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retorna como um array associativo
    }
    
    // Função para encontrar um convidado específico por ID (incluindo dados do usuário)
    public static function find($id) {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("
            SELECT u.id AS user_id, u.name, u.cpf 
            FROM convidados c
            JOIN users u ON c.user_id = u.id
            WHERE c.id = ?
        ");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC); // Retorna um único registro como array associativo
    }
    
    // Função para deletar um convidado
    public static function delete($id) {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("DELETE FROM convidados WHERE id = ?");
        return $stmt->execute([$id]);
    }
    
}
