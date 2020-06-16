import { panierServices } from '../_services/panier.service'
import StepperLivraison from '../components/StepperLivraison.vue'
import { VStripeCard } from 'v-stripe-elements/lib'
export default {
    components: {
        StepperLivraison,
        VStripeCard
    },

    data() {
        return {
            panel: [0],

            //Paiement

            api_key: 'pk_test_51GubeaLTuGpOG6PVMN9uu3od5LyacADhSTcUYfvBlEdn4rUplbdv6rZXZq5ePvjjv2xzvGAXaFFsltbkdmvSbfVS00oCMKX8X2',
            source: null,

            // Commande

            commande: {
                commandeList: {},
                livraison: {
                    nom: '',
                    prenom: '',
                    pays: '',
                    ville: '',
                    adresse: '',
                    code_postal: '',
                },
                facturation: {
                    nom: '',
                    prenom: '',
                    pays: '',
                    ville: '',
                    adresse: '',
                    code_postal: '',
                },
            },

            e1: 1,
            selectable: false,
        }
    },
    created() {
        this.getBasket();
    },

    methods: {
        getBasket() {
            this.commande.commandeList = panierServices.getBasket();
        },

        cancel() {
            if (confirm('Voulez annuler la commande ?')) {
                this.$router.push('/panier')
            }

        },

        getDatasInput() {
            if (!this.selectable) {
                _.assign(this.commande.facturation, this.commande.livraison)
            }

            this.e1 = 3
        },

        process() {
            // panierServices.sendCommande(this.commande)
            console.log(this.source)
            // e1 = 1
        },

        submitPaymentMethod() {
            console.log('toto');
        },

    }
}