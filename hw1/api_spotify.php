<?php
    $client_id = "secret";
    $client_secret = "secret";


    $query = urlencode($_GET['q']);

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "https://accounts.spotify.com/api/token");
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
    $headers = array("Authorization: Basic " . base64_encode($client_id . ":" . $client_secret));
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    curl_close($curl);

    $token = json_decode($result)->access_token;

    $url = "https://api.spotify.com/v1/search?type=album&q=$query";
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    $headers = array("Authorization: Bearer " . $token);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    curl_close($curl);

    header('Content-Type: application/json');
    echo $result;
?>
