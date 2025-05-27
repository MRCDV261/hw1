<?php
    session_start();
    require_once 'credenziali_database.php';    

      if (!empty($_POST['nome']) && !empty($_POST['cognome']) && !empty($_POST['email_reg']) && !empty($_POST['password_reg']) ) 
    {

        $error= array();
    
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


        if(strlen($_POST['password_reg']) < 8) 
        {
            $error[] = "La password deve essere lunga almeno 8 caratteri.";
        }


        if (!filter_var($_POST['email_reg'], FILTER_VALIDATE_EMAIL)) {
         $error[] = "Email non valida";
         } 
         else 
         {
                $email = mysqli_real_escape_string($conn, strtolower($_POST['email_reg']));
        
                $res = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");
                if (mysqli_num_rows($res) > 0) {
                    $error[] = "Email già utilizzata";
                }
        }


        if(count($error)==0)
        {
               
                $nome = mysqli_real_escape_string($conn, $_POST['nome']);
                $cognome = mysqli_real_escape_string($conn, $_POST['cognome']);
                $password = mysqli_real_escape_string($conn, $_POST['password_reg']);
                $password = password_hash($password, PASSWORD_BCRYPT);
            

                $query = "INSERT INTO users (nome, cognome, email, password) VALUES ('$nome', '$cognome', '$email', '$password')";
            

                if (mysqli_query($conn, $query))
                    {
                        $_SESSION["username"] = $email;
                        mysqli_close($conn);
                        header("Location: index.php");
                        exit;
                    } 
                    else {
                        $error[] = "Errore di connessione al Database";
                    }
        }


        mysqli_close($conn);
  }

    else if (isset($_POST["email_reg"])) {
    $error = array("Riempi tutti i campi");
    }
    




//ACCESSO
    if (isset($_POST["email_acc"]) && isset($_POST["password_acc"])) 
    {
        
       $conn = mysqli_connect(
            $configurazione['host'],
            $configurazione['user'],
            $configurazione['password'],
            $configurazione['name']
        );   

    
        if (!$conn) {
            die("Errore di connessione al database: " . mysqli_connect_error());
        }

        $email = mysqli_real_escape_string($conn, $_POST["email_acc"]);
        $query = "SELECT * FROM users WHERE email = '".$email."'";
        $res = mysqli_query($conn, $query) or die("Errore nella query: " . mysqli_error($conn));

        
        if (mysqli_num_rows($res) > 0) 
        {
            $entry= mysqli_fetch_assoc($res);
            if(password_verify($_POST["password_acc"],$entry["password"]))
            {
                $_SESSION["username"] = $entry["email"];
                $_SESSION["user_id"] = $entry["id"];
                header("Location: index.php");
                mysqli_free_result($res);
                mysqli_close($conn);
                exit;
            }
            
        }  

        $errore_accesso = "Email o password errati.";
        
    }


?>



<html>
    <head>
        <title>THE NORTH FACE</title>
        <link rel="stylesheet" type="text/css" href="index.css">
        <script src="index.js" defer></script> 
        <link rel="icon" type="image/png" href="Immagini\Logo.svg">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    </head>

