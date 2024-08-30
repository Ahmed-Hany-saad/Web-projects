<?php
include_once '../view/header.php';

if(isset($_GET['code'])){
    require_once 'personController.php';
    $controller = new personController();
    $controller->activate();
}

include_once '../view/footer.php';
?>
<script src="../js/jquery-3.6.3.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
<script src="../js/main.js"></script>
