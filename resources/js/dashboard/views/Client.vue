<template>
  <v-container>
    <v-card>
      <h1 class="text-center">INFORMATION DU CLIENT CONNECTÉ</h1>
      <v-card-text>Nom : {{this.currentUser.name}}</v-card-text>
      <v-card-text>Email : {{this.currentUser.email}}</v-card-text>

    <v-card-title class="text-align-center"> Les producteurs du client </v-card-title>
      <v-row>
        <v-col md="6" v-for="(producteur, key) in producteurs" :key="key">
          <v-card class="mx-auto" max-width="344">
            <v-card-text>
              <div>Producteur n° {{producteur.id}}</div>
              <p class="display-1 text--primary">{{producteur.name}}</p>
            </v-card-text>
          </v-card>
        </v-col>
      </v-row>
    </v-card>
  </v-container>
</template>

<script src="./client.js">
</script>