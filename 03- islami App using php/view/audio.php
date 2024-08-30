<?php include_once "header.php" ?>
<?php if(!isset($_SESSION['person'])){
  header('Location: login.php');
} ?>
<section class="ClientReviews py-5 my-5  py-5  overflow-hidden  " style="background-color: #FFFFFF;">

<div class="container">
  <div class=" space">
    <div class="text-head  text-center position-relative p-1">

      <h2 style="  font-size: 38px;" bigletter="C" class="z">Quran Audio</h2>

    </div>
    <div class="container px-5 text text-center ">
      <p class="text-muted  py-3" style="font-size: 18px; font-weight: 400;">
        You Can Here Listening to Complete Audio Of The Holy Quran Surah By Surah In Arabic Language 
         <br> For The Reciter Mishary bin Rashid Alafasy
      </p>
    </div>
  </div>
</section>

</div>

<div class="quran">

<div id="surah-list">

  <?php
    require_once('../model/model-audio.php');
    require_once('../controller/control-audio.php');

  foreach ($surahNames as $index => $surahName): ?>
    <div class="surah-box <?php echo ($surahNumber == $index +1) ? 'selected' : ''; ?>"
         data-surah="<?php echo ($index + 1); ?>">
      <?php echo $surahName; ?>
    </div>
  <?php endforeach; ?>
</div>
<audio src="<?php echo $audioUrl; ?>" controls></audio>
  
  
  
  <!-- and so on for all 114 Surahs -->

  <!-- Audio player -->
  <!-- <audio controls>
    <source src="<?php echo $audioUrl; ?>" type="audio/mp3">
    Your browser does not support the audio element.
  </audio> -->

  <!-- JavaScript code to handle Surah selection -->
  <script>
    // Get all Surah selection boxes
    var surahBoxes = document.querySelectorAll('.surah-box');

    // Add click event listeners to each box
    surahBoxes.forEach(function(box) {
      box.addEventListener('click', function() {
        // Remove the "selected" class from all boxes
        surahBoxes.forEach(function(otherBox) {
          otherBox.classList.remove('selected');
        });

        // Add the "selected" class to the clicked box
        box.classList.add('selected');

        // Get the Surah number from the "data-surah" attribute
        var surahNumber = box.getAttribute('data-surah');

        // Update the audio URL
        var audioUrl = 'https://cdn.islamic.network/quran/audio-surah/128/<?php echo $audioEdition; ?>/' + surahNumber + '.mp3';
        document.querySelector('audio').setAttribute('src', audioUrl);
      });
    });
  </script>
</div>



<?php include_once "footer.php" ?>

<script src="../js/jquery-3.6.3.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
<script src="../js/main.js"></script>