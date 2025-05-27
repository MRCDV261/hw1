<?php

    $lat = $_GET['lat'];
    $lng = $_GET['lng'];

    $apiKey = '7c15ad8a5a0e46a8b62110903251204';
    $url = "https://api.weatherapi.com/v1/current.json?key=$apiKey&q=$lat,$lng&lang=it";

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($curl);
    curl_close($curl);

    header('Content-Type: application/json');
    echo $result;
 
?>
