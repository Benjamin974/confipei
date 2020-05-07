<template>
  <div>
    <input
      type="text"
      placeholder="what are you looking for?"
      v-model="query"
      v-on:keyup="autoComplete"
      class="form-control"
    />
    <div class="panel-footer" v-if="results.length">
      <div v-for="(result,key) in results" :key="key">
          <v-text-field :value="result.name"> {{result.name}} </v-text-field>
      </div>
        <!-- <li class="list-group-item" v-for="result in results">{{ result.name }}</li> -->
    </div>
  </div>
</template>
<script src="./searchFruits.js">
</script>