<template>
  <v-container>
    <v-autocomplete
      v-model="acfruits"
      :loading="loading"
      :items="listFruits"
      item-value="name"
      item-text="name"
      :search-input.sync="search"
      hide-no-data
      hide-details
      multiple
      label="fruit"
      @change="filterFruit"
    ></v-autocomplete>

    <template>
      <v-row>
        <v-col v-for="(confiture,key) in productsDisplay" :key="key" cols="12" sm="6" md="4" lg="4">
          <v-card>
            <v-card-title class="subheading font-weight-bold">{{ confiture.name }}</v-card-title>
            <v-img :src="confiture.id_photo.photo" height="200px"></v-img>
            <v-card-text> Le producteur : <v-btn class="mr-4" :to="'/producteur/' + confiture.id_producteur.id">{{confiture.id_producteur.name}}</v-btn></v-card-text>
            <v-card-subtitle v-if="listFruits != null"> Les fruits : {{recupFruits(confiture.fruit)}}</v-card-subtitle>
            <v-divider></v-divider>
          </v-card>
        </v-col>
      </v-row>
    </template>
  </v-container>
</template>

<script src="./cartesConfitures.js"></script>

