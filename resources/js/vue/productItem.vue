<template>
  <div>
    <div
      :class="[
        product.status
          ? 'product-container product-active'
          : 'product-container',
        'productText',
      ]"
    >
      <div class="left">
        <img :src="product.image" alt="" class="" />
      </div>
      <div class="right">
        <span>
          {{ product.name }}
        </span>
        <br />
        <div class="price">
          <b>R$ {{ product.price }}</b>
        </div>
        <span>
          <label>
            <input
              type="checkbox"
              :id="product.id"
              @change="updateStatus()"
              v-model="product.status"
            />
            Activo?
          </label>

          <label>
            <input
              type="checkbox"
              :id="product.id"
              @change="availableStatus()"
              v-model="product.available"
            />
            Disponível?
          </label>
        </span>
        <br />
        <button class="edit" @click="editProduct()">
          <font-awesome-icon icon="edit" />
        </button>
        <button class="trash" @click="removeProduct()">
          <font-awesome-icon icon="trash" />
        </button>

        <div class="form" :class="[update_product ? 'open' : 'closed']">
          <div class="form-group">
            <label for="name">Nome</label>
            <input
              type="text"
              v-model="product.name"
              placeholder="Nome do Produto"
              name="name"
              id="name"
            />
          </div>

          <div class="form-group">
            <label for="price">Preço</label>
            <input
              type="text"
              v-model="product.price"
              placeholder="Preço"
              name="price"
              id="price"
            />
          </div>

          <div class="form-group">
            <label for="image">Imagem</label>
            <input
              type="text"
              v-model="product.image"
              placeholder="Link da imagem"
              name="image"
              id="image"
            />
          </div>

          <div class="form-group">
            <button
              @click="updateProduct()"
              :class="[product.name ? 'active' : 'inactive', 'plus']"
            >
              Salvar
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["product"],
  data: function () {
    return {
      update_product: false,
    };
  },
  methods: {
    updateStatus() {
      axios
        .post("api/product/" + this.product.id + "/change-status", {
          product: this.product,
        })
        .then((response) => {
          if (response.status == 200) {
            // this.$emit("productchanged");
            //this.product = response.data;
          }
        })
        .catch((error) => {
          console.log(error);
        });
    },
    availableStatus() {
      axios
        .post("api/product/" + this.product.id + "/change-available-status", {
          product: this.product,
        })
        .then((response) => {
          if (response.status == 200) {
            this.$emit("productchanged");
          }
        })
        .catch((error) => {
          console.log(error);
        });
    },
    removeProduct() {
      axios
        .delete("api/product/" + this.product.id, {
          product: this.product,
        })
        .then((response) => {
          if (response.status == 200) {
            this.$emit("productchanged");
          }
        })
        .catch((error) => {
          console.log(error);
        });
    },
    editProduct() {
      this.update_product = !this.update_product;
    },
    updateProduct() {
      if (!this.product.name) return;

      axios
        .put("api/product/" + this.product.id, {
          product: this.product,
        })
        .then((response) => {
          if (response.status == 200) {
            this.update_product = false;
            this.$emit("productchanged");
          }
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>

<style>
.product-active {
  color: #20a51b;
}

.product-container {
  display: flex;
  flex-direction: row;
  align-items: flex-start;
  margin: 0;
  padding: 0;
}

.left img {
  width: 100px;
  height: 100px;
  object-fit: cover;

  margin: 0;
  margin-right: 1em;
}

.productText {
}

.form {
    border: 1px solid #ccc;
    padding: 12px;
    margin-top: 10px;
}

.trash {
  border: 1px solid #b61d3e;
  font-size: 16px;
  color: #b61d3e;
  padding: 5px;
  width: 40px;
  cursor: pointer;
}

.edit {
  border: 1px solid #0c9e5a;
  font-size: 16px;
  color: #0c9e5a;
  padding: 5px;
  width: 40px;
  cursor: pointer;
}

.open {
  display: block;
}

.closed {
  display: none;
}
</style>