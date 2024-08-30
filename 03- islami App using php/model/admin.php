<?php


class AdminModel
{
    private $conn;

    public function __construct()
    {
        require_once "../db_conn.php";
        $this->conn = $conn;
    }

    public function addPerson($name, $password, $email, $role)
    {
        $checkEmail = $this->conn->prepare("SELECT * FROM users WHERE Email = ?");
        $checkEmail->bind_param("s", $email);
        $checkEmail->execute();
        $result = $checkEmail->get_result();
        if($result->num_rows > 0){
            return false;
        }
        else{
        $password = sha1($password);
        $sql = "INSERT INTO `users`(`name`, `password`, `email`, `role`, `activated`) VALUES ('$name','$password','$email','$role', 1)";
        $result = mysqli_query($this->conn, $sql);
        return $result;
        }
    }
    public function getconn()
    {
        return $this->conn;
    }
    public function getPersonById($id)
    {
        $sql = "SELECT * FROM `users` WHERE id = $id LIMIT 1";
        $result = mysqli_query($this->conn, $sql);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

    public function updatePerson($id, $name, $password, $email, $role, $activated)
    {
        $sql = "UPDATE `users` SET `name`='$name',`password`='$password',`email`='$email',`role`='$role', `activated`=$activated WHERE id = $id";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }
    public function getAllPersons()
    {
        $sql = "SELECT * FROM `users`";
        $result = $this->conn->query($sql);

        $Persons = array();
        while ($row = $result->fetch_assoc()) {
            $Persons[] = $row;
        }

        return $Persons;
    }
}
