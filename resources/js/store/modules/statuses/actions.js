import statuses from '../../../API/statuses.js';
import { useToast } from 'vue-toastification';

const toast = useToast();

export default {
    async loadStatuses(state, deviceID) {
        return await statuses.loadStatuses(deviceID)
            .then((response) => {
                state.commit('setStatuses', response.data);
            })
            .catch((e) => {
                toast.error(e.response.data.message);
            });
    },
    async storeStatus(state, form) {
        return await statuses.storeStatus(form.deviceID, form.data)
            .then((response) => {
                state.commit('pushStatus', response.data);
                return response.data;
            })
            .catch((e) => {
                toast.error(e.response.data.message);
            });
    },
    async destroyStatus(state, statusID) {
        return await statuses.destroyStatus(statusID)
            .then((response) => {
                toast.success('Статус удален');
                state.commit('deleteStatus', response.data);
                return response.data;
            })
            .catch((e) => {
                toast.error(e.response.data.message);
            });
    },
}
