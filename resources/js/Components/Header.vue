<script setup>
    import { RouterLink } from 'vue-router';

    defineProps({
        windowWidth: Number,
    });

    const showNav = ()=>{
        const navbar = document.getElementById('navigation');
        if (navbar.className === "hide nav-small"){
            navbar.className = "nav-small";
            return;
        }
        navbar.className = "hide nav-small";
    };
</script>

<template>
    <header>
        <template v-if="windowWidth > 400">
            <div class="logo button">
                <RouterLink :to="{ path:'/', hash:'#main' }">
                    <h3>KenUin</h3>
                </RouterLink>
            </div>
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
                <div @click="showNav" class="menu-icon-box button">
                    <div class="menu-icon-line"></div>
                    <div class="menu-icon-line"></div>
                    <div class="menu-icon-line"></div>
                </div>
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
            <div class="logo button center-x">
                <RouterLink :to="{ path:'/', hash:'#main' }">
                    <h3>KenUin</h3>
                </RouterLink>
            </div>
        </template>

        <div class="user-panel">
            <button class="log-in button">
                Log In
            </button>
            <button class="register button">
                Register
            </button>
        </div>
    </header>
</template>
