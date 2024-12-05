import './bootstrap';
import { createApp } from 'vue';
import { createPinia } from 'pinia';

import app from './App.vue';
import router from './router';

const pinia = createPinia();

createApp(app).use(router).use(pinia).mount('#app');
