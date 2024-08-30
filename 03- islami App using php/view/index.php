<?php
include_once "header.php" ?>

<?php

if (!isset($_SESSION['person'])) {
  header('Location: login.php');
}
?>
<header class="vh-100  position-relative">




  <div class=" slider w-100  h-100 overflow-hidden position-relative">
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="slideone ">

            <img src="../images/pexels-manprit-kalsi-1537086.jpg" class="w-100" alt="..." style="  background-size: 100% 100%; ">
            <div class="carousel-caption d-none d-md-block">
            </div>

          </div>
        </div>
        <div class="carousel-item">
          <div class="slideone ">

            <img src="../images/mosque-3858508_1920.jpg" class="w-100" alt="..." style="  background-size: 100% 100%; ">
            <div class="carousel-caption d-none d-md-block">
            </div>

          </div>
        </div>
        <div class="carousel-item">
          <div class="slideone ">
            <img src="../images/moscow-cathedral-mosque-1483524_1920.jpg" class="w-100" alt="..." style="  background-size: 100% 100%; ">
            <div class="carousel-caption d-none d-md-block">

              </h1>
            </div>

          </div>
        </div>
      </div>
      <button class="carousel-control-prev overflow-hidden  border" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
        <div class="content-button position-relative  ">

          <span class="carousel-control-prev-icon" aria-hidden="true">
            <i class="fa-solid fa-angle-left fa-2x"></i>
          </span>
          <span class="visually-hidden">Previous</span>
          <div class="layer-button "></div>

        </div>
      </button>

      <button class="  carousel-control-next overflow-hidden  border " type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
        <div class="content-button position-relative  ">
          <span class="carousel-control-next-icon  " aria-hidden="true">
            <i class="fa-solid fa-angle-right fa-2x"></i>
          </span>
          <span class="visually-hidden">Next</span>
          <div class="layer-button "></div>
        </div>
      </button>

    </div>
  </div>
</header>




<div class="container container-button">
  <button class="getprayer">
    <span>احصل على مواقيت الصلاة</span>
    <svg viewBox="-5 -5 110 110" preserveAspectRatio="none" aria-hidden="true">
      <path d="M0,0 C0,0 100,0 100,0 C100,0 100,100 100,100 C100,100 0,100
            0,100 C0,100 0,0 0,0" />
    </svg>
  </button>

  <div class="flex-container-prayer hidden">
    <div class="item1">
      <img src="../images/athan.png" alt="athan">
    </div>
    <div class="item2">
      <div class="div2">
        <div class="flex-container__pray">
          <div class="item1-pray">
            <div class="img_pray">
              <img src="../images/fajr.png" alt="fajr">
            </div>
          </div>
          <p class="item2-pray"></p>
          <div class="item3-pray">الفجر</div>
        </div>
      </div>
      <div class="div2">
        <div class="flex-container__pray">
          <div class="item1-pray">
            <div class="img_pray">
              <img src="../images/dohr.png" alt="dohr.png">
            </div>
          </div>
          <p class="item2-pray"></p>
          <div class="item3-pray">الظهر</div>
        </div>
      </div>
      <div class="div2">
        <div class="flex-container__pray">
          <div class="item1-pray">
            <div class="img_pray">
              <img src="../images/asr.png" alt="asr.png">
            </div>
          </div>
          <p class="item2-pray"></p>
          <div class="item3-pray">العصر</div>
        </div>
      </div>
      <div class="div2">
        <div class="flex-container__pray">
          <div class="item1-pray">
            <div class="img_pray">
              <img src="../images/maghreb.png" alt="maghreb.png">
            </div>
          </div>
          <p class="item2-pray"></p>
          <div class="item3-pray">المغرب</div>
        </div>
      </div>
      <div class="div2">
        <div class="flex-container__pray">
          <div class="item1-pray">
            <div class="img_pray">
              <img src="../images/isha.png" alt="isha.png">
            </div>
          </div>
          <p class="item2-pray"></p>
          <div class="item3-pray">العشاء</div>
        </div>
      </div>
      <div class="div2">
        <div class="flex-container__pray">
          <div class="item1-pray">
            <div class="img_pray">
              <img src="../images/shoroq.png" alt="shoroq.png">
            </div>
          </div>
          <p class="item2-pray"></p>
          <div class="item3-pray">قيام الليل</div>
        </div>
      </div>

    </div>
  </div>
</div>






<section class="ClientReviews py-5 my-5  py-5  overflow-hidden  " style="background-color: #FFFFFF;">
  <div class="container">
    <div class=" space">
      <div class="text-head  text-center position-relative p-1">
        <h2 style="  font-size: 38px;" bigletter="Z" class="z">Zakat Calculator</h2>
      </div>
      <div class="container px-5 text text-center ">
        <div class="zakat">
          <form method="post">
            <label for="income">Enter your income:</label>
            <input type="number" name="income" id="income">
            <input type="submit" name="add" value="Submit">
          </form>
          <div class="output">
            <?php
            require_once '../model/model-zakat.php';
            if (isset($_POST["add"])) {
              $income = new Zakat($_POST["income"]);
              $zakat = $income->calulate_zakat();
              if ($zakat == 0) {
                echo "<p>You don't have zakat.</p>";
              } else {
                echo "<p>Your zakat is: $zakat</p>";
              }
            }
            ?>
          </div>
        </div>
      </div>
    </div>
</section>

<section class="ClientReviews py-5 my-5  py-5  overflow-hidden  " style="background-color: #FFFFFF;">
  <div class="container">
    <div class=" space">
      <div class="text-head  text-center position-relative p-1">
        <h2 style="  font-size: 38px;" bigletter="D" class="z">Daily Inspirations</h2>
      </div>
      <div class="container px-5 text text-center ">

        <?php

        class HomeController
        {
          public function index()
          {
            // Load the model
            require_once('../model/dailymodel.php');
            $model = new DailyInspirationsModel();
            // Fetch data from the model
            $data = $model->getDailyInspirations();
            // Load the view
            require_once('dailyview.php');
          }
        }
        // Load the controller
        $controller = new HomeController();

        // Call the index method
        $controller->index();
        ?>
        <script>
          function updateContent() {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
              if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                  var data = JSON.parse(xhr.responseText);
                  document.getElementById('hadith').innerHTML = data.hadith;
                  document.getElementById('verse').innerHTML = data.verse;
                } else {
                  console.log('Error: ' + xhr.status);
                }
              }
            };
            xhr.open('GET', '../controller/DailyController.php', true);
            xhr.send();
            // Schedule the next update at 9 am the next day
            // var now = new Date();
            //var millisUntilNine = new Date(now.getFullYear(), now.getMonth(), now.getDate() + 1, 9, 0, 0, 0) - now;
            //setTimeout(updateContent, millisUntilNine);
          }

          updateContent();
          setInterval(updateContent, 60000);
        </script>
      </div>
    </div>
  </div>
</section>







<section class="ClientReviews py-5 my-5  py-5  overflow-hidden  " style="background-color: #FFFFFF;">
  <div class="container">
    <div class=" space">
      <div class="text-head  text-center position-relative p-1">
        <h2 style="  font-size: 38px;" bigletter="T" class="z">Tasbih</h2>
      </div>
      <?php require_once 'tasbih.php'; ?>
    </div>
  </div>
</section>





<?php include_once "footer.php" ?>


<script src="../js/jquery-3.6.3.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
<script src="../js/main.js"></script>
<script src="../js/mainPrayer.js"></script>


</body>

</html>