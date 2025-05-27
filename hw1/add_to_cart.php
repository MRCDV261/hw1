<?php

    require_once 'credenziali_database.php';
    
    $conn = mysqli_connect(
        $configurazione['host'],
        $configurazione['user'],
        $configurazione['password'],
        $configurazione['name']
    );

    
    if (!$conn) 
    {
        die("Errore di connessione al database: " . mysqli_connect_error());
    }

    session_start();
    header('Content-Type: application/json');

    if (!isset($_SESSION['user_id'])) {
    location('index.php');
    exit;
    }

    $data = json_decode(file_get_contents("php://input"), true);

    if (!isset($data['product_id']) || !isset($data['quantity'])) {
        echo json_encode(['success' => false, 'error' => 'Dati mancanti']);
        exit;
    }

    $user_id = (int)$_SESSION['user_id'];
    $product_id = (int)$data['product_id'];
    $quantity = (int)$data['quantity'];



    $check = "SELECT * FROM carrello WHERE user_id = $user_id AND product_id = $product_id";
    $result = mysqli_query($conn, $check);

    if (mysqli_num_rows($result) > 0) {
        $update = "UPDATE carrello SET quantità = quantità + $quantity WHERE user_id = $user_id AND product_id = $product_id";
        $esito = mysqli_query($conn, $update);
    } else {
        $insert = "INSERT INTO carrello (user_id, product_id, quantità) VALUES ($user_id, $product_id, $quantity)";
        $esito = mysqli_query($conn, $insert);
    }


    mysqli_close($conn);
?>
