<?php
class Person {
    private $db;

    public function __construct() {
        require_once '../db_conn.php';
        $this->db = $conn;
    }

    public function login($email, $password) {
        $login = $this->db->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
        $password = sha1($password);
        $login->bind_param("ss", $email, $password);
        $login->execute();
        $result = $login->get_result();
        if ($result->num_rows == 1) {
            $person = $result->fetch_object();
            if ($person->activated == 1) {
                return $person;
            } else {
                echo '<div class="alert alert-danger">Please activate your account before logging in.</div>';
            }
        } else {
            echo '<div class="alert alert-danger">Error information entered</div>';
            return false;
        }
    }
    
    
    public function signup($name, $email, $password, $securityCode) {
        $checkEmail = $this->db->prepare("SELECT * FROM users WHERE Email = ?");
        $checkEmail->bind_param("s", $email);
        $checkEmail->execute();
        $result = $checkEmail->get_result();
        if($result->num_rows > 0){
            echo '<div class="alert alert-danger" role="alert">
            This email has already been used by another user
            </div>';
        }
        else{
            $addUser = $this->db->prepare("INSERT INTO users (Name, Email, Password, Security_Code) VALUES (?, ?, ?, ?)");
            $addUser->bind_param("ssss", $name, $email, $password, $securityCode);
            if($addUser->execute()){
               return true;
            }
            else {
                return false;
            }
        }
    }
    function checkActivationCode($code) {
        $checkCode = $this->db->prepare("SELECT Security_Code FROM users WHERE Security_Code = ?");
        $checkCode->bind_param("s", $code);
        $checkCode->execute();
        $result = $checkCode->get_result();
        return $result->num_rows > 0;
    }

    function activateAccount($code) {
        $SecurityCode = md5(date("h:i:s"));
        $update = $this->db->prepare("UPDATE users SET Security_Code = ?, activated=1 WHERE Security_Code = ?");
        $update->bind_param("ss", $SecurityCode, $code);
        return $update->execute();
    }
    function checkEmail($email) {
        $checkEmail = $this->db->prepare("SELECT Email, Security_Code  FROM users WHERE Email = ?");
        $checkEmail->bind_param('s', $email);
        $checkEmail->execute();
        return $checkEmail->get_result();
    }
    
    function updatePassword($email, $newPassword) {
        $updatePassword = $this->db->prepare("UPDATE users SET Password = ? WHERE Email = ?");
        $updatePassword->bind_param('ss', sha1($newPassword), $email);
        return $updatePassword->execute();
    }
    }
?>