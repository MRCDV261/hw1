<?php
    
    require_once 'credenziali_database.php';


    session_start();

    if (!isset($_SESSION["username"])) {
        header("Location: index.php");
        exit;
    }


    $conn = mysqli_connect(
    $configurazione['host'],
    $configurazione['user'],
    $configurazione['password'],
    $configurazione['name']
    );

    
    if(!$conn)
    {
        die("Connessione fallita: " . mysqli_connect_error());
    }


    $sql = "SELECT * FROM prodotti_in_vendita LIMIT 4"; 
    $result = mysqli_query($conn ,$sql); 

    $prdotti=[]; 
    if($result)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            $prodotti[] = $row;
        }
    }
    else
    {
        echo "Errore nella query: " . mysqli_error($conn);
    }

    mysqli_close($conn);
?>



<html>
    <head>
        <title>UOMO</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="pagina_uomo.css">
        <link rel="icon" type="image/png" href="Immagini\Logo.svg">
        <script src="pagina_uomo.js" defer></script> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    </head>



    <body>

        <header>

            <div id="header_nero"> 
                <div class="flex-item_header-1">
                    <img class="immagine_freccia" src="Immagini\freccia_sinistra.png"> 
                </div>
    
                <div class="flex-item_header">
                     SCONTO EXTRA DEL 10% SU OUTLET, INSERISCI IL CODICE OUTLET10, ACQUISTA ORA 
                </div>
    
                <div class="flex-item_header-1">
                    <img class="immagine_freccia" src="Immagini\freccia_destra.png"> 
                </div>
            </div>
    
            <div id="header_nero-1"> 
                <div class="pallina">
                </div>
    
                <div class="pallina">
                </div>
    
            </div>
    
    
    
            <nav class="background_nav2">
                <div id="sfondo_sopra">
                    <div id="nav_sopra_flex"> 
                        <div class="flex-item_nav">
                         <p><img class="immagine_italia" src="Immagini\IT.svg"> IT</p>
                        </div>
        
                        <div class="flex-item_nav">
                           <p>Stato dell'ordine</p> 
                          </div>
        
                        <div class="flex-item_nav">
                            <p>XRLR Pass</p>
                          </div>
        
                          <div class="flex-item_nav">
                            <p>Trova un punto vendita</p>
                          </div>
        
                          <div class="flex-item_nav">
                            <p>Assistenza</p>
                          </div>
        
                          <div class="flex-item_nav">
                            <p>Gift Card</p>
                          </div>
        
                          <div class="flex-item_nav">
                            <p>Preferiti </p>
                          </div>
        
                    </div>
                </div>
                
                <div id="sfondo_sotto">
                    <div class="nav-sotto-con2">
                        <span class="left">
                            <div class="nav_sotto_flex"> 
                            
                                <div class="flex-item_nav2-1">
                                    <img class="immagine_logo" src="Immagini\Logo.svg" >
                                </div>
        
                                
                                <div class="dropdown">
    
                                    <div class="flex-item_nav2">
                                         <p>Uomo</p>
                                    </div>
            
                                    <div class="dropdown-content">
                                        
                                                    <div class="A_scomparsa-flex">
    
                                                        <div class="item-a-scomparsa">
                                                            <p><strong>Novita' & tendenze</strong></p>
                                                            <p>Nuovi arrivi</p>
                                                            <p>Bestsellers</p>
                                                            <p>Ultime collezioni</p>
                                                            <br>
                                                            <p><strong>Bundles</strong></p>
                                                        </div>
    
                                                        <div class="item-a-scomparsa">
                                                            <p><strong>Giacche</strong></p>
                                                            <p>Tutte le giacche imbottite</p>
                                                            <p>Giacche Nuptse & piumini</p>
                                                            <p>Sci & snowboard</p>
                                                            <p>Impermeabile</p>
                                                            <p>Giacche leggere</p>
                                                            <p>Gilet</p>
                                                            <p><strong>Trova la tua giacca</strong></p>
                                                        </div>
    
    
                                                        <div class="item-a-scomparsa">
                                                            <p><strong>Top</strong></p>
                                                            <p>Pile & strati intermedi</p>
                                                            <p>Felpe & felpe col cappuccio</p>
                                                            <p>T-shirt e camicie</p>
                                                            <p>T-shirt tecniche</p>
                                                            <br>
                                                            <p><strong>Pantaloni</strong></p>
                                                            <p>Pantaloni</p>
                                                            <p>Pantaloni sportivi e da tuta</p>
                                                            <p>Sci & snowboard</p>
                                                            <p>Pantaloncini</p>
                                                        </div>
    
                                                        <div class="item-a-scomparsa">
                                                            <p><strong>Scarpe</strong></p>
                                                            <p>Scarpe da trail running</p>
                                                            <p>Scarpe casual</p>
                                                            <p>Scarpe da trekking</p>
                                                            <p>Ciabatte, Sandali & Mules</p>
                                                            <p><strong>Trova la tua scarpa</strong></p>
                                                            <br>
                                                            <p><strong>Accessori</strong></p>
                                                            <p>Zaini uomo</p>
                                                            <p>Cappellini e cappelli</p>
                                                            <p>Berretti</p>
                                                            <p>Calze</p>
                                                            <p>Sciarpe e guanti</p>
                                                            <p>Accessori</p>
                                                        </div>
                                                        <div class="item-a-scomparsa">
                                                            <p><strong>Attivita'</strong></p>
                                                            <p>Sci & snowboard</p>
                                                            <p>Sci alpinismo</p>
                                                            <p>Alpinismo</p>
                                                            <p>Trail running</p>
                                                            <p>Allenamento</p>
                                                            <p>Trekking</p>
                                                            <br>
                                                            <p><strong>Collezioni</strong></p>
                                                            <p>Summit series</p>
                                                            <p>In esclusiva</p>
                                                            <p>Sustainable gear</p>
                                                            <p>Coordinati</p>
                                                            <br>
                                                            <p><strong>Outlet</strong></p>
                                                        </div>
    
                                                </div>
                                        
                                    </div>
                                </div>
    
    
                                <div class="dropdown">
    
                                    <div class="flex-item_nav2">
                                        <p>Donna</p>
                                    </div>
    
                                    <div class="dropdown-content">
                                        <div class="A_scomparsa-flex">
                                            <div class="item-a-scomparsa">
                                               <p><strong>Novita' & tendenze</strong></p>
                                                <p>Nuovi arrivi</p>
                                                <p>Best Sellers</p>
                                                <p>Ultime collezioni</p>
                                                <br>
                                                <p><strong>Bundles</strong></p>
                                            </div>
                                    
                                            <div class="item-a-scomparsa">
                                                <p><strong>Giacche</strong></p>
                                                <p>Tutte le giacche imbottite</p>
                                                <p>Giacche Nuptse & piumini</p>
                                                <p>Sci & snowboard</p>
                                                <p>Impermeabile</p>
                                                <p>Giacche leggere</p>
                                                <p>Gilet</p>
                                                <p><strong>Trova la tua giacca</strong></p>
                                            </div>
                                    
                                            <div class="item-a-scomparsa">
                                                <p><strong>Top</strong></p>
                                                <p>Pile</p>
                                                <p>Felpe & felpe con cappuccio</p>
                                                <p>T-shirt & camicie</p>
                                                <p>T-shirt tecniche</p>
                                                <p>Reggiseni sportivi</p>
                                                <br>
                                                <p><strong>Pantaloni</strong></p>
                                                <p>Pantaloni</p>
                                                <p>Pantaloni sportivi e da tuta</p>
                                                <p>Leggings</p>
                                                <p>Sci & snowboard</p>
                                                <p>Gonne & abiti</p>
                                                <p>Shorts</p>
                                            </div>
                                    
                                            <div class="item-a-scomparsa">
                                                <p><strong>Scarpe</strong></p>
                                                <p>Scarpe da trail running e da corsa</p>
                                                <p>Scarpe da trekking ed escursionismo</p>
                                                <p>Scarpe casual</p>
                                                <p>Ciabatte, Sandali & Mules</p>
                                                <p><strong>Trova la tua scarpa</strong></p>
                                                <br>
                                                <p><strong>Accessori</strong></p>
                                                <p>Zaini donna</p>
                                                <p>Cappellini e cappelli</p>
                                                <p>Berretti</p>
                                                <p>Calze</p>
                                                <p>Sciarpe e guanti</p>
                                                <p>Accessori</p>
                                            </div>
                                            <div class="item-a-scomparsa">
                                                <p><strong>Attivita'</strong></p>
                                                <p>Sci & snowboard</p>
                                                <p>Sci alpinismo</p>
                                                <p>Alpinismo</p>
                                                <p>Trail running</p>
                                                <p>Allenamento</p>
                                                <p>Trekking</p>
                                                <br>
                                                <p><strong>Collezioni</strong></p>
                                                <p>Curve & plus size</p>
                                                <p>Summit series</p>
                                                <p>In esclusiva</p>
                                                <p>Sustainable gear</p>
                                                <p>Coordinati</p>
                                                <br>
                                                <p><strong>Outlet</strong></p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
    
    
        
                                
        
                                <div class="dropdown">
    
                                    <div class="flex-item_nav2">
                                        <p>Bambino</p>
                                    </div>
    
                                    <div class="dropdown-content">
                                        <div class="A_scomparsa-flex">
                                            <div class="item-a-scomparsa">
                                                <p><strong>New & trending</strong></p>
                                                <p>Nuovi arrivi</p>
                                                <p>Bestsellers</p>
                                                <p>Mini Me</p>
                                                <p>Bundles</p>
                                            </div>
                                    
                                            <div class="item-a-scomparsa">
                                                <p><strong>Ragazzo (7-16 anni)</strong></p>
                                                <p>Cappotti & giacche</p>
                                                <p>Giacche impermeabili</p>
                                                <p>Pile & felpe</p>
                                                <p>T-shirt</p>
                                                <p>Pantaloni</p>
                                                <p><strong>Trova la tua giacca</strong></p>
                                            </div>
                                    
                                            <div class="item-a-scomparsa">
                                                <p><strong>Ragazza (7-16 anni)</strong></p>
                                                <p>Cappotti & giacche</p>
                                                <p>Giacche impermeabili</p>
                                                <p>Pile & felpe</p>
                                                <p>T-shirt e bralette</p>
                                                <p>Pantaloni</p>
                                                <p><strong>Trova la tua giacca</strong></p>
                                            </div>
                                    
                                            <div class="item-a-scomparsa">
                                                <p><strong>Bambini piccoli & neonati (0-7 anni)</strong></p>
                                                <p>Neonato (0-2 anni)</p>
                                                <p>Bambini piccoli (2-7 anni)</p>
                                                <p><strong>Trova la tua giacca</strong></p>
                                                <br>
                                                <p><strong>Scarpe & accessori</strong></p>
                                                <p>Zaini</p>
                                                <p>Cappelli & guanti</p>
                                                <p>Scarpe</p>
                                            </div>
                                            <div class="item-a-scomparsa">
                                                <p><strong>Attivita'</strong></p>
                                                <p>Trekking</p>
                                                <p>Running & allenamento</p>
                                                <p>Sci & snowboard</p>
                                                <br>
                                                <p><strong>Outlet</strong></p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
    
    
    
                                 <div class="dropdown">
    
                                    <div class="flex-item_nav2">
                                        <p>Scarpe</p>
                                    </div>
    
                                    <div class="dropdown-content">
                                        <div class="A_scomparsa-flex">
                                            <div class="item-a-scomparsa">
                                                <p><strong>Novita' & tendenze</strong></p>
                                                <p>Nuovi arrivi</p>
                                                <p>Bestsellers</p>
                                            </div>
                                    
                                            <div class="item-a-scomparsa">
                                                <p><strong>Uomo</strong></p>
                                                <p>Scarpe da trail running e da corsa</p>
                                                <p>Scarpe da trekking ed escursionismo</p>
                                                <p>Scarpe casual</p>
                                                <p>Ciabatte, Sandali & Mules</p>
                                                <p>Scarpe impermeabili</p>
                                                <p>Scarpe da alpinismo</p>
                                                <p>Calze</p>
                                                <p><strong>Trova la tua scarpa</strong></p>
                                            </div>
                                    
                                            <div class="item-a-scomparsa">
                                                <p><strong>Donna</strong></p>
                                                <p>Scarpe da trail running e da corsa</p>
                                                <p>Scarpe da trekking ed escursionismo</p>
                                                <p>Scarpe casual</p>
                                                <p>Ciabatte, Sandali & Mules</p>
                                                <p>Scarpe impermeabili</p>
                                                <p>Scarpe da alpinismo</p>
                                                <p>Calze</p>
                                                <p><strong>Trova la tua scarpa</strong></p>
                                            </div>
                                    
                                            <div class="item-a-scomparsa">
                                                <p><strong>Bambino</strong></p>
                                                <p>Stivali & scarpe</p>
                                                <p>Pantofole e ciabatte</p>
                                                <br>
                                                <p><strong>Outlet</strong></p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
    
    
    
                                <div class="dropdown">
    
                                    <div class="flex-item_nav2">
                                        <p>Borse & attrezzatura</p>
                                    </div>
    
                                    <div class="dropdown-content">
                                        <div class="A_scomparsa-flex">
                                            <div class="item-a-scomparsa">
                                                <p><strong>Novita' & tendenze</strong></p>
                                                <p>Nuovi arrivi</p>
                                                <p>Bestsellers</p>
                                                <br>
                                                <p><strong>Borse da viaggio</strong></p>
                                            </div>
                                
                                            <div class="item-a-scomparsa">
                                                <p><strong>Zaini</strong></p>
                                                <p>Zaini lifestyle</p>
                                                <p>Zaini tecnici e outdoor</p>
                                                <p>Zaini per bambini</p>
                                                <p><strong>Trova il tuo zaino</strong></p>
                                                <br>
                                                <p><strong>Tende e sacchi a pelo</strong></p>
                                                <p>Tende</p>
                                                <p>Sacchi a pelo</p>
                                                <p><strong>Guida a tende e sacchi a pelo</strong></p>
                                            </div>
                                
                                            <div class="item-a-scomparsa">
                                                <p><strong>Borsoni duffel & bagagli</strong></p>
                                                <p>Duffels</p>
                                                <p>Bagagli</p>
                                                <br>
                                                <p><strong>Borse e accessori</strong></p>
                                                <p>Marsupi</p>
                                                <p>Borse a tracolla e borse tote</p>
                                                <p>Accessori</p>
                                            </div>
                                
                                            <div class="item-a-scomparsa">
                                                <p><strong>Attivita'</strong></p>
                                                <p>Zaini trekking</p>
                                                <p>Attrezzatura da running</p>
                                                <p>Articoli da campeggio</p>
                                                <p>Borse da viaggio</p>
                                                <p>Zaini da arrampicata e neve</p>
                                                <p>Zaini scuola</p>
                                            </div>
    
                                            <div class="item-a-scomparsa">
                                                <p><strong>Collezioni</strong></p>
                                                <p>Base camp duffel</p>
                                                <p>Borealis</p>
                                                <p>Voyager</p>
                                                <p>Attrezzatura sostenibile</p>
                                                <br>
                                                <p><strong>Outlet</strong></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
        
                                
        
                                <div class="dropdown">
    
                                    <div class="flex-item_nav2">
                                        <p>Outlet</p>
                                    </div>
    
                                    <div class="dropdown-content">
                                        <div class="A_scomparsa-flex">
                                            <div class="item-a-scomparsa">
                                                <p><strong>VEDI TUTTO Outlet  ></strong></p>
                                                <br>
                                                <p><strong>Uomo</strong></p>
                                                <br>
                                                <p><strong>Donna</strong></p>
                                                <br>
                                                <p><strong>Bambino</strong></p>
                                                <br>
                                                <p><strong>Zaini & Accessori</strong></p>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
        
    
                                <div class="dropdown">
    
                                    <div class="flex-item_nav2">
                                        <p>Esplora</p>
                                    </div>
    
                                    <div class="dropdown-content">
                                        <div class="A_scomparsa-flex">
                                            <div class="item-a-scomparsa">
                                                <p><strong>Chi siamo</strong></p>
                                                <p>La nostra storia</p>
                                                <p>Le nostre icone</p>
                                                <p>Summit Series</p>
                                                <p>Notizie</p>
                                            </div>
                                
                                            <div class="item-a-scomparsa">
                                                <p><strong>I nostri atleti</strong></p>
                                                <p>I nostri atleti</p>
                                                <p>Explorer Team</p>
                                            </div>
                                
                                            <div class="item-a-scomparsa">
                                                <p><strong>Community ed eventi</strong></p>
                                                <p>XPLR Pass</p>
                                                <p>Pro Programme</p>
                                                <p>Basecamp</p>
                                                <p>Transgrancanaria</p>
                                            </div>
                                
                                            <div class="item-a-scomparsa">
                                                <p><strong>Guide ai prodotti</strong></p>
                                                <p>Tecnologie</p>
                                                <p>Trova la tua giacca</p>
                                                <p>Trova la tua scarpa</p>
                                                <p>Trova il tuo zaino</p>
                                                <p>Guida a tende e sacchi a pelo</p>
                                            </div>
    
                                            <div class="item-a-scomparsa">
                                                <p><strong>Per il pianeta</strong></p>
                                                <p>Sostenibilita'</p>
                                                <p>Explore Fund</p>
                                            </div>
                                        </div>
                                    </div>
    
                                </div>
                                
                            </div>
                        </span>      
        
                        <span class="right">
                            <div class="nav_sotto_flex"> 
                                
                                <div class="nav_sotto_flex2"> 
                            
                                    <div class="flex-item_nav2">
                                        <input type="text" id="cerca_box" placeholder="Cerca"> 
                                    </div>
    
                                    <div class="flex-item_nav2">
                                        <img class="immagine_piccola" src="Immagini\cerca.svg" >
                                    </div>
    
                                </div>
    
                                
                                <div class="flex-item_nav">
                                    <img class="immagine_piccola2" src="Immagini\cerca.svg" > 
                                </div>
    
    
    
                                <div class="dropdown2">
    
                                    <div class="flex-item_nav">
                                        <img class="immagine_piccola2" src="Immagini\menu_nero.png" > 
                                    </div>
    
                                    <div class="dropdown-content">
                                        <div class="A_scomparsa-flex">
                                            <div class="item-a-scomparsa">
                                                <div class="menu-telefono">
                                                    <p>Uomo </p>
                                                </div>
                                                <div class="menu-telefono">
                                                    <p>Donna </p>
                                                </div>
                                                <div class="menu-telefono">
                                                    <p>Bambino </p>
                                                </div>
                                                <div class="menu-telefono">
                                                    <p>Scarpe </p>
                                                </div>
                                                <div class="menu-telefono">
                                                    <p>Borse & attrezzatura </p>
                                                </div>
                                                <div class="menu-telefono">
                                                    <p>Outlet </p>
                                                </div>
                                                <div class="menu-telefono">
                                                    <p>Esplora </p>
                                                </div>
                                                <p>Accedi</p>
                                                <p>Stato dell'ordine</p>
                                                <p>XPLR Pass</p>
                                                <p>Trova un punto vendita</p>
                                                <p>Assistenza</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
    
                                <div class="flex-item_nav2-2">
                                    <a href="carrello.php">
                                        <img class="immagine_piccola" src="Immagini\bag_nera.jpg" > 
                                    </a>
                                </div>
    
    
                            </div>
                        </span>
                    </div>
    
                    
    
    
                </div>
    
            </nav>
    
        </header>




        <article>
            <div class="background-due">
                <section class="promo">
                    <p class="prima-scritta-2"><strong>
                        The North Face <br>MOUNTAIN JACKET.</strong></p>
    
                    <p class="seconda-scritta-2">Inimitabile dall'85. Inconfondibile, ovunque tu vada.</p>

                    <p class="button3"><strong>Acquista ora</strong></p>
                </section>   
        </div>




        <div>
            <div id="flex-con-due-foto">
    
                    <div class="foto-flex">
                        <img class="immagini-foto-flex" src="Immagini\scalatore-2.avif">
                        <br> <br> <span class="Scritta"> <strong>Massima protezione per le attivita' outdoor. </strong></span>
                        <br> <span class="button">Acquista ora      </span>
                        
                    </div>
    
                    <div class="foto-flex">
                        
                     <img class="immagini-foto-flex" src="Immagini\scarpe.avif">
                     <br> <br> <span class="Scritta"> <strong>Pile per esplorare nel comfort. </strong></span>
                     <br> <span class="button">Acquista ora      </span>
                    </div>
    
            </div>
        </div>


        <div class="margine">
            <div>
                <p id="In-evidenza">In evidenza </p>
            </div>
            <div class="margine">
                <div id="flex-4-foto"></div>
            </div>
        </div>


        </article>



        <footer>
            <div id="sfondo_footer">
                <div class="margine_footer">
    
                    <div id="Centro_footer">
    
                            <div class="flex-item_footer_centro">
                                <p><strong>ACQUISTA</strong></p>
                                <p>Uomo</p>
                                <p>Donna</p>
                                <p>Bambini</p>
                                <p>Borse & Attrezzature</p>
                                <p>Scarpe</p>
                            </div>
    
                            <div class="flex-item_footer_centro">
                                <p><strong>ORDINI</strong></p>
                                <p>Segui il tuo ordine</p>
                                <p>Spedizioni</p>
                                <p>Bambini</p>
                                <p>Sconto studenti</p>
                            </div>
    
    
                            <div class="flex-item_footer_centro">
                                <p><strong>HELP</strong></p>
                                <p>Contattaci</p>
                                <p>Domande frequenti</p>
                                <p>Garanzia</p>
                                <p>Condizioni d'uso</p>
                                <p>Informativa sulla privacy</p>
                                <p>Guida alle taglie</p>
                                <p>Preferenza dei cookie</p>
                                <p>Dichiarazione di conformita'</p>
                             </div>
    
                             <div class="flex-item_footer_centro">
                                <p><strong>CHI SIAMO</strong></p>
                                <p>La nostra storia</p>
                                <p>Sostenibilita'</p>
                                <p>Atleti</p>
                                <p>Tecnologie</p>
                                <p>The North Face pro programme</p>
                                <p>Lavora con noi</p>
                                <p>Notizie</p>
                            </div>
     
                             <div class="flex-item_footer_centro">
                                <p><strong>GLI EVENTI</strong></p>
                                <p>Basecamp</p>
                                <p>Transgrancanaria</p>
                             </div>
    
                    </div>
    
                    
    
    
                    <div id="Inferiore_footer">
    
                        <div class="flex-item_footer_c">
                            <p><strong>Iscriviti alla nostra newsletter</strong></p>
                            <p>Ricevi novita' e aggiornamenti sui prodotti nella tua <br>posta in arrivo</p>
                            <div> 
                                <input type="text" id="email" placeholder="Inserisci la tua email*">
                            </div>
    
    
                            <br> <span class="button">Iscriviti </span> 
                        </div>
        
                        <div class="flex-item_footer_bordi">
                            <p><strong>Trova un punto vendita</strong></p>
                            <p>Trova il punto vendita The North Face più vicino</p>
                            <br> <span class="button">Trova negozio </span> 
        
                        </div>
        
        
                        <div class="flex-item_footer_c">
                            <p><strong>Segui The North Face</strong></p>     
                            <img class="immagini_loghi_esterni" src="Immagini\f.jpg">         
                            <img class="immagini_loghi_esterni" src="Immagini\ig.jpg">      
                            <img class="immagini_loghi_esterni" src="Immagini\X.jpg">
                            <img class="immagini_loghi_esterni" src="Immagini\youtube.jpg">
                         </div>
        
                    </div>
                    
    
                         
                    <div class="ulima-footer">
                        <span class="left">
                            <div class="ultima-footer2"> 
                            
                                <div class="flex-item_nav3">
                                    <img class="immagine_logo" src="Immagini\Logo.svg" >
                                </div>
        
                                <div class="flex-item_nav3">
                                    <p>Privacy Policy</p>
                                </div>
        
                                <div class="flex-item_nav3">
                                    <p>Termini di utilizzo</p>
                                </div>
        
                            </div>
                        </span>      
        
                        <span class="right">
                            <div class="ultima-footer2"> 
                                
                                <div class="flex-item_footer_c">
                                    <img class="immagine_italia" src="Immagini\IT.svg" >
                                </div>
    
                                <div class="flex-item_footer_c">
                                    <p>IT | Cambia paese</p> 
                                </div>
        
                            </div>
                        </span>
                    </div>
    
            </div>
    
        </footer>
        
    </body>

<html>