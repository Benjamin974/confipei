<template>
  <v-tabs fixed-tabs background-color="deep-purple" color="deep-purple" dark>
    <v-tab>
      <v-btn class="mr-4 deep-purple" to="/">Accueil</v-btn>
    </v-tab>
    <v-tab>
      <v-btn class="mr-4 deep-purple" to="/dashboard">Dashboard</v-btn>
    </v-tab>
    <v-tab>
      <v-btn class="mr-4 deep-purple" to="/confitures">Confitures</v-btn>
    </v-tab>
    <v-tab>
      <v-btn class="mr-4 deep-purple" to="/dashboardproducteur">Producteur</v-btn>
    </v-tab>
    <v-tab v-if="isChecked">
      <v-btn class="mr-4 deep-purple" :to="'/client/' + this.currentUser.id">Profil</v-btn>
    </v-tab>
    <v-tab>
      <panier></panier>
    </v-tab>
    <v-tab>
      <v-btn v-if="!isChecked" v-on:click="show" class="mr-4" to="/login">
        <v-icon class="mr-1">mdi-login</v-icon>Login
      </v-btn>

      <v-btn v-if="isChecked" @click="logout" class="nav-item nav-link">
        <v-icon class="mr-1">mdi-logout</v-icon>Logout
      </v-btn>
    </v-tab>
  </v-tabs>
</template>

<script>
import Panier from "../components/Panier";
import { authenticationService } from "../_services/authentication.service";
import { Role } from "../_helpers/role";
import router from "../route";
export default {
  components: {
    Panier
  },

  data() {
    return {
      currentUser: null
    };
  },

  computed: {
    isChecked() {
      return this.currentUser;
    }
  },

  methods: {
    logout() {
      authenticationService.logout();
      router.push("/login");
    },
    show: function() {
      this.isDisplay = true;
    },
    hide: function() {
      this.isDisplay = false;
    }
  },

  created() {
    authenticationService.currentUser.subscribe(x => (this.currentUser = x));
  }
};
</script>
