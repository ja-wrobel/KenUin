import { defineStore } from "pinia";
import axios from 'axios';

export const useGamesStore = defineStore('games', {
    state: () => ({
        data: [],
        createdAt: Number,
        ttl: Number,
        etag: String,
        isAlive: false
    }),
    actions: {
        async fetchGames() {
            return await axios.get('/api/games')
                .then((response) => {
                    this.$patch(response.data);
                    this.setInLocalStorage(response);
                    return this.data;
                });
        },
        setInLocalStorage(response) {
            this.createdAt = new Date().getTime();
            this.ttl = Number(
                response.headers.get('cache-control', /\d+/)[0]
            );
            this.etag = response.headers.get('etag');
            this.isAlive = true;

            localStorage.setItem('games-cached', JSON.stringify(this));
        },
        constructFromLocalStorage() {
            if (localStorage.getItem('games-cached') === null) {
                return;
            }

            const act_date = new Date().getTime();
            const cached = JSON.parse(localStorage.getItem('games-cached'));

            if (act_date > (cached.createdAt + (cached.ttl*1000))) {
                localStorage.clear();
                this.isAlive = false;
                return;
            }

            this.data = cached.data;
            this.createdAt = cached.createdAt;
            this.ttl = cached.ttl;
            this.etag = cached.etag;
            this.isAlive = true;
        }
    }
});
