<template>
  <v-container>
    <v-stepper v-model="e1">
      <v-stepper-header>
        <v-stepper-step :complete="e1 > 1" step="1">Confirmation de commande</v-stepper-step>

        <v-divider></v-divider>

        <v-stepper-step :complete="e1 > 2" step="2">Name of step 2</v-stepper-step>

        <v-divider></v-divider>

        <v-stepper-step step="3">Name of step 3</v-stepper-step>
      </v-stepper-header>

      <v-stepper-items>
        <v-stepper-content step="1">
          <v-list-item v-for="(item, key) in commande.commandeList" :key="key">
            <v-list-item-action></v-list-item-action>

            <v-list-item-content>
              <v-list-item-title>{{item.name}}</v-list-item-title>
              <v-list-item-subtitle>prix : {{item.price}}</v-list-item-subtitle>
              <v-list-item-subtitle>quantite : {{item.quantite}}</v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>

          <v-btn color="primary" @click="e1 = 2">Continue</v-btn>

          <v-btn text @click="cancel">Cancel</v-btn>
        </v-stepper-content>

        <v-stepper-content step="2" class="mb-5">
          <v-container>
            <div>
              <h3>Adresse de livraison</h3>
              <v-row>
                <v-text-field v-model="commande.livraison.nom" class="pa-2" md="4" label="nom"></v-text-field>
                <v-text-field
                  v-model="commande.livraison.prenom"
                  class="pa-2"
                  md="4"
                  label="prenom"
                ></v-text-field>
                <v-text-field v-model="commande.livraison.pays" class="pa-2" md="4" label="pays"></v-text-field>
              </v-row>
              <v-row>
                <v-text-field v-model="commande.livraison.ville" class="pa-2" md="4" label="ville"></v-text-field>
                <v-text-field
                  v-model="commande.livraison.adresse"
                  class="pa-2"
                  md="4"
                  label="adresse"
                ></v-text-field>
                <v-text-field
                  v-model="commande.livraison.code_postal"
                  class="pa-2"
                  md="4"
                  label="code postal"
                ></v-text-field>
              </v-row>
            </div>
            <v-switch v-model="selectable" label="Selectable"></v-switch>
            <div v-if="selectable">
              <h3>Adresse de facturation</h3>
              <v-row>
                <v-text-field v-model="commande.facturation.nom" class="pa-2" md="4" label="nom"></v-text-field>
                <v-text-field
                  v-model="commande.facturation.prenom"
                  class="pa-2"
                  md="4"
                  label="prenom"
                ></v-text-field>
                <v-text-field v-model="commande.facturation.pays" class="pa-2" md="4" label="pays"></v-text-field>
              </v-row>
              <v-row>
                <v-text-field
                  v-model="commande.facturation.ville"
                  class="pa-2"
                  md="4"
                  label="ville"
                ></v-text-field>
                <v-text-field
                  v-model="commande.facturation.adresse"
                  class="pa-2"
                  md="4"
                  label="adresse"
                ></v-text-field>
                <v-text-field
                  v-model="commande.facturation.code_postal"
                  class="pa-2"
                  md="4"
                  label="code postal"
                ></v-text-field>
              </v-row>
            </div>
          </v-container>

          <v-btn color="primary" @click="getDatasInput">Continue</v-btn>

          <v-btn text>Cancel</v-btn>
        </v-stepper-content>

        <v-stepper-content step="3">
          <div>
            <v-expansion-panels v-model="panel" multiple>
              <v-expansion-panel>
                <v-expansion-panel-header>recapitulatif de la commande</v-expansion-panel-header>
                <v-expansion-panel-content>
                  <v-row>
                    <v-col md="4" v-for="(item, key) in commande.commandeList" :key="key">
                      <v-card>{{item.name}}</v-card>
                    </v-col>
                  </v-row>
                </v-expansion-panel-content>
              </v-expansion-panel>

              <v-expansion-panel>
                <v-expansion-panel-header>Paiement</v-expansion-panel-header>
                <v-expansion-panel-content>
                  <v-stripe-card v-model="source" :api-key="api_key"></v-stripe-card>
                </v-expansion-panel-content>
              </v-expansion-panel>
            </v-expansion-panels>
          </div>

          <v-btn color="primary" @click="process">Payer</v-btn>

          <v-btn text>Cancel</v-btn>
        </v-stepper-content>
      </v-stepper-items>
    </v-stepper>
  </v-container>
</template>

<script src="./stepper.js">
</script>