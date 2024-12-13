<script setup>
    import { reactive } from 'vue';

    const form_data = reactive({
        username: "",
        email: "",
        password: "",
        confirm_password: "",
    });
</script>

<template>
    <h2 class="dc-center-xy transparent-blue mx-3vw">Register</h2>

    <form class="auth-form grid transparent-blue mx-3vw" method="POST">
        <div class="auth-form-container grid pt-2r">
            <label class="auth-label m-2" for="login">Username:</label>
            <input
                class="auth-input m-2"
                id="login"
                type="text"
                name="username"
                autocomplete="username"
                v-model="form_data.username"
            >
        </div>
        <div class="auth-form-container grid">
            <label class="auth-label m-2" for="email">Email:</label>
            <input
                class="auth-input m-2"
                id="email"
                type="text"
                name="email"
                autocomplete="email"
                v-model="form_data.email"
            >
        </div>
        <div class="auth-form-container grid">
            <label class="auth-label m-2" for="password">Password:</label>
            <input
                class="auth-input m-2"
                id="password"
                type="password"
                name="password"
                autocomplete="off"
                v-model="form_data.password"
            >
        </div>
        <div class="auth-form-container grid pb-2r">
            <label class="auth-label m-2" for="confirm-password">Confirm password:</label>
            <input
                class="auth-input m-2"
                id="confirm-password"
                type="password"
                name="confirm-password"
                autocomplete="off"
                v-model="form_data.confirm_password"
            >
        </div>
        <button class="button">Register</button>
    </form>
</template>
