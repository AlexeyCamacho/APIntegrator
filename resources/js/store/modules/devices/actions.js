import devices from '../../../API/devices';
import { useToast, POSITION } from 'vue-toastification';

const toast = useToast();

export default {
    async loadDevices(state) {
        return await devices.loadDevices()
            .then((response) => {
                state.commit('setDevices', response.data);
            })
            .catch((e) => {
                toast.error(e.response.data.message);
                throw e;
            });
    },
    async loadDevice(state, deviceID) {
        return await devices.showDevice(deviceID)
            .then((response) => {
                state.commit('setDevice', response.data);
            })
            .catch((e) => {
                toast.error(e.response.data.message);
                throw e;
            });
    },
    async storeDevice(state, device) {
        return await devices.storeDevice(device)
            .then((response) => {
                state.commit('pushDevice', response.data.device);
                toast.success('Устройство добавлено',{
                    position: POSITION.BOTTOM_RIGHT
                });
                return response.data;
            })
            .catch((e) => {
                toast.error(e.response.data.message);
                throw e;
            });
    },
    async destroyDevice(state, deviceID) {
        return await devices.destroyDevice(deviceID)
            .then((response) => {
                state.commit('destroyDevice', response.data.device);
                toast.success('Устройство удалено');
                return response.data;
            })
            .catch((e) => {
                toast.error(e.response.data.message);
                throw e;
            });
    }
}
