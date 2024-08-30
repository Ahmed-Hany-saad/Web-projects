    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <main class="container m-auto" style="max-width: 720px; margin-top: 50px !important; text-align: center;">

    <?php
        if(!isset($_GET['code'])){
            echo '    <form method="POST">
            <div class="p-3 shadow mb-3">
                Email:
            </div>
            <input class="form-control" type="email" name="email" required>
    
            <button class="btn btn-warning mt-3 w-100" type="submit" name="resetPassword">Send Reset Link to Email</button>
        </form>
    ';
        } else if(isset($_GET['code']) && isset($_GET['email'])){
            echo '<form method="POST">
            <div class="p-3 shadow mb-3">Put New Password</div>
            <input class="form-control" type="password" name="password" required>
            <button class="btn btn-warning mt-3 w-100" type="submit" name="newPassword">Change Password</button></form>';
        }
    ?>
    
    <?php 
if(isset($_POST['resetPassword'])){
    require_once '../db_conn.php';

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $checkEmail = "SELECT Email, Security_Code FROM users WHERE Email = '$email'";
    $result = mysqli_query($conn, $checkEmail);

    if(mysqli_num_rows($result) > 0){
        require_once '../mail.php';
        $user = mysqli_fetch_assoc($result);
        $mail->addAddress($_POST['email']);
        $mail->Subject = "Reset Password";
        $mail->Body = '<h1>Reset Password Link</h1>' . '<a href="http://localhost/LoginMVC/Controller/reset.php?email='.$_POST['email'].'&code='.$user['Security_Code'].'">' . "http://localhost/LoginMVC/Controller/reset.php?email=" . $_POST['email'] . "&code=".$user['Security_Code']."</a>";
        $mail->setFrom('islamicenter21@gmail.com', 'Islami Center');
        $mail->send();
        echo '<div class="alert alert-success mt-3">Reset Password Link sent to Email</div>';
    }
    else {
        echo '<div class="alert alert-warning mt-3">Account creation failed</div>';
    }
    mysqli_close($conn);
}

if(isset($_POST['newPassword'])){
    require_once '../db_conn.php';
    $newPassword = mysqli_real_escape_string($conn, $_POST['password']);
    $newPassword = sha1($newPassword);
    $email = mysqli_real_escape_string($conn, $_GET['email']);
    $updatePassword = "UPDATE users SET Password = '$newPassword' WHERE Email = '$email'";

    if(mysqli_query($conn, $updatePassword)){
        echo '<div class="alert alert-success mt-3">Updated Password</div>';
        header('Refresh: 2; URL=../view/index.php');
    }else {
        echo '<div class="alert alert-danger mt-3">Failed to update Password</div>';
    }
    mysqli_close($conn);
}
?>

    </main>
    
<?php 
?>
