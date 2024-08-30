<?php
require_once '../model/person.php';
class personController {
    public function login() {
        if(isset($_POST['email']) && isset($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
    
            $personModel = new Person();
            $person = $personModel->login($email, $password);
    
            if ($person) {
                session_start();
                $_SESSION['person'] = $person;
                if ($person->role == 'user') {
                    header("Location: ../view/index.php");
                } else if ($person->role == 'admin') {
                    header("Location: ../view/userList.php");
                }
            }
        }
    }
    
    public function signup() {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = sha1($_POST['password']);
        $securityCode = md5(date("h:i:s"));
        $personModel = new Person();
        $person = $personModel->signup($name, $email, $password, $securityCode);
        if($person) {
            echo '<div class="alert alert-success m-3" role="alert">Account has been created successfully</div>';
            require_once "../mail.php";
            $mail->addAddress($email);
            $mail->Subject = "Account verification code";
            $mail->Body = '<h1>Thanks for using our Site</h1>' . '<div>Account verification link</div>' . '<a href="http://localhost/LoginMVC/controller/active.php?code='.$securityCode.'">' . "http://localhost/LoginMVC/controller/active.php?code=" . $securityCode . "</a>";
                $mail->setFrom('islamicenter21@gmail.com', 'Islami Center');
                $mail->send();
        } 
        else {
            echo '<div class="alert alert-danger m-3" role="alert">Account creation failed</div>';
        }
    }

    function activate()
    {
        if (isset($_GET['code'])) {
            $code = $_GET['code'];
            $personModel = new Person();
            if ($personModel->checkActivationCode($code)) {
                if ($personModel->activateAccount($code)) {
                    echo '<div class="alert alert-success " style="margin-top:100px;" role="alert">
                            Account has been verified successfully
                        </div>';
                    echo '<a class="btn btn-warning" style="margin-top:20px;" href="../view/login.php">Login</a>';
                } else {
                    echo '<div class="alert alert-danger" style="margin-top:100px;" role="alert">
                            Account activation failed
                        </div>';
                }
            } else {
                echo '<div class="alert alert-danger" style="margin-top:100px;" role="alert">
                        Account activation failed
                    </div>';
            }
        }
    }
}
?>
