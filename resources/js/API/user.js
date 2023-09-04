let path = '/api/user'
import axios from 'axios'

export default {
    async loadUser() {
        return axios.get(`${path}/`);
    },
}
