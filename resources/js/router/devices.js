import DevicesPage from "../pages/Devices.vue";
import DevicePage from "../pages/Device.vue";

export default [
    {
        path: '/devices', component: DevicesPage, name: 'DevicesPage',
    },
    {
        path: '/devices/:deviceId+', component: DevicePage, name: 'DevicePage',
    },
]
