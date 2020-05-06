<template>
      <v-footer class="adminFooter deep-purple ">
        <div class="adminFooterTexte">© CONFIPEI</div>
      </v-footer>
</template>

<style scoped>
.adminFooter {
  display: flex;
  flex-flow: row;
  justify-content: flex-end;
  align-items: center;
  background-color: brown;
  height: 50px;
  position: fixed;
  bottom: 0;
  width: 100%;
}
.adminFooterTexte {
    position: relative;
    right: 5%;
}
</style>