import { createRouter, createWebHistory } from "vue-router";
import Home from '../components/Home.vue'
import Files from '../components/Files.vue'
import Users from '../components/Users.vue'

const routes = [
    {
        path: '/',
        name: 'home',
        component:Home
    },
];

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes
});

export default router;