<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/bootstrapaudio.min.css">
  <link rel="stylesheet" href="../css/all.min.css">
  <link rel="stylesheet" href="../css/mainaudio.css">
  <link rel="stylesheet" href="../css/azkar.css">
  <link rel="stylesheet" href="../css/prayer.css">

  <!-- <link rel="stylesheet" href="../css/style.css"> -->
  <title>Angora</title>
</head>

<body>
  <div class="loadingScreen justify-content-center align-items-center
      position-fixed top-0 start-0 end-0 bottom-0 ">
    <!-- <i class="fa-solid fa-spinner  fa-5x fa-spin text-warning"></i> -->
    <div class="ring ">
    </div>
  </div>
  <div>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top mth-3" id="navbar1">
      <div class="container px-5 d-flex align-content-center
          justify-content-center">
        <a class="navbar-brand px-5 " href="./index.php">
          <img class="" src="../images/icon.png " alt="" style="width: 50px; height:50px">
        </a>

        <div class="collapse navbar-collapse " id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="audio.php">Audio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Quranlist.php">Quran</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="hadith.php">Hadith</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Azkar.php">Azkar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="getQuiz.php">Quiz</a>
            </li>
            <?php
            session_start();
            if (isset($_SESSION['person'])) {
              if ($_SESSION['person']->role == 'user') {
                echo '<li class="nav-item pe-5">
      <a class="nav-link" href="profile.php">' . $_SESSION["person"]->name . '</a></li>';
                echo '<form><button type="submit" name="logout"><i style="color: black;" class="fa-solid fa-right-from-bracket"></i></button></form>';
              }
            }
            if (isset($_GET['logout'])) {
              session_unset();
              session_destroy();
              header('Location: login.php');
            }
            ?>
          </ul>

        </div>
      </div>
    </nav>
  </div>