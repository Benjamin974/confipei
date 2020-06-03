import { panierServices } from '../_services/panier.service';

export default {

    data() {
        return {
            quantite: 0,
            snackbar: false,
            text: "",
            timeout: 3000,
            confitures: [],
            badge: []
        }
    },

    props: {
        confiture: {
            required: true,
        }
    },


    methods: {

        commander() {
            panierServices.ajouter(this.confiture, this.quantite)
            this.snackbar = true;
            this.text = "Vous avez commandé " + this.quantite + " produit";
            this.quantite = 0
        },

        
    },
}