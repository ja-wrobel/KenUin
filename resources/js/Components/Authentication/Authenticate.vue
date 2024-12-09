<script setup>
    import { useAuthStateStore } from '../../../stores/authState';
    import LoginComponent from './LoginComponent.vue';
    import RegisterComponent from './RegisterComponent.vue';

    const auth_component_state = useAuthStateStore();

</script>

<template>
    <div :class="`auth ${auth_component_state.calledFor}`">
        <div class="close button" @click="auth_component_state.hide">
            X
        </div>

        <LoginComponent v-if="auth_component_state.calledFor === 'login'" />

        <RegisterComponent v-else-if="auth_component_state.calledFor === 'register'" />

    </div>
    <div class="mask"></div>
</template>
