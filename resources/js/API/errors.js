let path = '/api/errors'
import axios from 'axios'

export default {
    async loadErrors(deviceID) {
        return axios.get(`${path}/` + deviceID);
    },
    async storeError(deviceID, data) {
        return axios.post(`${path}/` + deviceID, data);
    },
    async destroyError(errorID) {
        return axios.delete(`${path}/` + errorID);
    },
}
