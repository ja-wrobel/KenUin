<script setup>
    defineProps({
        game: Object,
    });
</script>

<template>
    <div class="tile">
        <div class="header flex">
            <div class="text">{{ game.difficulty }}</div>
            <div class="text title">{{ game.name }}</div>
            <div class="text">{{ game.type }}</div>
        </div>
        <div class="body">
            {{ game.description }}
        </div>
        <div class="footer flex">
            <button class="button w-100">
                <slot />
            </button>
        </div>
    </div>
</template>
