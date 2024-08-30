<?php include_once 'header.php'; ?>
<div style="margin: 115px;">
<form method="POST">
    <p class="font-weight-bold">Email:</p> <input class="form-control" type="email" name="email" placeholder="Email Address" required>
    <p class="font-weight-bold">Password:</p> <input class="form-control" type="password" name="password" placeholder="Password" required>
    <a href="../controller/reset.php">Forgot Password?</a>
    <br>
    <button class="btn btn-warning mt-3" type="submit" name="login">Login</button>
    <a class="btn btn-dark mt-3" href="signup.php">Register</a>
</form>
</div>
<?php
    if(isset($_POST['login'])){
        require_once "../Controller/personController.php";
        $controller = new personController();
        $controller->login();
    }
?>

<?php include_once 'footer.php'; ?>
<script src="../js/jquery-3.6.3.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
<script src="../js/main.js"></script>
