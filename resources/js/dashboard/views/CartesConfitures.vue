<template>
  <v-container>
    <v-autocomplete
      v-model="acfruits"
      :loading="loading"
      :items="listFruits"
      item-value="name"
      item-text="name"
      :search-input.sync="search"
      hide-no-data
      hide-details
      multiple
      label="fruit"
      @change="filterFruit"
    ></v-autocomplete>

    <template>
      <v-row>
        <v-col v-for="(confiture,key) in productsDisplay" :key="key" cols="12" sm="6" md="4" lg="4">
          <v-card>
            <v-card-title class="subheading font-weight-bold">{{ confiture.name }}</v-card-title>
            <v-img :src="confiture.id_photo.photo" height="200px"></v-img>

            <v-card-subtitle v-if="listFruits != null">{{recupFruits(confiture.fruit)}}</v-card-subtitle>
            <v-divider></v-divider>
          </v-card>
        </v-col>
      </v-row>
    </template>
  </v-container>
</template>

<script src="./cartesConfitures.js"></script>


 <!--  <v-container>
    <v-autocomplete
      :loading="loading"
      :items="listFruits"
      item-text="name"
      :search-input.sync="search"
      return-object
      hide-no-data
      hide-details
      multiple
      label="confitures"
    ></v-autocomplete>
    <v-row>
      <v-col class="md-4" v-for="(confiture,key) in confitures" :key="key">
        <v-card class="mx-auto" max-width="344">
          <v-img :src="confiture.id_photo.photo" height="200px"></v-img>

          <v-card-title>{{confiture.name}}</v-card-title>
          <v-card-subtitle v-if="listFruits != null">{{recupFruits(confiture.fruit)}}</v-card-subtitle>
        </v-card>
      </v-col>
//     </v-row> 
//     <v-data-iterator
//       :items="listFruits"
//       item-text="name"
//       :search="search"
//       :sort-by="sortBy.toLowerCase()"
//       :sort-desc="sortDesc"
//       hide-default-footer
//     >
//       <template v-slot:header>
//         <v-toolbar dark color="gray darken-3" class="mb-1">
//           <v-autocomplete
//             :loading="loading"
//             :items="listFruits"
//             item-text="name"
//             :search-input.sync="search"
//             return-object
//             hide-no-data
//             hide-details
//             multiple
//             label="confitures"
//           ></v-autocomplete>
//         </v-toolbar>
//       </template>

//       <template v-slot>
//         <v-row>
//           <v-col
//             v-for="confiture in confitures"
//             :key="confiture.name"
//             cols="12"
//             sm="6"
//             md="4"
//             lg="4"
//           >
//             <v-card class="mx-auto" max-width="344">
//               <v-img :src="confiture.id_photo.photo" height="200px"></v-img>
//               <v-card-title>{{confiture.name}}</v-card-title>

        
//                 <v-card-subtitle v-if="listFruits != null">{{recupFruits(confiture.fruit)}}</v-card-subtitle>
//             </v-card>
//           </v-col>
//         </v-row>
//       </template>
//     </v-data-iterator>
//   </v-container>-->