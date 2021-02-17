<template>
  <div class="products-list-container">
    <div class="heading bg-header-color">
      <div class="container">
        <div class="top">
          <div id="title"><h2>Mobazon</h2></div>
          <span><a href="#">Sobre</a></span>
        </div>
      </div>
    </div>

    <div class="container">
      <add-product-from v-on:reloadlist="getProducts()" />

      <products-list
      v-on:reloadlist="getProducts()"
       :products="products" />

    </div>
  </div>
</template>

<script>
// here goes the javascript code of component

import addProductFrom from "./addProductFrom";
import productsList from "./ProductsList.vue";
export default {
  components: {
    addProductFrom,
    productsList,
  },
  data: function () {
      return {
          products: []
      }
  },
  methods: {
      getProducts () {
          axios.get('api/products')
          .then(response => {
              this.products = response.data
          })
          .catch(error => {
              console.log(error);
          })
      },
  },
  created() {
      this.getProducts()
  },
};
</script>

<style>
.container {
  width: 95%;
  max-width: 900px;
  margin: 0 auto;
}

.bg-header-color {
  background: #249b4b;
  color: #fff;
}

.products-list-container {
  background: #fdfdfd;
}

.products-list-container .heading {
  display: flex;
  flex-direction: column;
}

.products-list-container .heading .top {
  height: 4em;
  line-height: 4em;
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  align-items: center;
}

.top h2 {
    font-size: 25px;
    font-weight: 600;
}
</style>