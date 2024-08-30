<?php

function getHadithData()
{
    $url = 'https://cdn.jsdelivr.net/gh/fawazahmed0/hadith-api@1/editions/ara-abudawud.json';
    $json = file_get_contents($url);
    $data = json_decode($json, true);
    return $data;
}
