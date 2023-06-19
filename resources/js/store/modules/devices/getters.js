export default {
    getDevices: state => {
        return state.devices;
    },
    getDevice: state => {
        return state.device;
    },
    devicesCount: state => {
        return state.devices.length;
    }
}
