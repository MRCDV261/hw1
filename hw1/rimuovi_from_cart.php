<?php
    require_once 'credenziali_database.php';

    header('Content-Type: application/json');
    session_start();

    if (!isset($_SESSION['user_id'])) {
        echo json_encode(['success' => false, 'error' => 'Utente non autenticato']);
        exit;
    }

    $data = json_decode(file_get_contents("php://input"), true);

    if (!isset($data['cart_id'])) {
        echo json_encode(['success' => false, 'error' => 'ID carrello mancante']);
        exit;
    }

    $cart_id = (int)$data['cart_id'];
    $userid = (int)$_SESSION['user_id'];

    $conn = mysqli_connect(
        $configurazione['host'],
        $configurazione['user'],
        $configurazione['password'],
        $configurazione['name']
    );

    if (!$conn) {
        echo json_encode(['success' => false, 'error' => 'Errore connessione DB']);
        exit;
    }

    $check = "SELECT quantità FROM carrello WHERE id = $cart_id AND user_id = $userid";
    $result = mysqli_query($conn, $check);

    if ($row = mysqli_fetch_assoc($result)) {
        if ($row['quantità'] > 1) {
            $update = "UPDATE carrello SET quantità = quantità - 1 WHERE id = $cart_id AND user_id = $userid";
            $esito = mysqli_query($conn, $update);
        } else {
            $delete = "DELETE FROM carrello WHERE id = $cart_id AND user_id = $userid";
            $esito = mysqli_query($conn, $delete);
        }
        if ($esito) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => 'Errore nella query']);
        }
    } else {
        echo json_encode(['success' => false, 'error' => 'Elemento non trovato']);
    }

    mysqli_close($conn);
?>