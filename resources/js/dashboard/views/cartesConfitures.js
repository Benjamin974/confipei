import Axios from 'axios';

export default {
    data: () => ({
        show: false,
        search: '',
        loading: false,
        confitures: [],

        acfruits: [],
        listFruits: [],
        productsDisplay: [],

        filter: {},
        sortDesc: false,
        sortBy: 'Name',
        keys: [
            'name',
            'id_photo',
            'id_producteur'

        ],

    }),

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
        initializeConfiture() {
            Axios.get("/api/confitures").then(({ data }) =>
                data.data.forEach(_data => {
                    this.confitures.push(_data);
                })
            )
            this.productsDisplay = this.confitures;
        },
        recupFruits(items) {
            let fruits = [];
            items.forEach(item => {
                fruits.push((item.name))
            })
            return fruits.join(', ');
        },

        filterFruit() {

            this.productsDisplay = [];
            let _productsDisplay = [];
            if (_.isEmpty(this.acfruits)) {
                this.productsDisplay = this.confitures
            }
            else {
                this.confitures.forEach(confiture => {
                    if (confiture) {
                        let _confiture = confiture;
                        confiture.fruit.forEach(_fruit => {
                            if (_.includes(this.acfruits, _fruit.name)) {

                                _productsDisplay[_confiture.id] = _confiture

                            }
                        })
                    }
                    
                })
                _productsDisplay.forEach(_confiture => {
                    this.productsDisplay.push(_confiture);
                })
            }
        }

    },

    created() {
        this.initializeConfiture();
    }

}