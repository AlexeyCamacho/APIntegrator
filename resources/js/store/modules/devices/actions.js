import devices from '../../../API/devices';
import { useToast } from 'vue-toastification';

const toast = useToast();

export default {
    async loadDevices(state) {
        return await devices.loadDevices()
            .then((response) => {
                state.commit('setDevices', response.data.device);
            })
            .catch((e) => {
                toast.error(e.response.data.message);
            });
    },
    async storeDevice(state, device) {
        return await devices.storeDevice(device)
            .then((response) => {
                state.commit('pushDevice', response.data);
                toast.success('Устройство добавлено');
                console.log(response.data);
            })
            .catch((e) => {
                toast.error(e.response.data.message);
            });
    },
}
