let path = '/api/errors'
import axios from 'axios'

export default {
    async loadErrors(errorID) {
        return axios.get(`${path}/` + errorID);
    },
    async storeError(errorID, data) {
        return axios.post(`${path}/` + errorID, data);
    },
    async destroyError(errorID) {
        return axios.delete(`${path}/` + errorID);
    },
}
