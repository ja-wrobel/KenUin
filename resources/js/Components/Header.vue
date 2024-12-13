<script setup>
    import { RouterLink } from 'vue-router';
    import { useAuthModalStore } from '../../stores/authModal';

    const auth_component_store = useAuthModalStore();

    defineProps({
        windowWidth: Number,
    });

    const showNav = () => {
        const navigation = document.getElementById('navigation');
        if (navigation.className === "hide nav-small"){
            navigation.className = "nav-small";
            return;
        }
        navigation.className = "hide nav-small";
    };

    const logIn = () => {
        auth_component_store.logIn();
    };

    const register = () => {
        auth_component_store.register();
    }

</script>

<template>
    <header>
        <template v-if="windowWidth > 460">
            <RouterLink class="logo is-current" :to="{ path:'/', hash:'#main' }">
                <div class="logo navbar-button">
                    <h3>KenUin</h3>
                </div>
            </RouterLink>
            <nav class="nav-big">
                <RouterLink :to="{ path:'/', hash:'#about' }">
                    <div class="navbar-button">About</div>
                </RouterLink>

                <RouterLink class="is-current" to="/games">
                    <div class="navbar-button">Games</div>
                </RouterLink>

                <RouterLink class="is-current"to="/rankings">
                    <div class="navbar-button">Ranking</div>
                </RouterLink>

                <RouterLink :to="{ path:'/', hash:'#news' }">
                    <div class="navbar-button">News</div>
                </RouterLink>

                <RouterLink :to="{ path:'/', hash:'#contact' }">
                    <div class="navbar-button">Contact</div>
                </RouterLink>
            </nav>
        </template>
        <template v-else>
            <div>
                <button @click="showNav" class="menu-icon-box navbar-button">
                    <div class="menu-icon-line"></div>
                    <div class="menu-icon-line"></div>
                    <div class="menu-icon-line"></div>
                </button>
                <nav id="navigation" class="hide nav-small">
                    <RouterLink :to="{ path:'/', hash:'#about' }">
                        <div class="navbtn-small">About</div>
                    </RouterLink>

                    <RouterLink class="is-current-small" to="/games">
                        <div class="navbtn-small">Games</div>
                    </RouterLink>

                    <RouterLink class="is-current-small"to="/rankings">
                        <div class="navbtn-small">Ranking</div>
                    </RouterLink>

                    <RouterLink :to="{ path:'/', hash:'#news' }">
                        <div class="navbtn-small">News</div>
                    </RouterLink>

                    <RouterLink :to="{ path:'/', hash:'#contact' }">
                        <div class="navbtn-small">Contact</div>
                    </RouterLink>
                </nav>
            </div>
            <div class="logo navbar-button center-x">
                <RouterLink class="is-current-small" :to="{ path:'/', hash:'#main' }">
                    <h3>KenUin</h3>
                </RouterLink>
            </div>
        </template>

        <div class="user-panel">
            <button
                @click="logIn"
                :class="`${auth_component_store.calledFor === 'login' ? 'is-current' : ''} navbar-button`"
            >
                Log In
            </button>
            <button
                @click="register"
                :class="`${auth_component_store.calledFor === 'register' ? 'is-current' : ''} navbar-button`"
            >
                Register
            </button>
        </div>
    </header>
</template>
