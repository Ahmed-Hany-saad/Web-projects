<?php

require_once 'person.php';

class User
{
    private $person;

    private $db;


    public function __construct($db)
    {
        $this->person = new Person($db);
        require_once '../db_conn.php';
        $this->db = $conn;
    }

    public function login($email, $password)
    {
        return $this->person->login($email, $password);
    }

    public function signup($name, $email, $password, $securityCode)
    {
        return $this->person->signup($name, $email, $password, $securityCode);
    }

    public function checkActivationCode($code)
    {
        return $this->person->checkActivationCode($code);
    }

    public function activateAccount($code)
    {
        return $this->person->activateAccount($code);
    }

    public function checkEmail($email)
    {
        return $this->person->checkEmail($email);
    }

    public function updatePassword($email, $newPassword)
    {
        return $this->person->updatePassword($email, $newPassword);
    }
}
