import NbreProduits from '../components/NbreProduits'
import {apiService} from '../_services/apiService'
import Panier from '../components/Panier.vue'
export default {
    components: {
        Panier,
        NbreProduits
    },

    data() {
        return {
            confitures: []
        }
    },

    created() {
        this.addDatas();
    },

    methods: {
        addDatas() {
            apiService.get('/api/').then(({ data }) => {
                data.data.forEach(_confitures => {
                    this.confitures.push(_confitures)
                })
            })
        }
    }
}