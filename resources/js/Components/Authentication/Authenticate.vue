<script setup>
    import { useAuthModalStore } from '../../../stores/authModal';
    import LoginComponent from './LoginComponent.vue';
    import RegisterComponent from './RegisterComponent.vue';

    const auth_component_store = useAuthModalStore();

</script>

<template>
    <div :class="`auth ${auth_component_store.calledFor}`">
        <div class="close button" @click="auth_component_store.hide">
            X
        </div>

        <LoginComponent v-if="auth_component_store.calledFor === 'login'" />

        <RegisterComponent v-else-if="auth_component_store.calledFor === 'register'" />

    </div>
    <div class="mask"></div>
</template>
