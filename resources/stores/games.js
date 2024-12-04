import { defineStore } from "pinia";
import axios from 'axios';

export const useGamesStore = defineStore('games', {
    state: () => ({
        data: [],
        createdAt: 0,
        ttl: 0,
        etag: '""',
        isAlive: false
    }),
    actions: {
        getGames() {
            if (localStorage.getItem('games-cached') !== null) {
                this.constructFromLocalStorage();
            }
            if (this.isAlive === true) {
                return;
            }
            axios.get('/api/games')
                .then((response) => {
                    this.$patch({
                        data: response.data.data,
                        createdAt: new Date().getTime(),
                        ttl: Number(response.headers.get('cache-control', /\d+/)[0]),
                        etag: response.headers.get('etag'),
                        isAlive: true
                    });
                });
        },
        setLocalStorage(state) {
            state.payload.$id = state.storeId;
            localStorage.setItem('games-cached', JSON.stringify(state.payload));
        },
        constructFromLocalStorage() {
            const act_date = new Date().getTime();
            const cached = JSON.parse(localStorage.getItem('games-cached'));

            if (act_date > (cached.createdAt + (cached.ttl*1000))) {
                localStorage.clear();
                this.isAlive = false;
                return;
            }

            if (this.createdAt === cached.createdAt) {
                return;
            }
            // patching is necessary only after page refresh, that's why we need this if above
            this.$patch({
                data: cached.data,
                createdAt: cached.createdAt,
                ttl: cached.ttl,
                etag: cached.etag,
                isAlive: true
            });
        }
    }
});
