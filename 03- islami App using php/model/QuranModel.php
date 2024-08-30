<?php

class QuranModel {

    public function getSurahList() {
        $url = "http://api.alquran.cloud/v1/surah";
        $json = file_get_contents($url);
        $data = json_decode($json);
        return $data->data;
    }

    public function getSurah($surah_num) {
        $url = "http://api.alquran.cloud/v1/surah/" . $surah_num;
        $json = file_get_contents($url);
        $data = json_decode($json);
        return $data->data;
    }

}


?>