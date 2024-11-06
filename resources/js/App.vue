<script setup>
    import Header from './Components/Header.vue';

    const window_width = window.innerWidth;

</script>

<template>
    <Header :window_width="window_width"/>

    <router-view/>

</template>
