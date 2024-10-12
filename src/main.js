import { createApp } from 'vue';
import './style.css';
import App from './App.vue';
import { modalPlugin } from '@kouts/vue-modal';
import '@kouts/vue-modal/dist/vue-modal.css';

createApp(App).use(modalPlugin).mount('#app')
