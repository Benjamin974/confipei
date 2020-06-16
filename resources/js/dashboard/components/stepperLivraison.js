export default {
    props: {
        e1: {
            default: function () {
                return {}
            }
        }
    },
    data() {
        return {
            // livraison
            nom: '',
            prenom: '',
            pays: '',
            ville: '',
            adresse: '',
            code_postal: '',

            //facturation
            nom_facturation: '',
            prenom_facturation: '',
            pays_facturation: '',
            ville_facturation: '',
            adresse_facturation: '',
            code_postal_facturation: '',

            selectable: false,
        }
    },

    methods: {
        getDatas() {
            this.nom_facturation = this.nom
            this.prenom_facturation = this.prenom
            this.pays_facturation = this.pays
            this.ville_facturation = this.ville
            this.adresse_facturation = this.adresse
            this.code_postal_facturation = this.code_postal
            console.log(this.nom_facturation)

        }
    }
}