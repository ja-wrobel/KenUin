<script setup>
    import Header from './Components/Header.vue';
    import Authenticate from './Components/Authentication/Authenticate.vue';
    import { useAuthModalStore } from '../stores/authModal';
    import { ref } from 'vue';

    const window_width = ref(window.innerWidth);

    const auth_component_store = useAuthModalStore();

    window.addEventListener('resize', () => {
        window_width.value = window.innerWidth;
    });

</script>

<template>
    <Header :window-width="window_width" />

    <router-view />

    <Authenticate v-if="auth_component_store.show === true" />

</template>
