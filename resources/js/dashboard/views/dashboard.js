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
        { text: "photos", value: "id_photo" },
        { text: "actions", value: "actions" },



        ],
        editedItem: {
            Confitures: '',
            producteurs: '',
            fruits: '',
            photos: '',
        },
        confitures: [],
        showModal: false,
        photo: '',

    }),
    created() {
        this.initialize();
    },

    methods: {
        initialize() {

            Axios.get("/api/confitures").then(({ data }) =>
                data.data.forEach(_data => {
                    this.confitures.push(_data);
                })
            );
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

        onFileSelected(e) {
            let files = e.target.files || e.dataTransfer.files;
            this.createImg(files[0]);
        },
        createImg(file) {
            let reader = new FileReader;

            reader.onload = (e) => {
                this.photo = e.target.result;
            };
            reader.readAsDataURL(file);
        },

        greet: function uploadImg() {
            axios.post('/api/confitures/image/', {
                photo: this.photo,
            })
                .then(function ({ data }) {
                    console.log(data);
                })
                .catch(function (error) {
                    console.log(error);
                });

        },

        removeImg() {
            this.photo = "";
        }

    },

}