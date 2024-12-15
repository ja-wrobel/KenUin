<script setup>
    import { reactive } from 'vue';

    const form_data = reactive({
        username: "",
        is_username_correct: false,
        email: "",
        is_email_correct: false,
        password: "",
        is_password_correct: false,
        confirm_password: "",
        is_password_confirmed: false,
    });

    function validateUsername() {
        const username_warn = document.getElementById('username-warn');
        const username_regex = new RegExp(/^[^\d\W][\w!.\-&]*[^\W]$/);
        form_data.is_username_correct = false;

        if (form_data.username.length === 0) {
            username_warn.innerHTML = "Username is required!";
        }
        else if (form_data.username.length < 3 || form_data.username.length > 30) {
            username_warn.innerHTML = "Username has to be between 3 to 30 characters long.";
        }
        else if (username_regex.test(form_data.username) === false) {
            username_warn.innerHTML = "Invalid username.";
        }
        else {
            username_warn.innerHTML = "";
            form_data.is_username_correct = true;
        }
    };

    function validateEmail() {
        const email_warn = document.getElementById('email-warn');
        const email_regex = new RegExp(/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/);
        form_data.is_email_correct = false;

        if (form_data.email.length === 0) {
            email_warn.innerHTML = "Email address is required!";
        }
        else if (form_data.email.length > 50) {
            email_warn.innerHTML = "Email address has to containt less than 50 characters.";
        }
        else if (email_regex.test(form_data.email) === false) {
            email_warn.innerHTML = "Email address has to be in correct form.";
        }
        else {
            email_warn.innerHTML = "";
            form_data.is_email_correct = true;
        }
    };

    function validatePassword() {
        const password_warn = document.getElementById('password-warn');
        const confirm_warn = document.getElementById('conf-password-warn');
        const password_regex = new RegExp(/^(?=.*\d)(?=.*[A-Z])(?=.*[\W_])(?=.*[a-z])[^\s]*$/);
        form_data.is_password_correct = false;

        if (form_data.password.length === 0) {
            password_warn.innerHTML = "Password is required!";
        }
        else if (form_data.password.length < 7 || form_data.password.length > 255) {
            password_warn.innerHTML = "Password has to be between 8 to 255 characters long.";
        }
        else if (password_regex.test(form_data.password) === false) {
            password_warn.innerHTML = "Password has to contain mixed case, special character and digit.";
        }
        else if (form_data.password !== form_data.confirm_password) {
            confirm_warn.innerHTML = "Passwords have to match!";
            password_warn.innerHTML = "";
            form_data.is_password_confirmed = false;
            form_data.is_password_correct = true;
        }
        else {
            password_warn.innerHTML = "";
            confirm_warn.innerHTML = "";
            form_data.is_password_confirmed = true;
            form_data.is_password_correct = true;
        }
    };

    function handleSubmit() {
        if (
            form_data.is_username_correct === false ||
            form_data.is_email_correct === false ||
            form_data.is_password_correct === false ||
            form_data.is_password_confirmed === false
        ) {
            validateUsername();
            validateEmail();
            validatePassword();
            return false;
        }
        console.log('register');
    };
</script>

<template>
    <h2 class="dc-center-xy transparent-blue mx-3vw">Register</h2>

    <form @submit.prevent="handleSubmit" class="auth-form grid transparent-blue mx-3vw" method="POST">
        <div class="auth-form-container grid pt-2r">
            <label class="auth-label m-2" for="username">Username:</label>
            <input
                class="auth-input m-2"
                id="username"
                type="text"
                name="username"
                autocomplete="username"
                placeholder="Choose your username/login"
                v-model="form_data.username"
                @keyup="validateUsername"
            >
            <div id="username-warn" class="auth-warn m-2"></div>
        </div>
        <div class="auth-form-container grid">
            <label class="auth-label m-2" for="email">Email:</label>
            <input
                class="auth-input m-2"
                id="email"
                type="text"
                name="email"
                autocomplete="email"
                placeholder="Will be necessary to activate account"
                v-model="form_data.email"
                @keyup="validateEmail"
            >
            <div id="email-warn" class="auth-warn m-2"></div>
        </div>
        <div class="auth-form-container grid">
            <label class="auth-label m-2" for="password">Password:</label>
            <input
                class="auth-input m-2"
                id="password"
                type="password"
                name="password"
                autocomplete="off"
                placeholder="Make sure it is a strong password"
                v-model="form_data.password"
                @keyup="validatePassword"
            >
            <div id="password-warn" class="auth-warn m-2"></div>
        </div>
        <div class="auth-form-container grid pb-2r">
            <label class="auth-label m-2" for="confirm-password">Confirm password:</label>
            <input
                class="auth-input m-2"
                id="confirm-password"
                type="password"
                name="confirm-password"
                autocomplete="off"
                placeholder="Type your password again"
                v-model="form_data.confirm_password"
                @keyup="validatePassword"
            >
            <div id="conf-password-warn" class="auth-warn m-2"></div>
        </div>
        <button class="button" type="submit">Register</button>
    </form>
</template>
