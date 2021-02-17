<template>
    <div>
        <h2>Lista de Produtos</h2>
        <div v-for="(product, index) in products" :key="index">
            <product-item :product="product" 
            v-on:productchanged="$emit('reloadlist')"
            class="product"
            />
        </div>
    </div>
</template>

<script>
import productItem from './productItem';
export default {
    props: ['products'],
    components: {
        productItem,
    }
}
</script>

<style>
.product {
    box-shadow: 0px 2px 4px 4px #ccc;
    padding: 14px;
    border-radius: 1px;
    margin-bottom: 15px;
}
</style>