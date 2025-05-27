<?php

    require_once 'credenziali_database.php';
    session_start();
    header('Content-Type: application/json');

    if (!isset($_SESSION["username"])) {
        echo json_encode([]);
        exit;
    }

    $conn = mysqli_connect(
        $configurazione['host'],
        $configurazione['user'],
        $configurazione['password'],
        $configurazione['name']
    );
    if (!$conn) {
        echo json_encode([]);
        exit;
    }

    $sql = "SELECT * FROM prodotti_in_vendita LIMIT 4";
    $result = mysqli_query($conn, $sql);

    $prodotti = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $prodotti[] = $row;
        }
    }
    mysqli_close($conn);

    echo json_encode($prodotti);
?>