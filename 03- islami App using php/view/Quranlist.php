<?php include_once "header.php" ?>
<?php if(!isset($_SESSION['person'])){
  header('Location: login.php');
} ?>
<div class="quran" style="margin: 70px;">


<?php
require_once('../model/QuranModel.php');
require_once('../controller/QuranController.php');

$model = new QuranModel();
$controller = new QuranController($model);
$controller->invoke();
?>

</div>



<?php include_once "footer.php" ?>

<script src="../js/jquery-3.6.3.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
<script src="../js/main.js"></script>