<template>
  <v-row>
    <v-dialog v-model="dialog" persistent max-width="700px">
      <template v-slot:activator="{ on }">
        <v-btn v-if="!modifier" class="ma-2" dark v-on="on" tile outlined color="brown">
          <v-icon left>mdi-shape-square-plus</v-icon>Ajouter un produit
        </v-btn>
        <v-icon v-if="modifier" @click="editConfiture" v-on="on" left>mdi-pencil</v-icon>
      </template>
      <v-card>
        <v-form id="addFruit" @submit="ajout">
          <v-card-title>
            <span class="headline" v-if="!modifier">Ajouter un produit</span>
            <span class="headline" v-if="modifier">modifier un produit</span>
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
                <v-col v-if="!isProducteur" cols="12" sm="6" md="4">
                  <v-select
                    :rules="id_producteurRules"
                    v-model="producteur"
                    :items="producteurs"
                    item-text="name"
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
                    item-text="name"
                    :search-input.sync="search"
                    return-object
                    hide-no-data
                    hide-details
                    multiple
                    label="fruit"
                  >
                    <template>
                      <v-btn icon color="success" :disabled="listFruits.length == 0">
                        <v-icon>mdi-plus-circle</v-icon>
                      </v-btn>
                    </template>
                  </v-autocomplete>
                </v-col>
                <v-col cols="12" sm="6" md="12">
                  <v-file-input v-on:change="onFileChange"></v-file-input>
                </v-col>
                <v-img v-if="!modifier" :src="image"></v-img>
                <v-img v-if="modifier" :src="confitures.image"></v-img>
                <br />
                <v-btn icon v-on:click="removeImg">
                  <v-icon>mdi-close-circle</v-icon>
                </v-btn>
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