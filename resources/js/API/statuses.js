let path = '/api/statuses'
import axios from 'axios'

export default {
    async loadStatuses(deviceID) {
        return axios.get(`${path}/` + deviceID);
    },
    async storeStatus(deviceID, data) {
        return axios.post(`${path}/` + deviceID, data);
    },
    async destroyStatus(statusID) {
        return axios.delete(`${path}/` + statusID);
    },
}
