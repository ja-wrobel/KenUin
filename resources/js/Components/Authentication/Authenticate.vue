<script setup>
    import { useAuthModalStore } from '../../../stores/authModal';
    import LoginComponent from './LoginComponent.vue';
    import RegisterComponent from './RegisterComponent.vue';

    const auth_component_store = useAuthModalStore();

    const close = () => {
        auth_component_store.hide();
    };
</script>

<template>
    <div :class="`auth ${auth_component_store.calledFor} ${auth_component_store.isSmallDevice === true ? 'small': ''}`">
        <button class="close button" @click="close">
            X
        </button>

        <LoginComponent v-if="auth_component_store.calledFor === 'login'" />

        <RegisterComponent v-else-if="auth_component_store.calledFor === 'register'" />

    </div>
    <div class="mask"></div>
</template>
