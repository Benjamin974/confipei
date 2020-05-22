<template>
  <div width="80%">
    <v-data-table :headers="headers" :items="confitures" class="elevation-4" :items-per-page="15">
      <template v-slot:top>
        <addProduct v-on:addProduct="confitures.push($event)"></addProduct>
        <v-col>
          <div v-if="!photo">
            <input name="photo" type="hidden" @change="onFileSelected" /> <!-- change input type en 'file' si tu veux ajouté une image -->
          </div>
          <div v-else>
            <img v-bind:src="photo" style="width:200px" />
            <br />
            <v-btn icon v-on:click="greet">
              <v-icon>mdi-download</v-icon>
            </v-btn>
            <v-btn icon v-on:click="removeImg">
              <v-icon>mdi-close-circle</v-icon>
            </v-btn>
          </div>

          <!-- <button type= @click="onFileSelected">Upload</button> -->
        </v-col>
      </template>
      <template v-slot:item.produit="{ item }">{{item.name}}</template>
      <template v-slot:item.id_producteur="{ item }">{{item.id_producteur.name}}</template>
      <template v-slot:item.fruit="{ item }">{{recupFruits(item.fruit)}}</template>
      <template v-slot:item.id_photo="{ item }">
        <v-img :src="item.id_photo.photo" aspect-ratio="1.7"></v-img>
      </template>
      <template v-slot:item.actions="{ item }">
        <addProduct :confitures="item" :modifier="true"></addProduct>
      </template>
    </v-data-table>
  </div>
</template>

<script src="./dashboard.js">
</script>
