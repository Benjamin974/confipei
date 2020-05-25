import Axios from 'axios';
export default {
    data: () => ({
        confitures: [],
        acfruits: [],
        listFruits: [],
        name: [],
    }),

    methods: {
        initializeConfiture() {
            Axios.get("/api/producteurs/" + this.$route.params.id).then(({ data }) =>
                data.data.forEach(_data => {
                    this.confitures.push(_data);
                    
                })
            )
           
        },
        recupName() {
            Axios.get("/api/producteurs/" + this.$route.params.id + '/name').then((response) => {
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