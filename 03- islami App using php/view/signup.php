<?php include_once 'header.php'; ?>
<div class="container" style="margin-top: 115px; margin-bottom: 100px;">
<form method="POST">
    Name: <input class="form-control" type="text" name="name" required>
    <br>
    Email: <input class="form-control" type="email" name="email" required>
    <br>
    Password: <input class="form-control" type="password" name="password" required>
    <br>
    <button class="btn btn-dark" type="submit" name="register">Register</button>
    <a class="btn btn-warning" href="login.php">Login</a>
</form>
</div>
<?php 
    if(isset($_POST['register'])){
        require_once "../Controller/personController.php";
        $controller = new personController();
        $controller->signup();
    }
?>
<?php include_once 'footer.php'; ?>
<script src="../js/jquery-3.6.3.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
<script src="../js/main.js"></script>
