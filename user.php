<?php
class User {
    public $id;

    public $full_name;

    public $email;

    public $password;

    public $username;

    public function __construct($id, $full_name, $email, $password, $username) {
        $this->id = $id;
        $this->full_name = $full_name;
        $this->email = $email;
        $this->password = $password;
        $this->username = $username;
    }
}