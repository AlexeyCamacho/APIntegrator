import DevicesPage from "../pages/DevicesPage.vue";
import DevicePage from "../pages/DevicePage.vue";
import DeviceSettingsPage from "../pages/DeviceSettingsPage.vue";

export default [
    {
        path: '/devices',
        component: DevicesPage,
        name: 'DevicesPage',
    },
    {
        path: '/devices/:deviceID',
        component: DevicePage,
        name: 'DevicePage',
    },
    {
        path: '/devices/:deviceID/settings',
        component: DeviceSettingsPage,
        name: 'DeviceSettings',
    },
]
