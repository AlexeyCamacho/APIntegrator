export default {
    setDevices(state, devices) {
        state.devices = devices
    },
    pushDevice(state, device) {
        state.devices.push(device);
    }

}
