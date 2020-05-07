<template v-slot:top>
  <v-row>
    <v-dialog v-model="dialog" persistent max-width="700px">
      <template v-slot:activator="{ on }">
        <v-btn class="ma-2" dark v-on="on" tile outlined color="brown">
          <v-icon left>mdi-shape-square-plus</v-icon>Ajouer un produit
        </v-btn>
      </template>
      <v-card>
        <v-form id="addFruit" @submit="ajout">
          <v-card-title>
            <span class="headline">Ajouer un produit</span>
          </v-card-title>

          <v-card-text>
            <v-container>
              <v-row>
                <v-col cols="12" sm="6" md="4">
                  <v-text-field v-model="name" :rules="nameRules" label="Nom du prduit" required></v-text-field>
                </v-col>
                <v-col cols="12" sm="6" md="4">
                  <v-text-field v-model="prix" :rules="prixRules" label="Prix" required></v-text-field>
                </v-col>
                <v-col cols="12" sm="6" md="4">
                  <v-text-field v-model="fruits" :rules="fruitsRules" label="fruits" required></v-text-field>
                </v-col>
                <v-col cols="12" sm="6" md="4">
                  <v-select
                    :rules="id_producteurRules"
                    v-model="selectProducteur"
                    :items="itemsProducteur"
                    item-text="name"
                    item-value="id_producteur"
                    label="producteur"
                    persistent-hint
                    return-object
                    single-line
                  ></v-select>
                </v-col>
                <v-col cols="12" sm="6" md="4">
                  <v-autocomplete
                    v-model="acfruits"
                    :loading="loading"
                    :items="listFruits"
                    :search-input.sync="search"
                    return-object
                    hide-no-data
                    hide-details
                    multiple
                    label="fruits"
                  ></v-autocomplete>
                </v-col>
              </v-row>
            </v-container>
          </v-card-text>
          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn color="red" text @click="dialog = false">Annuler</v-btn>
            <v-btn color="success" text @click="ajout">Enregistrer</v-btn>
            <p>{{text}}</p>
          </v-card-actions>
        </v-form>
      </v-card>
    </v-dialog>
    <v-snackbar v-model="snackbar" :timeout="timeout">
      {{ text }}
      <v-btn color="blue" text @click="snackbar=false;">Close</v-btn>
    </v-snackbar>
  </v-row>
</template>
<script src="./addProduct.js"/>