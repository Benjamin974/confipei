import Vue from 'vue';
import Vuetify from 'vuetify';
import Routes from './route.js';
import Layout from './layouts/Layout.vue';
import 'vuetify/dist/vuetify.min.css';
import _ from 'lodash';
import LoadScript from 'vue-plugin-load-script';

Vue.use(LoadScript)
Vue.use(Vuetify);

const app = new Vue({
    el: '#admin',
    vuetify: new Vuetify({}),
    router: Routes,
    components: { Layout }
})


export default new Vuetify(app);