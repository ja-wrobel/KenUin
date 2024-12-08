<script setup>
    import { RouterLink } from 'vue-router';
    import { useAuthStateStore } from '../../stores/authState';

    const auth_component_state = useAuthStateStore();

    defineProps({
        windowWidth: Number,
    });

    const showNav = ()=>{
        const navigation = document.getElementById('navigation');
        if (navigation.className === "hide nav-small"){
            navigation.className = "nav-small";
            return;
        }
        navigation.className = "hide nav-small";
    };

</script>

<template>
    <header>
        <template v-if="windowWidth > 460">
            <RouterLink class="logo" :to="{ path:'/', hash:'#main' }">
                <div class="navbar button">
                    <h3>KenUin</h3>
                </div>
            </RouterLink>
            <nav class="nav-big">
                <RouterLink :to="{ path:'/', hash:'#about' }">
                    <div class="navbar button">About</div>
                </RouterLink>

                <RouterLink to="/games">
                    <div class="navbar button">Games</div>
                </RouterLink>

                <RouterLink to="/rankings">
                    <div class="navbar button">Ranking</div>
                </RouterLink>

                <RouterLink :to="{ path:'/', hash:'#news' }">
                    <div class="navbar button">News</div>
                </RouterLink>

                <RouterLink :to="{ path:'/', hash:'#contact' }">
                    <div class="navbar button">Contact</div>
                </RouterLink>
            </nav>
        </template>
        <template v-else>
            <div>
                <button @click="showNav" class="menu-icon-box navbar button">
                    <div class="menu-icon-line"></div>
                    <div class="menu-icon-line"></div>
                    <div class="menu-icon-line"></div>
                </button>
                <nav id="navigation" class="hide nav-small">
                    <RouterLink :to="{ path:'/', hash:'#about' }">
                        <div class="navbtn-small">About</div>
                    </RouterLink>

                    <RouterLink to="/games">
                        <div class="navbtn-small">Games</div>
                    </RouterLink>

                    <RouterLink to="/rankings">
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
            <div class="logo navbar button center-x">
                <RouterLink :to="{ path:'/', hash:'#main' }">
                    <h3>KenUin</h3>
                </RouterLink>
            </div>
        </template>

        <div class="user-panel">
            <button @click="auth_component_state.logIn" class="log-in navbar button">
                Log In
            </button>
            <button @click="auth_component_state.register" class="register navbar button">
                Register
            </button>
        </div>
    </header>
</template>
