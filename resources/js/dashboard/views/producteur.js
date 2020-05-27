import {apiService} from '../_services/apiService.js';

export default {
    data: () => ({
        headers: [{
            text: "Confitures",
            align: "start",
            sortable: false,
            value: "produit"
        },
        { text: "fruits", value: "fruit" },
        { text: "photos", value: "image" },
        { text: "actions", value: "actions" },



        ],
        editedItem: {
            Confitures: '',
            fruits: '',
            photos: '',
        },
        confitures: [],
        acfruits: [],
        listFruits: [],
        name: [],
    }),

    methods: {
        initializeConfiture() {
            apiService.get("/api/producteurs/" + this.$route.params.id).then(({ data }) =>
                data.data.forEach(_data => {
                    this.confitures.push(_data);
                    
                })
            )
           
        },
        recupName() {
            apiService.get("/api/producteurs/" + this.$route.params.id + '/name').then((response) => {
                this.name.push(response.data.data);
            })
        },
        recupFruits(items) {
            let fruits = [];
            items.forEach(item => {
                fruits.push((item.name))
            })
            return fruits.join(', ');
        },
    },

    created() {
        this.initializeConfiture();
        this.recupName();
    }
}