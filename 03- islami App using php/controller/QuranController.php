<?php
class QuranController {

private $model;

public function __construct($model) {
    $this->model = $model;
}

public function invoke() {
    $surahList = NULL;
    $surah = NULL;
    if (isset($_GET['surah'])) {
        $surah_num = $_GET['surah'];
        $surah = $this->model->getSurah($surah_num);
    } else {
        $surahList = $this->model->getSurahList();
    }
    include '../view/QuranView.php';
}

}
?>