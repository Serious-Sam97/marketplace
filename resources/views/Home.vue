<template>
    <div>
        <div>
            <h3>Change Photo example</h3>
            <input type="file" accept="image/*" @change="uploadImage($event)" id="file-input">
            TEST
            <img v-if="user" :src="`../storage/${user.photo_url}`"/>
            TEST
        </div>
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
                user: null,
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
        methods: {
            uploadImage(event) {
                const file = event.target.files[0];
                const formData = new FormData();
                formData.append('image', file);
                axios.post('/send-photo', formData).then(response => {
                    console.log(response.data);
                });
            },
            fetchUser() {
                axios.get('/get-user').then((data) => {
                    this.user = data.data;
                });
            }
        },
        mounted () {
            this.fetchUser();
        },
    }
</script>
