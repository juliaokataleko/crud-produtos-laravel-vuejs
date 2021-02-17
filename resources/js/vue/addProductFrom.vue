<template>
    <div>
        <h2 class="addProductBtn" @click="formToggleF">Adicionar Produto</h2>

        <div class="form" :class="[formToggle ? 'open':'closed']">

            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" 
                v-model="product.name"
                placeholder="Nome do Produto" name="name" id="name">
            </div>

            <div class="form-group">
                <label for="price">Preço</label>
                <input type="text" 
                v-model="product.price"
                placeholder="Preço" name="price" id="price">
            </div>

            <div class="form-group">
                <label for="image">Imagem</label>
                <input type="text" 
                v-model="product.image"
                placeholder="Link da imagem" name="image" id="image">
            </div>

            <div class="form-group">
                <br>
                <button 
                @click="addProduct"
                :class="[ product.name ? 'active':'inactive','plus']">
                    <font-awesome-icon icon='plus-square'/>
                </button>
            </div>

        </div>
    </div>
</template>

<script>
export default {
    data: function () {
        return {
            product: {
                name: "",
                price: "",
                image: "",
            },
            formToggle: false
        }
    },
    methods: {
        addProduct() {
            if(!this.product.name) return

            axios.post('api/product/store', {
                product: this.product
            })
            .then( response => {
                if(response.status == 201) {
                    this.product.name = '';
                    this.product.price = '';
                    this.product.image = '';
                    this.formToggle = false;
                    this.$emit('reloadlist')
                }
            })
            .catch(error=> {
                console.log(error);
            })
        },
        formToggleF() {
            this.formToggle = !this.formToggle
        }
    }
}
</script>

<style scoped>

.form {
    display: flex;
    flex-direction: column;

}

.form-group {
    width: 100%;
}

.form-group button {
    padding: 10px;
    border:0;
    width: 100%;
    transition: 0.4s;
    outline: none;
    border-radius: 4px;
    cursor: pointer;
}

.form-group button:hover {
    background: #03793e;
    padding: 10px;
    border:0;
    width: 100%;
}

.form-group input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    outline: none;
}

.plus {
    font-size: 20px;
}

.active {
    background: #0aa859;
}

.inactive {
    background: #9cafa5;
    display: none;
}

.open {
    display: block;
}

.closed {
    display: none;
}

.addProductBtn {
    padding: 10px;
    background: #ddd;
    cursor: pointer;
}

</style>