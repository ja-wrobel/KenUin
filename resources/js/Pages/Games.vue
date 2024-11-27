<script setup>
    import GameTile from "../Components/GameTile.vue";
</script>

<template>
    <div id="games" class="img-as-bgr games main-bgr">
        <div class="tile-box">
            <GameTile :pre-index-btn-dest="`/game`" :post-index-btn-dest="'/play'">
                Play
            </GameTile>
        </div>
    </div>
</template>

