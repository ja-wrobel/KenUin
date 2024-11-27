<script setup>
    import GameTile from '../Components/GameTile.vue';
</script>

<template>
    <div id="rankings" class="img-as-bgr rankings main-bgr">
        <div class="tile-box">
            <div class="tile">
                <div class="header flex">
                    <div class="text title w-100">Total Score Ranking</div>
                </div>
                <div class="body">
                    Lorem ipsum pequena tico viajar cosa
                </div>
                <div class="footer flex">
                    <div class="button w-100">Show</div>
                </div>
            </div>
        </div>
        <div class="tile-box">
            <GameTile :pre-index-btn-dest="'/game'" :post-index-btn-dest="'/scores'">
                Show
            </GameTile>
        </div>
    </div>
</template>


