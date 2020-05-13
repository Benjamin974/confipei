import Axios from "axios"
import SearchFruits from '../components/SearchFruits.vue';

export default {
    components: {
        SearchFruits
    },

    props: {
        default: {
            selectProducteur: {},
        },
    },
    data() {
        return {
            query: '',
            results: [],
            valeurProducteur: {},
            resultFruits: {},
            // selectProducteur: {},
            itemsProducteur: [],
            itemsFruits: [],
            dialog: false,
            snackbar: false,
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

            acfruits: [],
            search: null,
            loading: false,
            listFruits: [],

        }
    },
    watch: {
        search: function (val) {
            if (val && val.length > 1) {

                this.loading = true
                axios.get('/api/acfruits', { params: { query: val } })
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
            axios.post('/api/confitures/', {
                id_producteur: this.selectProducteur.id,
                name: this.name,
                prix: this.prix,
                fruit: this.listFruits

            }).then(response => {
                this.dialog = false;
                this.$emit('addProduct', response.data.data)
                this.snackbar = true;
                this.text = 'Le produit a bien été ajouté'
            }).catch()
        },

        createFruit($val) {
            console.log($val)
        },

        

        recupId() {
            // console.log(Object.values(this.items));
            this.valeurProducteur = {};
            Axios.get('/api/confitures')
                .then(({ data }) => {
                    // console.log(data.data);
                    data.data.forEach(_confitures => {
                        this.valeurProducteur = Object.create({}, { name: { value: _confitures.id_producteur.name }, id: { value: _confitures.id_producteur.id } });
                        this.itemsProducteur.push(this.valeurProducteur);

                    })

                })
                .catch();

        },

        viewFruits() {

            axios.get('/api/fruits')
                .then(({ data }) => {
                    data.forEach(product => {
                        // console.log(product.name)
                        this.resultFruits = Object.create({}, { name: { value: product.name }, id: { value: product.id } });
                        // console.log(this.resultFruits);
                        this.itemsFruits.push(this.resultFruits);

                    });

                });
        },
    },


    created() {
        this.recupId();
        this.viewFruits();
        console.log(this.itemsFruits);
    }
}