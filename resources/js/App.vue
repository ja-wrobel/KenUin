<script setup>
    import Header from './Components/Header.vue';
    import Authenticate from './Components/Authentication/Authenticate.vue';
    import { useAuthModalStore } from '../stores/authModal';
    import { computed, onMounted, onUnmounted, ref } from 'vue';

    const auth_modal_store = useAuthModalStore();
    const window_width = ref(window.innerWidth);

    const shouldShowAuthModal = computed(() => {
        return auth_modal_store.show;
    });

    function getNewWindowWidth() {
        window_width.value = window.innerWidth;
    };

    onMounted(() => {
        window.addEventListener('resize', getNewWindowWidth);
    });

    onUnmounted(() => {
        window.removeEventListener('resize', getNewWindowWidth);
    });

</script>

<template>
    <Header :window-width="window_width" />

    <router-view />

    <Authenticate v-if="shouldShowAuthModal === true" />

</template>
