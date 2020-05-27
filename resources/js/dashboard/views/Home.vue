<template>
  <v-app>
    <v-container>
      <h1 class="text-center"> Toto est à l'accueil </h1>
    </v-container>
  </v-app>
</template>

<script>
import { authenticationService } from "../_services/authentication.service";
import { Role } from "../_helpers/role";
import router from "../route";
import Axios from 'axios';
export default {
  methods: {
    getUser() {
       Axios.get("/api/user", {headers: {Authorization: `Bearer ${this.currentUser.token}`}}).then((data) =>
                console.log(data)
            ).catch((error) =>
            console.log(error)
            );
    }
  },

  created() {
    authenticationService.currentUser.subscribe(x => (this.currentUser = x));
    this.getUser();
  }
}
</script>