import {authenticationService} from '../_services/authentication.service'
import {apiService} from '../_services/apiService'

export default {
    data() {
        return {
            producteurs: []
        }
    },

    created() {
        authenticationService.currentUser.subscribe(x => (this.currentUser = x));
        this.getProducteurs();
    },

    methods: {
        getProducteurs() {
            apiService.get('/api/' + this.currentUser.id + '/producteurs').then(({data}) => {
                data.data.forEach(_producteurs => {
                    this.producteurs.push(_producteurs);
                })
            })
        }
    }

}