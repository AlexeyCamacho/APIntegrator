import devices from '../../../API/devices';
import { useToast } from 'vue-toastification';

const toast = useToast();

export default {
    async loadDevices(state) {
        return await devices.loadDevices()
            .then((response) => {
                state.commit('setDevices', response.data);
                return response.data;
            })
            .catch((e) => {
                toast.error(e.response.data.message);
            });
    },
    async storeDevice(state, device) {
        return await devices.storeDevice(device)
            .then((response) => {
                state.commit('pushDevice', response.data.device);
                toast.success('Устройство добавлено');
            })
            .catch((e) => {
                toast.error(e.response.data.message);
            });
    },
}
