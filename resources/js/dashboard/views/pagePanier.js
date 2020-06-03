import { EventBus } from '../eventBus'
import { panierServices } from '../_services/panier.service'

export default {
    data() {
        return {
            basketContenu: [],
            basket: [],
            itemPanier: [],
        }
    },

    created() {
        this.getPanier();
        EventBus.$on('basket', basket => {
            this.basket = basket
        })
    },

    methods: {
        getPanier() {
            this.basket = panierServices.getBasket();
        },

        updateQuantity(confiture) {
            if (confiture.quantite == 0) {
                if (confirm('êtes vous sur de vouloir supprimer ce produit ?')) {
                    panierServices.replaceQuantity(confiture)
                } else {
                    confiture.quantite += 1
                }
            }
        },
    }


}