<template>
  <v-container>
    <v-card-title v-for="(_name,key) in name" :key="key">
      Nom de l'utilisateur : {{_name.id_user.name}}
      <br>
       Nom du producteur : {{ _name.name }}
    </v-card-title>

      <div width="80%">
    <v-data-table :headers="headers" :items="confitures" class="elevation-4" :items-per-page="15">
      <template v-slot:item.produit="{ item }">{{item.name}}</template>
      <template v-slot:item.fruit="{ item }">{{recupFruits(item.fruit)}}</template>
      <template v-slot:item.image="{ item }">
        <v-img :src="item.image" aspect-ratio="1.7"></v-img>
      </template>
    </v-data-table>
  </div>
  </v-container>
</template>

<script src="./producteur.js" />
