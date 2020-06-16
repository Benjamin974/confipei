<template>
  <v-container>
    <div>
      <h3>Adresse de livraison</h3>
      <v-row>
        <v-text-field v-model="nom" class="pa-2" md="4" label="nom"></v-text-field>
        <v-text-field v-model="prenom" class="pa-2" md="4" label="prenom"></v-text-field>
        <v-text-field v-model="pays" class="pa-2" md="4" label="pays"></v-text-field>
      </v-row>
      <v-row>
        <v-text-field v-model="ville" class="pa-2" md="4" label="ville"></v-text-field>
        <v-text-field v-model="adresse" class="pa-2" md="4" label="adresse"></v-text-field>
        <v-text-field v-model="code_postal" class="pa-2" md="4" label="code postal"></v-text-field>
      </v-row>
    </div>
    <v-btn @click='getDatas'>
        test
    </v-btn>
    <v-switch v-model="selectable" label="Selectable" @change='getDatas'></v-switch>
    <div v-if='selectable'>
      <h3>Adresse de facturation</h3>
      <v-row>
        <v-text-field v-model="nom_facturation" class="pa-2" md="4" label="nom"></v-text-field>
        <v-text-field v-model="prenom_facturation" class="pa-2" md="4" label="prenom"></v-text-field>
        <v-text-field v-model="pays_facturation" class="pa-2" md="4" label="pays"></v-text-field>
      </v-row>
      <v-row>
        <v-text-field v-model="ville_facturation" class="pa-2" md="4" label="ville"></v-text-field>
        <v-text-field v-model="adresse_facturation" class="pa-2" md="4" label="adresse"></v-text-field>
        <v-text-field v-model="code_postal_facturation" class="pa-2" md="4" label="code postal"></v-text-field>
      </v-row>
    </div>
  </v-container>
</template>

<script src="./stepperLivraison.js">
</script>