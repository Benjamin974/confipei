<template>
  <v-container>
    <v-row>
      <v-col v-for="(confiture, key) in basket" :key="key">
        <v-card>
          <v-card-title>{{confiture.name}}</v-card-title>
          <v-text-field
            type="number"
            v-model="confiture.quantite"
            @input="updateQuantity(confiture)"
          ></v-text-field>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script src="./pagePanier.js">
</script>