import DevicesPage from "../pages/DevicesPage.vue";
import DevicePage from "../pages/DevicePage.vue";

export default [
    {
        path: '/devices', component: DevicesPage, name: 'DevicesPage',
    },
    {
        path: '/devices/:deviceId+', component: DevicePage, name: 'DevicePage',
    },
]
