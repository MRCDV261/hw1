
function onClickFrecciaHeader() {
    indice = (indice + 1) % scritte.length;
    testo.textContent = scritte[indice];

    for (let i = 0; i < palline.length; i++) {
        if (i === indice) {
            palline[i].classList.add('pallina-attiva');
        } else {
            palline[i].classList.remove('pallina-attiva');
        }
    }
}

const scritte = [
    "SCONTO EXTRA DEL 10% SU OUTLET, INSERISCI IL CODICE OUTLET10, ACQUISTA ORA",
    "UNISCITI A XPLR PASS E RICEVI IL 10% DI SCONTO SUL TUO PRIMO ORDINE"
];
var indice = 0;

const testo = document.querySelector('.flex-item_header');
const freccia = document.querySelectorAll('.immagine_freccia');
const palline = document.querySelectorAll('.pallina'); 

for (let item of freccia) {
    item.addEventListener('click', onClickFrecciaHeader);
}

palline[indice].classList.add('pallina-attiva');



function mostraProdotti(json) {
    console.log("prodotti uomo in formato json");
    console.log(json);
    const container = document.getElementById('flex-4-foto');
    container.innerHTML = '';
    for (const prodotto of json) {
        const div = document.createElement('div');
        div.className = 'foto-flex-4-foto';

        const link = document.createElement('a');
        link.href = "prodotto.php?id=" + prodotto.id;

        const img = document.createElement('img');
        img.src = prodotto.immagine;
        img.alt = prodotto.prodotto;
        img.className = "immagini-foto-in-vendita";
        link.appendChild(img);

        const prezzo = document.createElement('p');
        prezzo.innerHTML = `<strong><span>${parseFloat(prodotto.prezzo).toFixed(2)} €</span></strong>`;

        div.appendChild(link);
        div.appendChild(prezzo);

        container.appendChild(div);
    }
}

function responseProdottiUomo(response) {
    return response.json();
}

fetch('prodotti_uomo_data.php')
    .then(responseProdottiUomo)
    .then(mostraProdotti);
