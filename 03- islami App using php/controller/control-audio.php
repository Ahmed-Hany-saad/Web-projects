<?php
class QuranController {
  private $model;

  public function __construct($model) {
    $this->model = $model;
  }

  public function updateSurah($surahNumber, $audioEdition) {
    $this->model->setSurahNumber($surahNumber);
    $this->model->setAudioEdition($audioEdition);
  }
}

$model = new QuranModel();
$controller = new QuranController($model);

$surahNumber = 1;
$audioEdition = 'ar.alafasy';

if (isset($_GET['surah'])) {
  $surahNumber = $_GET['surah'];
}

$audioUrl = $model->getAudioUrl($surahNumber, $audioEdition);
$surahNames = $model->getSurahNames();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $controller->updateSurah($_POST['surahNumber'], $_POST['audioEdition']);
  $audioUrl = $model->getAudioUrl($surahNumber, $audioEdition);
  $surahNumber = $_POST['surahNumber'];
  $audioEdition = $_POST['audioEdition'];
}

?>