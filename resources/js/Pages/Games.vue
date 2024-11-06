<template>
    <div id="games" class="img-as-bgr main-bgr">
        <div class="tile-box">
            <GameTile v-for="game in games" :game="game">
                Play
            </GameTile>
        </div>
    </div>
</template>

<script setup>
import GameTile from '../Components/GameTile.vue';

const games = [
    {
        id: 1,
        name: "Galactic Quest",
        type: "arcade",
        description: "A thrilling space adventure where players battle alien forces across galaxies.",
        difficulty: "medium",
        dir_path: "/games/galactic-quest",
        created_at: "2024-11-05T10:00:00Z",
        updated_at: "2024-11-05T10:00:00Z"
    },
    {
        id: 2,
        name: "Quiz Whiz",
        type: "quiz",
        description: "A quiz game challenging players with questions from various categories.",
        difficulty: "medium_easy",
        dir_path: "/games/quiz-whiz",
        created_at: "2024-11-05T10:05:00Z",
        updated_at: "2024-11-05T10:05:00Z"
    },
    {
        id: 3,
        name: "Speed Racer",
        type: "racing",
        description: "A high-speed racing game featuring exotic cars and challenging tracks.",
        difficulty: "hard",
        dir_path: "/games/speed-racer",
        created_at: "2024-11-05T10:10:00Z",
        updated_at: "2024-11-05T10:10:00Z"
    },
    {
        id: 4,
        name: "Battle Royale",
        type: "pvp",
        description: "A multiplayer game where players compete to be the last one standing.",
        difficulty: "medium_hard",
        dir_path: "/games/battle-royale",
        created_at: "2024-11-05T10:15:00Z",
        updated_at: "2024-11-05T10:15:00Z"
    },
    {
        id: 5,
        name: "Arcade Frenzy",
        type: "arcade",
        description: "A retro-style arcade game with modern twists and multiple levels.",
        difficulty: "easy",
        dir_path: "/games/arcade-frenzy",
        created_at: "2024-11-05T10:20:00Z",
        updated_at: "2024-11-05T10:20:00Z"
    },
    {
        id: 6,
        name: "Monster Clash",
        type: "fighting",
        description: "Face off against mythical creatures in epic combat sequences.",
        difficulty: "medium",
        dir_path: "/games/monster-clash",
        created_at: "2024-11-05T10:25:00Z",
        updated_at: "2024-11-05T10:25:00Z"
    },
    {
        id: 7,
        name: "Quiz Quest",
        type: "quiz",
        description: "An engaging game that tests general knowledge with fun facts.",
        difficulty: "easy",
        dir_path: "/games/quiz-quest",
        created_at: "2024-11-05T10:30:00Z",
        updated_at: "2024-11-05T10:30:00Z"
    },
    {
        id: 8,
        name: "Stealth Ops",
        type: "strategy",
        description: "Strategize your way through challenging missions and enemy hideouts.",
        difficulty: "medium_hard",
        dir_path: "/games/stealth-ops",
        created_at: "2024-11-05T10:35:00Z",
        updated_at: "2024-11-05T10:35:00Z"
    },
    {
        id: 9,
        name: "Desert Rally",
        type: "racing",
        description: "Race across desert landscapes and unlock special vehicles.",
        difficulty: "medium",
        dir_path: "/games/desert-rally",
        created_at: "2024-11-05T10:40:00Z",
        updated_at: "2024-11-05T10:40:00Z"
    },
    {
        id: 10,
        name: "Alien Invaders",
        type: "shooter",
        description: "Defend Earth from waves of alien invaders in this action-packed shooter.",
        difficulty: "hard",
        dir_path: "/games/alien-invaders",
        created_at: "2024-11-05T10:45:00Z",
        updated_at: "2024-11-05T10:45:00Z"
    },
    {
        id: 11,
        name: "Treasure Hunt",
        type: "casual",
        description: "A casual exploration game where players search for hidden treasures.",
        difficulty: "easy",
        dir_path: "/games/treasure-hunt",
        created_at: "2024-11-05T10:50:00Z",
        updated_at: "2024-11-05T10:50:00Z"
    },
    {
        id: 12,
        name: "Zombie Survival",
        type: "shooter",
        description: "Survive waves of zombies in this intense, fast-paced shooter game.",
        difficulty: "medium_hard",
        dir_path: "/games/zombie-survival",
        created_at: "2024-11-05T10:55:00Z",
        updated_at: "2024-11-05T10:55:00Z"
    },
    {
        id: 13,
        name: "Puzzle Mania",
        type: "casual",
        description: "Solve a variety of puzzles that test logic, math, and problem-solving skills.",
        difficulty: "medium",
        dir_path: "/games/puzzle-mania",
        created_at: "2024-11-05T11:00:00Z",
        updated_at: "2024-11-05T11:00:00Z"
    },
    {
        id: 14,
        name: "Kingdom Defense",
        type: "strategy",
        description: "Defend your kingdom from invading forces using tactical maneuvers.",
        difficulty: "hard",
        dir_path: "/games/kingdom-defense",
        created_at: "2024-11-05T11:05:00Z",
        updated_at: "2024-11-05T11:05:00Z"
    },
    {
        id: 15,
        name: "Cosmic Fighters",
        type: "fighting",
        description: "Battle against cosmic warriors in an intergalactic fighting championship.",
        difficulty: "medium",
        dir_path: "/games/cosmic-fighters",
        created_at: "2024-11-05T11:10:00Z",
        updated_at: "2024-11-05T11:10:00Z"
    }
];
</script>
