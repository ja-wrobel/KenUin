<script setup>
    import { onMounted, ref } from 'vue';
    import Axios from 'axios';
    import { buildWebStorage, setupCache } from 'axios-cache-interceptor';
    import { RouterLink } from 'vue-router';

    defineProps({
        preIndexBtnDest: {
            type: String,
            required: false,
        },
        postIndexBtnDest: {
            type: String,
            required: false,
        }
    });

    const instance = Axios.create();
    const axios = setupCache(instance, {
        storage: buildWebStorage(localStorage, 'axios-cache'),
    });

    const games = ref({});

    const fetchGames = async () => {
        return await axios.get('/api/games')
            .then((response) => {
                return response.data;
            });
    };

    onMounted(async () => {
        if (localStorage.getItem('axios-cache687007452') === null) {
            games.value = await fetchGames();
            return;
        }

        const act_date = new Date().getTime();
        const cached = JSON.parse(localStorage.getItem('axios-cache687007452'));

        if (act_date > (cached.createdAt + cached.ttl)) {
            localStorage.clear();
            games.value = await fetchGames();
            return;
        }

        games.value = cached.data.data;
    });
</script>

<template>
    <div class="tile" v-for="game in games.data" :key="game.id">
        <div class="header flex">
            <div class="text txt-align-l">{{ game.difficulty }}</div>
            <div class="text title txt-align-c">{{ game.name }}</div>
            <div class="text txt-align-r">{{ game.type }}</div>
        </div>
        <div class="body">
            {{ game.description }}
        </div>
        <div class="footer flex">
            <RouterLink class="button w-100" :to="{ path:`${preIndexBtnDest}/${game.id}${postIndexBtnDest}` }">
                <slot />
            </RouterLink>
        </div>
    </div>
</template>
