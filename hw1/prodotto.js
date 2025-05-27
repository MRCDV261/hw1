function onResponse(response) {
  console.log("Risposta ricevuta");
  return response.json();
}

function onJson(json) {
  console.log(json);
  if (json.success) {
    alert("Prodotto aggiunto al carrello");
  } else {
    alert("Errore: " + json.error);
  }
}

function aggiungiAlCarrello(event) {
  const bottone = event.currentTarget;
  const productId = bottone.dataset.productId;

  fetch("add_to_cart.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json"
    },
    body: JSON.stringify({
      product_id: productId,
      quantity: 1
    })
  })
  .then(onResponse)
  .then(onJson);
}

const bottoneAggiungi = document.querySelector(".aggiungi-al-carrello");
bottoneAggiungi.addEventListener("click", aggiungiAlCarrello);






function mostraNotificaCarrello() {
  const notifica = document.querySelector('#notifica-carrello');
  notifica.classList.remove('hidden');
}

const pulsanteCarrello = document.querySelector('#bottone-carrello');
pulsanteCarrello.addEventListener('click', mostraNotificaCarrello);
