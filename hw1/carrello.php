

<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit;
}
?>




<html>

<head>    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrello</title>
    <link rel="icon" type="image/png" href="Immagini\Logo.svg">
    <link rel="stylesheet" href="carrello.css">
    <script src="carrello.js" defer></script>
</head>

<body>
    <?php require_once 'header.php'; ?>
    <main class="pagina-carrello">
        <header class="intestazione-carrello">
            <h1>Carrello</h1>
            <span class="conteggio-articoli">
            </span>
        </header>
        <hr>

        <section class="contenitore-carrello">
            <div class="area-messaggio">
                <p>NON CI SONO ARTICOLI NEL TUO CARRELLO</p>
            </div>
            <div class="lista-prodotti"></div>
            <div class="riepilogo-ordine">
                <h2>Riepilogo ordine</h2>
                <div class="riga-riepilogo">
                    <span>Costi di spedizione stimatiⓘ</span>
                    <span>Gratuita</span>
                </div>
                <p class="reso">Reso gratuito entro 30 giorni</p>
                <div class="riga-totale">
                    <strong>TOTALE ORDINE</strong>
                    <strong class="totale-carrello">0.00€</strong>
                </div>
            </div>
        </section>
                <div>
                    <a href="index.php">
                        <button class="button4">Torna alla home</button>
                    </a>
                </div>
        <?php require_once 'footer.php'; ?>

</body>
</html>