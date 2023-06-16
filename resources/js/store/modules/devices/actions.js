import devices from '../../../API/devices';
import { useToast } from 'vue-toastification';

const toast = useToast();

export default {
    async loadDevices(context, user_id) {
        return await devices.loadDevices().then((response) => {
            context.commit('setDevices', response.data)
        }).catch((e) => {
            throw new Error(e.response.data)
        })
    },
}
