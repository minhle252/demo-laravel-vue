// resources/js/app.js
import { createApp } from 'vue';
import App from './pages/App.vue';
import router from './router'; // Import router.js
import ToastPlugin from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';
const app = createApp(App);
app.use(ToastPlugin)
app.use(router); // Sử dụng Vue Router trong ứng dụng
app.mount('#app');
