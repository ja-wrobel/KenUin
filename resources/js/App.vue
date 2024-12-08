<script setup>
    import Header from './Components/Header.vue';
    import Authenticate from './Components/Authentication/Authenticate.vue';
    import { useAuthStateStore } from '../stores/authState';

    const window_width = window.innerWidth;

    const auth_component_state = useAuthStateStore();

</script>

<template>
    <Header :window-width="window_width" />

    <router-view />

    <Authenticate v-if="auth_component_state.show === true" />

</template>
