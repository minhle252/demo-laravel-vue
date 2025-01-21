// resources/js/router.js
import { createRouter, createWebHistory } from 'vue-router';
import TodoApp from './pages/hello.vue';
import AboutPage from './pages/minhle.vue'; // Tạo một component về trang Giới thiệu
import CreateNews from './pages/news/create.vue'; // Tạo một component về trang Giới thiệu
import EditNews from './pages/news/edit.vue'; // Tạo một component về trang Giới thiệu
import ListNews from './pages/news/listNews.vue'; // Tạo một component về trang Giới thiệu

const routes = [
    {
        path: '/',
        name: 'home',
        component: TodoApp, 
    },
    {
        path: '/about',
        name: 'about',
        component: AboutPage, 
    },
    {
        path: '/admin/news/create',
        name: 'create',
        component: CreateNews, 
    },
    {
        path: '/admin/news',
        name: 'list',
        component: ListNews, 
    },
    {
        path: '/admin/news/:id',
        name: 'update',
        component: EditNews, 
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
