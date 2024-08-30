<?php

require_once('../model/HadithModel.php');

$data = getHadithData();

$hadith_index = isset($_POST['hadith_index']) ? $_POST['hadith_index'] : 0;
$hadith_limit = 100;

if (isset($_POST['next'])) {
  $hadith_index++;
  if ($hadith_index >= $hadith_limit) {
    $hadith_index = 0;
  }
}

if (isset($_POST['previous'])) {
  $hadith_index--;
  if ($hadith_index < 0) {
    $hadith_index = $hadith_limit - 1;
  }
}

$hadith = $data['hadiths'][$hadith_index];

require_once('../view/hadith.php');

?>