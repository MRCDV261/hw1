<?php

    require_once 'credenziali_database.php';
    session_start();

    $conn = mysqli_connect(
        $configurazione['host'],
        $configurazione['user'],
        $configurazione['password'],
        $configurazione['name']
    );
    
    if (!$conn) {
        die("Connessione fallita: " . mysqli_connect_error());
    }

    $id_prodotto = isset($_GET['id']) ? (int)$_GET['id'] : 0;

    if ($id_prodotto > 0) {
        $sql = "SELECT * FROM prodotti_in_vendita WHERE id = $id_prodotto";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $prodotto = mysqli_fetch_assoc($result);
            } else {
                die('Prodotto non trovato.');
            }
        } else {
            die("Errore nella query: " . mysqli_error($conn));
        }
    } else {
        die('ID prodotto non valido.');
    }

    

    mysqli_close($conn);
?>

<html>
<html lang="it">
<head>    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dettagli Prodotto</title>
    <link rel="icon" type="image/png" href="Immagini\Logo.svg">
    <link rel="stylesheet" href="prodotto.css">
    <script src="prodotto.js" defer></script>

</head>

<body>
    <?php require_once 'header.php'; ?>
<div class="contenuto">
    <section class="sezione-prodotto">            
        <div class="dettagli-prodotto">
            <div class="immagine-prodotto">
                <img src="<?php echo $prodotto['immagine']; ?>" alt="<?php echo $prodotto['prodotto']; ?>">
            </div>
            <div class="descrizione-prodotto">
                <h1><?php echo $prodotto['prodotto']; ?></h1>
                
                <p class="testo-descrizione">
                    <?php echo ($prodotto['descrizione']); ?>
                </p>

                <div class="prezzo"> 
                    <strong><span><?php echo number_format($prodotto['prezzo'], 2); ?> €</span></strong>
                </div>

                <div class="bottoni-acquisto">
                    <button class="aggiungi-al-carrello" id="bottone-carrello" data-product-id="<?php echo $prodotto['id']; ?>">Aggiungi al carrello</button>
                    <a href="carrello.php" class="vai-al-carrello">Vai al carrello</a>
                </div>
                 <div id="notifica-carrello" class="hidden messaggio-carrello">
                        <p>Prodotto aggiunto al carrello</p>
                 </div>
            </div>
        </div>   
    </section>
</div>
<?php require_once 'footer.php'; ?>

</body>
</html>
