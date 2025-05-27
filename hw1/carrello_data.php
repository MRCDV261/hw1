<?php
    require_once 'credenziali_database.php';

    session_start();
    header('Content-Type: application/json');

    if (!isset($_SESSION["user_id"])) {
        echo json_encode(['success' => false, 'error' => 'Utente non autenticato']);
        exit;
    }

    $conn = mysqli_connect(
    $configurazione['host'],
    $configurazione['user'],
    $configurazione['password'],
    $configurazione['name']
    );

    if (!$conn) {
        echo json_encode(['success' => false, 'error' => 'Connessione fallita']);
        exit;
    }

    $userid = (int)$_SESSION['user_id'];
    $sql = "SELECT p.id as product_id, p.immagine, p.prodotto, p.prezzo, c.quantità, c.id
            FROM carrello c 
            JOIN prodotti_in_vendita p ON c.product_id = p.id 
            WHERE c.user_id = $userid";
    $result = mysqli_query($conn, $sql);

    $cartItems = [];
    $totaleCarrello = 0;
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $row['prezzo'] = number_format($row['prezzo'], 2);
            $row['totale'] = number_format($row['prezzo'] * $row['quantità'], 2);
            $cartItems[] = $row;
            $totaleCarrello += $row['prezzo'] * $row['quantità'];
        }
    }

    echo json_encode([
        'success' => true,
        'cartItems' => $cartItems,
        'count' => count($cartItems),
        'totaleCarrello' => number_format($totaleCarrello, 2)
    ]);

    mysqli_close($conn);
?>