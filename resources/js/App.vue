<script setup>
    import Header from './Components/Header.vue';
    import Authenticate from './Components/Authentication/Authenticate.vue';
    import { useAuthModalStore } from '../stores/authModal';

    const window_width = window.innerWidth;

    const auth_component_store = useAuthModalStore();

</script>

<template>
    <Header :window-width="window_width" />

    <router-view />

    <Authenticate v-if="auth_component_store.show === true" />

</template>
