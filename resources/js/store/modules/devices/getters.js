export default {
    getDevices: state => {
        return state.devices;
    },
    devicesCount: state => {
        return state.devices.length;
    }
}
