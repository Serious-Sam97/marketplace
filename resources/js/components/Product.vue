<template>
    <div class="card">
        <div class="card-header">{{ value.name }}</div>

        <div class="card-body">
            {{ value.description }}
        </div>
    </div>
</template>

<script>
    export default {
    name: 'Product',
        props: {
            value: {
                type: Object,
            },
        },
    }
</script>