<body>
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
                                    <img class="immagine_piccola2" src="Immagini\menu.png" > 
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
                                    <img class="immagine_piccola" src="Immagini/bag_bianca.png" alt="Vai al carrello">
                                </a>
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
                                
                                <a href="https://www.thenorthface.it/it-it/c/donna/novita-and-tendenze/stili-per-lestate-358656">
                                    <p class="button3"><strong>Acquista donna</strong></p>
                                </a>

                                <a href="https://www.thenorthface.it/it-it/bambino">
                                    <p class="button3"><strong>Acquista bambino</strong></p>
                                </a>                    
                            </div>
                        </div>
                        
                </div>
                          

            </div>

        </nav>

    </header>

    <article>
        <section id="modal-view" class="hidden"> 
            <div class="modal-contenuto">
                
                <form name="form_accesso" id="formAccesso"  method="post">
                    <img src="Immagini\X_chiusura.png" class="chiudi">
                    <h1>Accedi al tuo account XPLR Pass</h1>
                    <h6>Campi obbligatori</h6>
                    <input type="text" class="email2" name="email_acc" id="email_accesso" placeholder="Inserisci la tua email*" >
                    <div class="errore"> Campo obbligatorio; aggiungi Indirizzo e-mail.</div>
                    <input type="password"  class="email2" name="password_acc" id="pass_accesso" placeholder="Password*" >
                    <div class="errore"> Campo obbligatorio; aggiungi Password.</div>
                    <p>Password dimenticata?</p>
                    <input type="submit" class="button" value="Accedi al tuo account XPLR Pass">
                    <p>Non sono iscritto?</p>
                    <br>
                    <?php
                        if(isset($errore)){
                            echo "<p class='errore'>";
                            echo "Credenziali non valide.";
                            echo "</p>";
                        }
                    ?>

                    
                    <span class="button4">Iscriviti ora</span>
                    

                </form>
            </div>
        </section>


        <section id="modal-view2" class="hidden">
            <div class="modal-contenuto">
                <img src="Immagini\X_chiusura.png" class="chiudi">
                <h1>Iscriviti ora</h1>
                <h4>Sei già membro di XPLR Pass? <a href="">Accedi ora</a></h4>
                <h6>* Campi obbligatori</h6>

                <form name="form_iscrizione" id="formIscrizione"  method="post">

                    <div class="nome">
                        <input type='text' class= "email2" name='nome' placeholder="Nome*" <?php if(isset($_POST["nome"])){echo "value=".$_POST["nome"];} ?> >
                        <div><span class="err">Devi inserire il tuo nome</span></div>
                    </div>

                    <div class="cognome">
                        <input type='text' class = "email2" name='cognome' placeholder="Cognome*" <?php if(isset($_POST["cognome"])){echo "value=".$_POST["cognome"];} ?> >
                        <div><span class="err">Devi inserire il tuo cognome</span></div>
                    </div>

                    <input type="text"  class="email2" placeholder="Data di nascita DD/MM/YYYY"> 
                    <select name='genere' class="email2" >
                        <option value="" disabled selected>Genere </option>
                        <option value ='uomo'> UOMO </option>
                        <option value ='donna'> DONNA</option>
                        <option value ='nessuna risposta'> Preferisco non rispondere</option>
                    </select>


                    <div>
                         <input type='text' class="email2" name='telefono' placeholder="Numero di telefono*" <?php if(isset($_POST["telefono"])){echo "value=".$_POST["telefono"];} ?>>
                         <div><span class="err">Devi inserire il tuo numero di telefono</span></div>
                    </div>

                    <div class="email">
                        <input type='text' class="email2" name='email_reg' placeholder="Indirizzo email*" <?php if(isset($_POST["email"])){echo "value=".$_POST["email"];} ?>>
                        <div><span class="err">Indirizzo email non valido</span></div>
                    </div>


                    <div class="password-container password">
                    
                        <input type='password' name='password_reg' class= "email2" placeholder="Password *" <?php if(isset($_POST["password"])){echo "value=".$_POST["password"];} ?>>
                        <span class="occhio-password">
                        <img src="Immagini\occhio_chiuso.png" alt="Toggle password visibility">
                        </span>
                        <div><span class="err">Inserisci almeno 8 caratteri</span></div>
                    </div>

                            <h4>La password deve contenere</h4>
                            <div class="password-conditions">
                                <div class="condition">
                                    <img src="Immagini\x_cerchiata.png" class="icon"> almeno 8 caratteri
                                </div>
                                <div class="condition">
                                    <img src="Immagini\x_cerchiata.png" class="icon"> 1 lettera maiuscola
                                </div>
                                <div class="condition">
                                    <img src="Immagini\x_cerchiata.png" class="icon"> 1 lettera minuscola
                                </div>
                                <div class="condition">
                                    <img src="Immagini\x_cerchiata.png" class="icon"> 1 numero
                                </div>
                            </div>

                            <div class="checkbox-item allow">
                                <input type="checkbox" name="allow" value="termini">
                                Accetto i <a href="#">Termini e Condizioni</a> di The North Face e dichiaro di aver letto e compreso la <a href="#">Policy sulla Privacy</a> di The North Face.*
                                
                                <br>
                                <br>

                                <input type="checkbox" name="aggiornamenti[]" value="agg">
                                Desidero ricevere aggiornamenti su offerte esclusive,
                                nuovi arrivi e ultime novita' The North Face. Acconsento al
                                trattamento dei miei dati personali per finalita' di marketing profilato, 
                                come descritto nella <a href="#">Policy sulla Privacy</a> di The North Face.               
                            </div>

                            <br>       

                            <div class="xplr-pass">
                                <h2>ISCRIVITI GRATIS AL PROGRAMMA FEDELTA' XPLR PASS</h2>
                                <p>
                                    Unisciti gratuitamente al nostro membership program Explore Pass ed esplora tutto ciò che The North Face ha da offrire, in esclusiva e prima di chiunque altro.
                                </p>
                                <div class="lista-benefici">
                                    <div>
                                        <img src="Immagini\sconto.png">
                                        10% di sconto sul tuo primo ordine di almeno 100 euro*
                                    </div>
                                    <div>
                                        <img src="Immagini\camion.png">
                                        Ricevi la spedizione gratuita su tutti gli ordini. <a href="#">Consulta i Termini.</a>
                                    </div>
                                    <div>
                                        <img src="Immagini\reagalo.png">
                                        Regalo di compleanno speciale.
                                    </div>
                                    <div>
                                        <img src="Immagini\giacca.png">
                                        Offerte e accesso esclusivo.
                                    </div>
                                    <div>
                                        <img src="Immagini\calendario.png" >
                                        Offerte e accesso esclusivo.
                                    </div>
                                    <div>
                                        <img src="Immagini\corsa.png">
                                        Esperienze uniche con i nostri atleti.
                                    </div>
                                </div>
                                <p class="note">
                                    * Troverai il tuo codice promozionale univoco nella mail di benvenuto.
                                </p>
                            </div>

                            <?php 
                                if(isset($error)) 
                                {
                                    foreach($error as $err) {
                                    echo "<div class='errorj'><span>".$err."</span></div>";
                                    }
                                }
                             ?>


                            <input type="submit" class="button2" value="Iscriviti ora">
                            <div class="erore_iscrizione">Attenzione compilare tutti i campi</div>
                        </div>
                </form>
                
        </section>

        <div class="background-due">
                <section class="promo">
                    <p class="prima-scritta-2"><strong>
                    Duffel resistenti progettati <br>per esplorare.</strong></p>

                    <p class="button3"><strong>Acquista ora</strong></p>
                </section>   
        </div>

        <div class="video-container">

            <video autoplay loop muted>
                <source src="Immagini\video.webm" type="video/webm">
            </video>

            <div class="overlay">
               
                <p class="prima-scritta-2"><strong>
                    The North Face® <br>MOUNTAIN JACKET™.</strong></p>

                <p class="seconda-scritta-2">Inimitabile dall'85. Inconfondibile, ovunque tu vada.</p>

                <div id="flex-acquisto">
                
                    <a href="pagina_uomo.php">
                        <p class="button3"><strong>Acquista uomo</strong></p>
                    </a>
                            
                    <p class="button3"><strong>Acquista donna</strong></p>

                </div>
                
            </div>
        </div>
        


        <div id="nero_article">
               <div class="testo-bianco">
                   <strong>Come accedere</strong> 
               </div>

               <div class="margine-laterale">
                
                        <div id="nero_article_flex">
                            <div class="flex-item_article">
                                <img src="Immagini\1.avif">
                                <br>
                                <br><strong>Iscriviti</strong> o <strong>accedi</strong> al tuo
                                <br>account XPLR Pass.
                                <br>
                            </div>

                            <div class="flex-item_article">
                                <img src="Immagini\2.avif">
                                <br>
                                <br>
                                <strong>Dai prova</strong> di quanto conosci
                                <br>la Mountain Jacket con il nostro quiz.

                            </div>

                            <div class="flex-item_article">
                                <img src="Immagini\3.avif">
                                <br>
                                <br>
                                <strong>I vincitori verranno
                                <br>contattati via email.</strong>
                            </div>

                        </div>
                    
                </div>

                <div class="testo-bianco2">
                    <br><br><strong><a href="daInserire"> Offerta soggetta a termini e condizioni</a></strong>
                    <div id="daNascondere">
                        <br><br><br><br><img id="xplr-pass-logo" src="Immagini\xplr-pass-logo.svg">
                    </div> 
                    
                </div>
            
        </div>


    <div>
        <div id="flex-con-due-foto">

                <div class="foto-flex">
                    <img class="immagini-foto-flex" src="Immagini\scalatore.avif">
                    <br> <br> <span class="Scritta"> <strong>Preparati per ogni sentiero. </strong></span>
                    <br> <span class="button">Acquista donna      </span>
                    <a href="pagina_uomo.php">
                        <p class="button"><strong>Acquista uomo</strong></p>
                    </a>
                    
                </div>

                <div class="foto-flex">
                    
                 <img class="immagini-foto-flex" src="Immagini\scarpe.avif">
                 <br> <br> <span class="Scritta"> <strong>Scarpe progettate per terreni tecnici. </strong></span>
                 <br> <span class="button">Acquista donna      </span>
                    <a href="pagina_uomo.php">
                        <p class="button"><strong>Acquista uomo</strong></p>
                    </a>
                </div>

        </div>
    </div>
        

    <div class="margine">

        <div>
            <p id="In-evidenza">In evidenza </p>
        </div>

          <div id="flex-4-foto">

            <div class="foto-flex-4-foto">
                <img src="Immagini\4-foto-nuova-fronte1.avif" data-src-orig="Immagini\4-foto-nuova-fronte1.avif" data-src-alt="Immagini\4-foto-nuova-retro1.avif" class="immagini-foto-flex-4">
                <br><br>
                <span class="button2"><strong>Summit Climb donna</strong></span>
            </div>
            
            <div class="foto-flex-4-foto">
                <img src="Immagini\4-foto-nuova-fronte2.avif" data-src-orig="Immagini\4-foto-nuova-fronte2.avif" data-src-alt="Immagini\4-foto-nuova-retro2.avif" class="immagini-foto-flex-4">
                <br><br>
                <span class="button2"><strong>Summit Climb uomo</strong></span>
            </div>
            
            <div class="foto-flex-4-foto">
                <img src="Immagini\4-foto-nuova-fronte3.avif" data-src-orig="Immagini\4-foto-nuova-fronte3.avif" data-src-alt="Immagini\4-foto-nuova-retro3.avif" class="immagini-foto-flex-4">
                <br><br>
                <span class="button2"><strong>Summit Climb bambino</strong></span>
            </div>
            
            <div class="foto-flex-4-foto">
                <img src="Immagini\4-foto-nuova-fronte4.avif" data-src-orig="Immagini\4-foto-nuova-fronte4.avif" data-src-alt="Immagini\4-foto-nuova-retro4.avif" class="immagini-foto-flex-4">
                <br><br>
                <span class="button2"><strong>Zaini Summit Climb</strong></span>
            </div>


        </div>


    </div>


    <div>
        <p id="testo_notizia">Sei interessato alla ricerca di qualche news? Prova qui!</p>
        <form class="cerca_news" id="cerca_news">
          <input type="text" id="search-input" placeholder="Prova a cercare the north face... " />
          <input type="submit" class="button" value="Cerca" />
        </form>
      
        
        <div class="contenitore-notizie">
            <img src="Immagini/X_chiusura.png" id="chiudi-notizie">
            <section id="new"></section>
        </div>
    </div>



    <div class="album-app">
        <section id="album-container">
                <h1>
                    L'avventura inizia con il look giusto e la playlist perfetta
                    <img src="Immagini/spotify.png" id="immagine_spotify">
                <h1>
            <form>
                <textarea id="album" placeholder="Cerca un album..."></textarea>
                <button type="submit" class="button">Cerca</button>
            </form>
            
                <section id="album-view"></section>
        </section>
      </div>



    
      <div class="container-map">
        <div id="weather-box">
            <h1>Meteo attuale</h1>
            <p class="subtitle">Clicca su "Cerca" per avere le informazioni meteo di Catania</p>
            <form>
                <button type="submit" class="button4">Cerca</button>
            </form>
        </div>
    </div>
    

</article>

    


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
                            <input type="text" class="email2" placeholder="Inserisci la tua email*">
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

</html>