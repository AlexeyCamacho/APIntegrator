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
                state.commit('setActiveErrors', response.data.active_errors);
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
                toast.success('Устройство удалено');
                return response.data;
            })
            .catch((e) => {
                toast.error(e.response.data.message);
                throw e;
            });
    },
    async genNewDevicePassword(state, deviceID) {
        return await devices.generateNewPassword(deviceID)
            .then((response) => {
                return response.data;
            })
            .catch((e) => {
                toast.error(e.response.data.message);
                throw e;
            });
    },
    async updateDevice(state, device) {
        return await devices.updateDevice(device.id, device.data)
            .then((response) => {
                state.commit('setDevice', response.data);
                toast.success('Настройки сохранены',{
                    position: POSITION.BOTTOM_RIGHT
                });
                return response.data;
            })
            .catch((e) => {
                toast.error(e.response.data.message);
                throw e;
            });
    },
}
