<script setup>
    import { reactive } from 'vue';

    const form_data = reactive({
        login: "",
        password: "",
        remember: false,
    });
</script>

<template>
    <h2 class="dc-center-xy transparent-blue mx-3vw">Log in</h2>

    <form class="auth-form grid transparent-blue mx-3vw" method="POST">
        <div class="auth-form-container grid pt-2r">
            <label title="Username or email" class="auth-label m-2" for="login">Login:</label>
            <input
                class="auth-input m-2"
                id="login"
                type="text"
                name="username"
                autocomplete="username"
                placeholder="Enter your username or email"
                v-model="form_data.login"
            >
        </div>
        <div class="auth-form-container grid pb-0">
            <label class="auth-label m-2" for="password">Password:</label>
            <input
                class="auth-input m-2"
                id="password"
                type="password"
                name="password"
                autocomplete="current-password"
                placeholder="Enter your password"
                v-model="form_data.password"
            >
        </div>
        <div class="auth-form-container flex w-100 pb-2r pl-0 pr-0">
            <input
                class="auth-input m-2"
                id="remember"
                type="checkbox"
                name="remember"
                v-model="form_data.remember"
            >
            <label class="auth-label check-label m-2 pt-0" for="remember">Remember Me</label>
        </div>
        <button class="button">Sign In</button>
    </form>
</template>
