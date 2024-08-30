<?php include_once "header.php" ?>
<?php include_once "../db_conn.php" ?>
<?php if (!isset($_SESSION['person'])) {
  header('Location: login.php');
} ?>

<?php

require_once '../controller/AzkarController.php';
require_once '../model/AzkarModel.php';
require_once '../view/AzkarView.php';

// Replace these variables with your database credentials
$host = 'localhost';
$dbname = 'islami';
$username = 'root';
$password = '';

// Create a PDO object to connect to the database
$dbh = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

// Instantiate the AzkarModel, AzkarView, and AzkarController classes
$model = new AzkarModel($dbh);
$view = new AzkarView();
$controller = new AzkarController($model, $view);

// Handle the user input and generate the HTML output
echo $controller->handleRequest($_GET);

?>

<?php include_once "footer.php" ?>

<script src="../js/jquery-3.6.3.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
<script src="../js/main.js"></script>