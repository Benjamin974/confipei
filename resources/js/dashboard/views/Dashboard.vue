<template>
  <div width="80%">
    <addProduct v-on:addProduct="datas.push($event)"></addProduct>
    <v-data-table :headers="headers" :items="datas" class="elevation-4" :items-per-page="15">
      <template v-slot:item.produit="{ item }">{{item.name}}</template>
      <template v-slot:item.id_producteur="{ item }">{{item.id_producteur.name}}</template>
      <template v-slot:item.fruit="{ item }">{{recupFruits(item.fruit)}}</template>
    </v-data-table>
  </div>
</template>

<script src="./dashboard.js">
</script>
