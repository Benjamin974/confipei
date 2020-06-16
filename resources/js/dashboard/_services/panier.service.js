import { EventBus } from '../eventBus'
import { apiService } from '../_services/apiService'
export const panierServices = {
    ajouter,
    quantiteBasketSize,
    getBasket,
    emitBasket,
    replaceQuantity,
    sendCommande

}

function ajouter(confiture, quantite) {
    let basket = getBasket();

    if (!_.hasIn(basket, buildkey(confiture))) {
        basket[buildkey(confiture)] = {
            id: confiture.id,
            name: confiture.name,
            quantite: parseInt(quantite),
            price: confiture.prix
        }
    }
    else {
        basket[buildkey(confiture)].quantite += parseInt(quantite)
    }
    storeBasket(basket)
}

function replaceQuantity(confiture) {
    let basket = getBasket()
    if (_.hasIn(basket, buildkey(confiture))) {
        basket[buildkey(confiture)] = confiture
        if ((basket[buildkey(confiture)].quantite) == 0) {
            _.unset(basket, buildkey(confiture))
        }
    }
    else {
        throw 'err'
    }
    storeBasket(basket)
}

function buildkey(confiture) {
    return 'confiture_' + confiture.id
}

function getBasket() {
    let basket = localStorage.getItem('currentBasket');
    if (!basket) {
        basket = {}
    } else {
        basket = JSON.parse(basket)
    }

    return basket
}

function storeBasket(basket) {
    localStorage.setItem('currentBasket', JSON.stringify(basket));
    EventBus.$emit('basket', basket)
    emitBasketSize(basket)

}

function emitBasketSize(basket) {
    let basketSize = _.toPairs(basket).length;
    EventBus.$emit('longueurpanier', basketSize);
}

function emitBasket() {
    let basket = getBasket()
    return basket
}

function quantiteBasketSize() {
    let quantite = getBasket()
    quantite = _.toPairsIn(quantite).length
    return quantite
}

function sendCommande(commande) {
    let basket = getBasket()
    let commandeList = []
    for (let key in basket) {
        let item = {
            id: basket[key].id,
            quantite: basket[key].id
        }
        commandeList.push(item)
    }
    apiService.post('/api/commande', {
        order: commande.commandeList,
        adresseLivraison: commande.livraison,
        adresseFacturation: commande.facturation
    }).then(({data}) => {
        console.log(data)
    });
}