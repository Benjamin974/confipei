<template>
  <div width="80%">
    <v-data-table :headers="headers" :items="confitures" class="elevation-4" :items-per-page="15">
      <template v-slot:top>
        <addProduct v-on:addProduct="confitures.push($event)"></addProduct>
      </template>
      <template v-slot:item.produit="{ item }">{{item.name}}</template>
      <template v-slot:item.id_producteur="{ item }">{{item.id_producteur.name}}</template>
      <template v-slot:item.fruit="{ item }">{{recupFruits(item.fruit)}}</template>
      <template v-slot:item.image="{ item }">
        <v-img :src="item.image" aspect-ratio="1.7"></v-img>
      </template>
      <template v-slot:item.actions="{ item }">
        <addProduct :confitures="item" :modifier="true"></addProduct>
      </template>
    </v-data-table>
  </div>
</template>

<script src="./dashboard.js">
</script>
