import { createRouter, createWebHistory } from 'vue-router'
import admin from "./admin";
import devices from "./devices";
import statistics from "./statistics";

const baseRoutes = []

const routes = baseRoutes.concat(
    admin,
    devices,
    statistics
)

const router = createRouter({
    history: createWebHistory(),
    scrollBehavior() {
        return { top: 0 }
    },
    routes
})

export default router
