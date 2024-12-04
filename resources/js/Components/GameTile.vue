<script setup>
    import { onMounted } from 'vue';
    import { RouterLink } from 'vue-router';
    import { useGamesStore } from '../../stores/games';

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

    const games = useGamesStore();

    onMounted(() => {
        games.getGames();
        games.$subscribe((state) => {
            games.setLocalStorage(state);
        });
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
