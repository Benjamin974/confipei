import Axios from 'axios';
import AddProduct from '../components/AddProduct.vue';

export default {
    components: {
        AddProduct,
    },
    data: () => ({
        dialog: false,
        headers: [{
            text: "Confitures",
            align: "start",
            sortable: false,
            value: "produit"
        },
        { text: "producteurs", value: "id_producteur" },
        { text: "fruits", value: "fruit" },


        ],
        datas: [],

    }),
    created() {
        this.initialize();
    },

    methods: {
        initialize() {
            Axios.get("/api/confitures").then(({ data }) =>
                data.data.forEach(_data => {
                    this.datas.push(_data);
                })
            );
        },

        recupFruits(items) {
            let fruits = [];
            items.forEach(item => {
                fruits.push((item.name))
            })
            return fruits.join(', ');
        }

    }

}