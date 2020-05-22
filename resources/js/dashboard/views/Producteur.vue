<template>
  <v-container>
    <v-card-title v-for="(_name,key) in name" :key="key">
      {{ _name.name }}
    </v-card-title>
    <v-row>
      <v-col v-for="(confiture,key) in confitures" :key="key" cols="12" sm="6" md="4" lg="4">
        <v-card>
          <v-card-title class="subheading font-weight-bold">{{ confiture.name }}</v-card-title>
          <v-img :src="confiture.id_photo.photo" height="200px"></v-img>

          <v-card-subtitle v-if="listFruits != null">{{recupFruits(confiture.fruit)}}</v-card-subtitle>
          <v-divider></v-divider>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script src="./producteur.js" />
