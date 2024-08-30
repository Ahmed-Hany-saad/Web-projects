<?php
require_once "../model/admin.php";

class AdminController
{

    private $person;

    public function __construct()
    {
        $this->person = new AdminModel();
    }

    public function addPerson()
    {
        if (isset($_POST["submit"])) {
            $name = $_POST['name'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $role = $_POST['role'];

            $result = $this->person->addPerson($name, $password, $email, $role);

            if ($result) {

                header("Location: ../view/userList.php?msg=New record created successfully");
            } else {
                header("Location: ../view/userList.php?msg=This email has already been used by another user");
            }
        }
    }
    public function updatePerson()
    {
        $id = $_GET["id"];

        // If the form has been submitted, update the person record and redirect to index page
        if (isset($_POST["submit"])) {
            $name = $_POST['name'];
            $password = sha1($_POST['password']);
            $email = $_POST['email'];
            $activated = $_POST['activated'];

            $role = $_POST['role'];

            $result = $this->person->updatePerson($id, $name, $password, $email, $role, $activated);

            if ($result) {
                header("Location: ../view/userList.php?msg=Data updated successfully");
                exit();
            } else {
                echo "Failed: ";
            }
        }
    }
}
?>