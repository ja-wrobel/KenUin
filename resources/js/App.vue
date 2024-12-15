<script setup>
    import Header from './Components/Header.vue';
    import Authenticate from './Components/Authentication/Authenticate.vue';
    import { useAuthModalStore } from '../stores/authModal';
    import { onMounted, onUnmounted, ref } from 'vue';

    const auth_modal_store = useAuthModalStore();
    const window_width = ref(window.innerWidth);

    function getAuthModalState() {
        return auth_modal_store.show;
    };

    function setWindowWidthValue() {
        window_width.value = window.innerWidth;
    };

    onMounted(() => {
        window.addEventListener('resize', setWindowWidthValue);
    });

    onUnmounted(() => {
        window.removeEventListener('resize', setWindowWidthValue);
    });

</script>

<template>
    <Header :window-width="window_width" />

    <router-view />

    <Authenticate v-if="getAuthModalState() === true" />

</template>
