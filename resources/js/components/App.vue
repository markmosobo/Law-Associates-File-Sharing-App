<template>
    <Header />
    <router-view></router-view>
</template>

<script>
    import Header from './Header.vue';

    export default {
        name: 'App',
        components: {
            Header,
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
