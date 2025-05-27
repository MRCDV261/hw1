
<head> 
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="pagina_uomo.css" />
    <script src="pagina_uomo.js" defer></script>
    <title>header</title>
</head>
<header>

         <?php
                 if (isset($errore_accesso)) 
                    {
                    echo "<p class='error'>$errore_accesso</p>";
                    }
         ?>
            
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



        <nav class="background_nav">
            <div id="sfondo_sopra">
                <div id="nav_sopra_flex"> 
                    <div class="flex-item_nav">
                  <!--   <p><img class="immagine_italia" src="Immagini\IT.svg"> IT</p>-->
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
    
                      <div class="flex-item_nav">
                            <?php if (isset($_SESSION["username"])): ?>
                                <a id="accedi" href="logout.php">Disconnettiti</a>
                            <?php else: ?>
                                <p id="accedi">Accedi</p>
                            <?php endif; ?>
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
                                                        <p><strong>Novità & tendenze</strong></p>
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
                                                        <p><strong>Attività</strong></p>
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
                                           <p><strong>Novità & tendenze</strong></p>
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
                                            <p><strong>Attività</strong></p>
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
                                            <p><strong>Attività</strong></p>
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
                                            <p><strong>Novità & tendenze</strong></p>
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
                                            <p><strong>Novità & tendenze</strong></p>
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
                                            <p><strong>Attività</strong></p>
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
                                            <p>Sostenibilità</p>
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
                                    <img class="immagine_piccola" src="Immagini\cerca_bianca.svg" >
                                </div>

                            </div>

                            
                            <div class="flex-item_nav">
                                <img class="immagine_piccola2" src="Immagini\cerca_bianca.svg" > 
                            </div>



                            <div class="dropdown2">

                                <div class="flex-item_nav">
                                 <!--   <img class="immagine_piccola2" src="Immagini\menu.png" >--> 
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
                             <!--   <img class="immagine_piccola" src="Immagini\bag_bianca.png" > -->
                            </div>


                        </div>
                    </span>
                </div>

                

                
                
                <div class="flex_promo">
                    <section class="promo">
                        <p id="prima-scritta"><strong>Sconto extra del 10% sui prodotti del nostro Outlet</strong></p>
                        <p class="seconda-scritta"><strong>Inserisci il codice OUTLET10 al pagamento.</strong></p>

                        <div>
                            <div id="flex-con-tre-foto">
                    
                                <a href="pagina_uomo.php">
                                    <p class="button3"><strong>Acquista uomo</strong></p>
                                </a>
                                
                                <p class="button3"><strong>Acquista donna</strong></p>

                                <p class="button3"><strong>Acquista bambino</strong></p>
                    
                            </div>
                        </div>
                        
                </div>
                          

            </div>

        </nav>

    </header>