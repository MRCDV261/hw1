<head> 
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="index.css" />
    <title>Footer</title>
</head>

<footer>
        <div id="sfondo_footer">
            <div class="margine_footer">
                <?php if (!isset($_SESSION["username"])): ?>
                <div id="superiore_footer"> 
                    <strong> Unisciti a XPLR Pass</strong>
                    <br><span id="piccolo">Iscriviti ora e scopri tutti i benefit del nosro membership program.</span> 
                    <br> <span class="button" id="accedi">Iscriviti ora </span>
                    <?php endif; ?>
                </div>

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
                            <p>Dichiarazione di conformità</p>
                         </div>

                         <div class="flex-item_footer_centro">
                            <p><strong>CHI SIAMO</strong></p>
                            <p>La nostra storia</p>
                            <p>Sostenibilità</p>
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
                        <p>Ricevi novità e aggiornamenti sui prodotti nella tua <br>posta in arrivo</p>
                        <div> 
                            <input type="text" class="email" placeholder="Inserisci la tua email*">
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
                       <!-- <img class="immagini_loghi_esterni" src="Immagini\f.jpg">         
                        <img class="immagini_loghi_esterni" src="Immagini\ig.jpg">      
                        <img class="immagini_loghi_esterni" src="Immagini\X.jpg">
                        <img class="immagini_loghi_esterni" src="Immagini\youtube.jpg">-->
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
                              <!--  <img class="immagine_italia" src="Immagini\IT.svg" >-->
                            </div>

                            <div class="flex-item_footer_c">
                                <p>IT | Cambia paese</p> 
                            </div>
    
                        </div>
                    </span>
                </div>

        </div>

    </footer>