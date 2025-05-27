<?php

    $query = urlencode($_GET['q']);
    $apiKey = '5753615843e5ad725140440467f3999d';  
    $url = "https://gnews.io/api/v4/search?q=$query&lang=it&apikey=$apiKey";

    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    $response = curl_exec($ch);
    curl_close($ch);

    header('Content-Type: application/json');
    echo $response;

?>
