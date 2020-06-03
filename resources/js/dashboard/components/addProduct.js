import { apiService } from '../_services/apiService.js';
import { authenticationService } from '../_services/authentication.service'
export default {
    props: {
        confitures: {
            default: function () {
                return {}
            }
        },

        modifier: {
            default: false
        },
    },

    data() {
        return {


            query: '',

            producteur: {},
            producteurs: [],

            resultFruits: {},
            itemsFruits: [],

            dialog: false,
            snackbar: false,
            search: null,
            loading: false,
            text: '',
            timeout: 3000,

            id_producteur: '',
            id_producteurRules: [
                v => !!v || 'Un Producteur est requise',
            ],
            name: '',
            nameRules: [
                v => !!v || 'Un nom de produit est requis',
                v => (v && v.length <= 25) || 'Le nom ne doit pas être supérieure à 25 Caractères',
            ],
            prix: '',
            prixRules: [
                v => !!v || 'Un prix est requise',
            ],
            fruits: '',
            fruitsRules: [
                v => !!v || 'Un fruit ou plusieurs est requise',
            ],
            id: '',

            acfruits: [],
            listFruits: [],

            image: '',
            isProducteur: authenticationService.isProducteur,

        }
    },
    watch: {
        search: function (val) {
            if (val && val.length > 1) {

                this.loading = true
                apiService.get('/api/acfruits', { params: { query: val } })
                    .then(({ data }) => {
                        this.loading = false;
                        data.forEach(product => {
                            this.listFruits.push(product)

                        });

                    });
            }
        },
    },
    methods: {
        ajout() {
            // le fruit doit avoir soit id et name soit juste name

            let dataToAdd = {
                id_producteur: this.producteur.id,
                name: this.name,
                prix: this.prix,
                fruit: this.acfruits,
                image: this.image,
                id: this.id == '' ? '' : this.id,

            }
            if (!this.isProducteur) {
                dataToAdd['id_producteur'].this.producteur
            }

            let url = this.isProducteur ? "/api/producteurs/confitures" : "/api/"
            apiService.post(url, dataToAdd).then(response => {
                console.log(response.data);
                // this.dialog = false;
                // this.$emit('addProduct', response.data.data)
                // this.snackbar = true;
                // if (!this.modifier) {

                //     this.text = 'Le produit a bien été ajouté'
                // }
                // else if (this.modifier) {
                //     this.text = 'Le produit a bien été modifier'
                // }
            }).catch()

        },

        editConfiture() {
            this.image = this.confitures.image
            this.id = this.confitures.id
            this.name = this.confitures.name
            this.prix = this.confitures.prix
            if (!this.isProducteur) {
                this.producteur = this.confitures.id_producteur
            }
            this.acfruits = this.confitures.fruit
            _.merge(this.listFruits, this.acfruits)

        },


        getProducteur() {
            if (!this.isProducteur) {
                apiService.get("/api/producteurs").then(({ data }) =>
                    data.data.forEach(data => {
                        this.producteurs.push(data);
                    })
                );

            }
        },


        onFileChange(file) {

            let reader = new FileReader;

            reader.onload = (file) => {
                this.image = file.target.result;
            };
            reader.readAsDataURL(file);
        },

        removeImg() {
            this.confitures.image = "";
            this.image = "";
        }

    },


    created() {

        this.getProducteur();
    }
}