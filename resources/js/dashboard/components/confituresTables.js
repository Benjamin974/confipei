import AddProduct from '../components/AddProduct.vue';
import { apiService } from '../_services/apiService.js';
import { authenticationService } from '../_services/authentication.service';
export default {

    components: {
        AddProduct,
    },
    data: () => ({
        dialog: false,
        avaluableHeaders: {
            confitures: { text: "Confitures", align: "start", sortable: false, value: "produit" },
            producteur: { text: "Producteurs", value: "producteur" },
            fruits: { text: "fruits", value: "fruit" },
            photos: { text: "photos", value: "image" },
            actions: { text: "actions", value: "actions" },

        },



        editedItem: {
            Confitures: '',
            producteurs: '',
            fruits: '',
            photos: '',
        },
        confitures: [],
        showModal: false,

    }),
    created() {
        this.initialize();
        this.setHeaders();
    },

    methods: {
        initialize() {
            let url = authenticationService.isProducteur ? "/api/producteurs/confitures" : "/api/";
            apiService.get(url).then(({ data }) =>
                data.forEach(_data => {
                    this.confitures.push(_data);
                })
            );
        },

        setHeaders() {
            if (authenticationService.isProducteur) {
                this.headers = [
                    this.avaluableHeaders.confitures,
                    this.avaluableHeaders.fruits,
                    this.avaluableHeaders.photos,
                    this.avaluableHeaders.actions
                ]
            }
            else {
                this.headers = [
                    this.avaluableHeaders.confitures,
                    this.avaluableHeaders.producteur,
                    this.avaluableHeaders.fruits,
                    this.avaluableHeaders.photos,
                    this.avaluableHeaders.actions
                ]
            }
        },

        recupFruits(items) {
            let fruits = [];
            items.forEach(item => {
                fruits.push((item.name))
            })
            return fruits.join(', ');
        },

        editItem(item) {
            this.editedItem = Object.assign({}, item);
            this.dialog = true
        },

        deleteItem(item) {
            console.log(item);
        },


    },

}