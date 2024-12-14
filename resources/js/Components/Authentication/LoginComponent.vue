<script setup>
    import { reactive } from 'vue';

    const form_data = reactive({
        username: "",
        password: "",
        remember: false,
    });

    const handleSubmit = () => {
        const username_warn = document.getElementById("username-warn");
        const password_warn = document.getElementById("password-warn");
        if (form_data.username.length === 0) {
            password_warn.innerHTML = "";
            username_warn.innerHTML = "Login is required!";
            return false;
        }
        else if (form_data.password.length === 0) {
            username_warn.innerHTML = "";
            password_warn.innerHTML = "Password is required!";
            return false;
        }
        else {
            username_warn.innerHTML = "";
            password_warn.innerHTML = "";
        }
        console.log(form_data);
    };
</script>

<template>
    <h2 class="dc-center-xy transparent-blue mx-3vw">Log in</h2>

    <form @submit.prevent="handleSubmit" class="auth-form grid transparent-blue mx-3vw" method="POST">
        <div class="auth-form-container grid pt-2r">
            <label title="Username or email" class="auth-label m-2" for="login">Login:</label>
            <input
                class="auth-input m-2"
                id="login"
                type="text"
                name="username"
                autocomplete="username"
                placeholder="Enter your username or email"
                v-model="form_data.username"
            >
            <div id="username-warn" class="auth-warn m-2"></div>
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
            <div id="password-warn" class="auth-warn m-2"></div>
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
        <button class="button" type="submit">Sign In</button>
    </form>
</template>
