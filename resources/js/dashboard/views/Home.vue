<template>
  <v-app>
    <v-container>
      <h1 class="text-center pb-5">Accueil CONFIPEI</h1>
      <v-row>
        <v-col v-for="(confiture,key) in confitures" :key="key" md="4">
          <nbreProduits :confiture="confiture"></nbreProduits>
        </v-col>
      </v-row>
    </v-container>
  </v-app>
</template>
<script src="./home.js"></script>