<?php
class User {
    public $username;
    public $password;
    public $name;
    public $email;
    public $cpf;
    public $phone;
    public $id;

    public function __construct($username, $password, $name, $email, $cpf, $phone) {
        $this->username = $username;
        $this->password = $password;
        $this->name = $name;
        $this->email = $email;
        $this->cpf = $cpf;
        $this->phone = $phone;
    }
}
