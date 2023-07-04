<template>
    <div>
        <h3>Products</h3>
        <div style="margin-bottom: 5px;" v-for="(product, index) in products" :key="index">
            <product v-model="products[index]"/>
        </div>
    </div>
</template>

<script>
import Product from '../js/components/Product.vue';
export default {
        components: {
            Product,
        },
        name: 'Home',
        data() {
            return {
                products: [
                    {
                        name: 'Mouse',
                        description: 'Mucho texto'
                    },
                    {
                        name: 'Keyboard',
                        description: 'Mucho texto'
                    },
                    {
                        name: 'Monitor',
                        description: 'Mucho texto'
                    },
                    {
                        name: 'Pc gamer',
                        description: 'Mucho texto'
                    },
                ]
            }
        },
    }
</script>

<style lang="scss" scoped>

</style>
