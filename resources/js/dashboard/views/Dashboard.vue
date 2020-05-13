<template>
  <div width="80%">
    <v-data-table :headers="headers" :items="datas" class="elevation-4" :items-per-page="15">
      <template v-slot:top>
        <addProduct v-on:addProduct="datas.push($event)"></addProduct>
        <modal></modal>
      </template>
      <template v-slot:item.produit="{ item }">{{item.name}}</template>
      <template v-slot:item.id_producteur="{ item }">{{item.id_producteur.name}}</template>
      <template v-slot:item.fruit="{ item }">{{recupFruits(item.fruit)}}</template>
      <template v-slot:item.actions="{ item }">
        <v-icon small class="mr-2" @click="editItem(item)">mdi-pencil</v-icon>
        <v-icon small class="mr-2" @click="deleteItem(item)">mdi-delete</v-icon>
      </template>
    </v-data-table>
  </div>
</template>

<script src="./dashboard.js">
</script>
