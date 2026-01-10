import { createApp } from 'vue';
import './bootstrap';
import WeatherApp from './Pages/WeatherApp.vue';

const app = createApp(WeatherApp);
app.mount('#app');
