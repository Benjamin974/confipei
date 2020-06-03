import { EventBus } from '../eventBus'
import { panierServices } from '../_services/panier.service'
export default {
    data() {
        return {
            quantite: 0,
            itemPanier: [],
        }
    },


    created() {
        this.getBasket();

    },

    methods: {
        getBasket() {
            this.quantite = panierServices.quantiteBasketSize()
            this.initTable(panierServices.getBasket());
            EventBus.$on('longueurpanier', (quantite) => {
                this.quantite = quantite
                this.initTable(panierServices.getBasket());
            })

        },

        initTable(itemPanier) {
            this.itemPanier = []
            let counter = 0;
            let BreakException = {}
            try {
                for (let key in itemPanier) {
                    let item = itemPanier[key]
                    this.itemPanier.push(item)
                    counter++
                    if (counter === 3) {
                        throw BreakException
                    }
                }
            }
            catch (e) {
                if (e !== BreakException) {
                    throw e
                }
            }
        },
        updateQuantity(confiture) {
            if (confiture.quantite == 0) {
                if (confirm('êtes vous sur de vouloir supprimer ce produit ?')) {
                    panierServices.replaceQuantity(confiture)
                } else {
                    confiture.quantite += 1
                }
            }
        }
    }
}