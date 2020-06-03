<template>
  <v-menu offset-y open-on-hover :close-on-content-click='false'>
    <template v-slot:activator="{ on }">
      <v-btn v-on="on">
        <v-badge color="purple" :content="quantite">
          <v-icon>mdi-basket-fill</v-icon>
        </v-badge>
      </v-btn>
    </template>
    <v-list>
      <v-list-item v-for="(confiture, index) in itemPanier" :key="index">
        <v-list-item-title>
          <v-card>
            <div class="d-flex flex-no-wrap justify-space-between">
              <v-card-title class="headline">{{confiture.name}}</v-card-title>
            </div>
            <v-card-subtitle>
              <v-text-field
                type="number"
                min="0"
                v-model="confiture.quantite"
                @input="updateQuantity(confiture)"
              ></v-text-field>
            </v-card-subtitle>
            <div>
              <v-card-subtitle></v-card-subtitle>
            </div>
          </v-card>
        </v-list-item-title>
      </v-list-item>
      <v-btn to="/panier">voir le panier</v-btn>
    </v-list>
  </v-menu>
</template>

<script src="./panier.js">
</script>

