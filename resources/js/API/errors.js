let path = '/api/errors'
import axios from 'axios'

export default {
    async loadErrors(deviceID) {
        return axios.get(`${path}/` + deviceID);
    },
}
