let path = '/api/devices'
import axios from 'axios'

export default {
    async loadDevices() {
        return axios.get(`${path}/`);
    },
    async showDevice(deviceID) {
        return axios.get(`${path}/` + deviceID + '/show');
    },
    async storeDevice(device) {
        return axios.post(`${path}/`, device);
    },
    async destroyDevice(deviceID) {
        return axios.delete(`${path}/` + deviceID);
    },
    async generateNewPassword(deviceID) {
        return axios.patch(`${path}/` + deviceID + '/password');
    },
}
