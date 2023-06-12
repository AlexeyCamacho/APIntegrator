import { createRouter, createWebHistory } from 'vue-router'
import admin from "./admin";

const baseRoutes = []

const routes = baseRoutes.concat(
    admin,
)

const router = createRouter({
    history: createWebHistory(),
    scrollBehavior() {
        return { top: 0 }
    },
    routes
})

export default router
