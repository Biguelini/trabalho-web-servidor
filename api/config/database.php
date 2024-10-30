<?php
class Database {
    private $conn;

    public function __construct() {
        $this->conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
    }

    public function getConnection() {
        return $this->conn;
    }
}
