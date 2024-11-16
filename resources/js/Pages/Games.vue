<script setup>
    import GameTile from "../Components/GameTile.vue";
</script>

<template>
    <div id="games" class="img-as-bgr games main-bgr">
        <div class="tile-box">
            <GameTile :btn-destination="`/play_game`">
                Play
            </GameTile>
        </div>
    </div>
</template>

