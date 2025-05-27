function mostraCarrello(json) {
    const lista = document.querySelector('.lista-prodotti');
    const messaggio = document.querySelector('.area-messaggio');
    const totale = document.querySelector('.totale-carrello');
    lista.innerHTML = '';

    if (json.cartItems.length === 0) {
        messaggio.classList.add('visibile');
        totale.textContent = "0.00€";
        return;
    }
    

    for (const item of json.cartItems) {
        const prodotto = document.createElement('div');
        prodotto.classList.add('prodotto-carrello');

        const img = document.createElement('img');
        img.src = item.immagine;
        img.alt = item.prodotto;

        const dettagli = document.createElement('div');
        dettagli.classList.add('dettagli-prodotto');

        const titolo = document.createElement('h3');
        titolo.textContent = item.prodotto;

        const prezzo = document.createElement('p');
        prezzo.textContent = "Prezzo: " + item.prezzo + "€";

        const quantità = document.createElement('p');
        quantità.textContent = "Quantità: " + item.quantità;

        const totaleProd = document.createElement('p');
        totaleProd.textContent = "Totale: " + item.totale + "€";

        dettagli.appendChild(titolo);
        dettagli.appendChild(prezzo);
        dettagli.appendChild(quantità);
        dettagli.appendChild(totaleProd);

        const divBottoneRimuovi = document.createElement('div');
        const bottone = document.createElement('button');
        bottone.classList.add('remove-item-btn');
        bottone.dataset.productId = item.id;
        bottone.textContent = "Rimuovi un elemento";
        bottone.addEventListener('click', removeFromCart);

        divBottoneRimuovi.appendChild(bottone);

        prodotto.appendChild(img);
        prodotto.appendChild(dettagli);
        prodotto.appendChild(divBottoneRimuovi);

        lista.appendChild(prodotto);
    }

    totale.textContent = json.totaleCarrello + "€";
}

function responseCarrello(response) {
    return response.json();
}

function aggiornaCarrello() {
    fetch('carrello_data.php').then(responseCarrello).then(mostraCarrello);
}



function mostraRimozione(json) {
    console.log("risposta rimozione carrello in formato json");
    console.log(json);
    if (json.success) {
        aggiornaCarrello();
    } 
}

function responseRimozione(response) {
    return response.json();
}


function removeFromCart(event) {
    const button = event.currentTarget;
    const cartId = button.dataset.productId;

    fetch('rimuovi_from_cart.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ cart_id: cartId })
    })
    .then(responseRimozione)
    .then(mostraRimozione)
}


aggiornaCarrello();