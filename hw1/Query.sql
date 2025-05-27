CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    cognome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);


CREATE TABLE if NOT EXISTS prodotti_in_vendita(
	id INTEGER PRIMARY KEY, 
	prodotto VARCHAR(255) NOT NULL, 
	prezzo DOUBLE NOT NULL,
	immagine VARCHAR(255), 
	descrizione VARCHAR(255)
);


CREATE TABLE IF NOT EXISTS prodotti_in_vendita_con_cambio (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    prodotto VARCHAR(255) NOT NULL, 
    prezzo DOUBLE NOT NULL, 
    immagine1 VARCHAR(255), 
    immagine2 VARCHAR(255),
    descrizione VARCHAR(255)
);


CREATE TABLE if NOT exists carrello(
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    product_id INT NOT NULL,
    quantità INT NOT NULL,
    
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (product_id) REFERENCES prodotti_in_vendita(id)
);

