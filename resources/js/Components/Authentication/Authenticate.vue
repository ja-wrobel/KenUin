<script setup>
    import { useAuthStateStore } from '../../../stores/authState';

    const auth_component_state = useAuthStateStore();

</script>

<template>
    <div :class="`auth ${auth_component_state.calledFor}`">
        <div class="close button" @click="auth_component_state.hide">
            X
        </div>
        <template v-if="auth_component_state.calledFor === 'login'">
            <h2 class="dc-center-xy transparent-blue mx-3vw">Log in</h2>
            <form class="auth-form grid transparent-blue mx-3vw" method="POST">
                <div class="auth-form-container grid pt-2r">
                    <label class="auth-label m-2" for="login">Login:</label>
                    <input
                        class="auth-input m-2"
                        id="login"
                        type="text"
                        name="username"
                        autocomplete="username"
                        placeholder="Enter your Username or Email"
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
                        placeholder="Enter your Password"
                    >
                </div>
                <div class="auth-form-container flex w-100 pb-2r pl-0 pr-0">
                    <input class="auth-input m-2" id="remember" type="checkbox" name="remember">
                    <label class="auth-label check-label m-2 pt-0" for="remember">Remember Me</label>
                </div>
                <button class="button">Sign In</button>
            </form>
        </template>

        <template v-else-if="auth_component_state.calledFor === 'register'">
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
                        placeholder="Username"
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
                        placeholder="Email"
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
                        placeholder="Password"
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
                        placeholder="Confirm Password"
                    >
                </div>
                <button class="button">Register</button>
            </form>
        </template>
    </div>
    <div class="mask"></div>
</template>
