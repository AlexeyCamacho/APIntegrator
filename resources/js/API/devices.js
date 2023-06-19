let path = '/api/devices'
import axios from 'axios'

export default {
    async loadDevices() {
        return axios.get(`${path}/`);
    },
    async storeDevice(device) {
        return axios.post(`${path}/`, device);
    },
}
