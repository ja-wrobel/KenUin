import { createRouter, createWebHistory } from "vue-router";

import WelcomePage from "../Pages/Welcome.vue";
import GamesPage from "../Pages/Games.vue";
import RankingsPage from "../Pages/Rankings.vue";
import NotFound from "../Pages/NotFound.vue";

const routes = [
    {
        path: '/',
        component: WelcomePage,
    },
    {
        path: '/games',
        component: GamesPage,
    },
    {
        path: '/rankings',
        component: RankingsPage,
    },
    {
        path: '/:pathMatch(.*)*',
        component: NotFound,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
    scrollBehavior(to, from, savedPosition) {
        if (savedPosition) {
            return savedPosition;
        }
        if (to.hash) {
            return { el: to.hash, top: 30 };
        }
        return { x:0, y:0 };
    },
});

export default router;
