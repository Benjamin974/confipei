import { EventBus } from '../eventBus'
import { panierServices } from '../_services/panier.service'
import { apiService } from '../_services/apiService'
import {authenticationService} from '../_services/authentication.service'
export default {
    data() {
        return {
            basketContenu: [],
            basket: [],
            itemPanier: [],
            id: [],
            quantite: [],
            itemConfiture: {}
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

        // commander() {
        //     panierServices.sendCommande()
        // },
        
        commander() {
            if (!authenticationService.currentUser) {
                this.$router.push('/login')
            } else {
                this.$router.push('/confirmation')
                // panierServices.sendCommande()
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
        },
    }


}