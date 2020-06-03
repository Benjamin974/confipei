<template>
  <div class="pt-5">
    <v-col cols="6">
      <v-card-text>{{confiture.name}}</v-card-text>
      <v-text-field v-model="quantite" min="0" type="number" width="200px"></v-text-field>
      <v-btn @click="commander" text :disabled="quantite==0">Commander</v-btn>
    </v-col>
    <v-snackbar v-model="snackbar" :timeout="timeout">
      {{ text }}
      <v-btn color="blue" text @click="snackbar=false;">Close</v-btn>
    </v-snackbar>
  </div>
</template>

<script src="./nbreProduits.js">
</script>