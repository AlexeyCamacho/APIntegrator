export default {
    setDevices(state, devices) {
        state.devices = devices
    },
    setDevice(state, device) {
        state.device = device
    },
    pushDevice(state, device) {
        state.devices.unshift(device);
    },
    destroyDevice(state, deviceID) {

    }

}
