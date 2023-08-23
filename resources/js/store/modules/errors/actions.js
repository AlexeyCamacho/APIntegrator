import errors from '../../../API/errors.js';
import { useToast, POSITION } from 'vue-toastification';
import devices from "../../../API/devices.js";

const toast = useToast();

export default {
    async loadErrors(state, deviceID) {
        return await errors.loadErrors(deviceID)
            .then((response) => {
                state.commit('setErrors', response.data);
            })
            .catch((e) => {
                toast.error(e.response.data.message);
            });
    },
    async storeError(state, form) {
        return await errors.storeError(form.deviceID, form.data)
            .then((response) => {
                state.commit('pushError', response.data);
                return response.data;
            })
            .catch((e) => {
                toast.error(e.response.data.message);
            });
    },
    async destroyError(state, errorID) {
        return await errors.destroyError(errorID)
            .then((response) => {
                toast.success('Ошибка удалена');
                state.commit('deleteError', response.data);
                return response.data;
            })
            .catch((e) => {
                toast.error(e.response.data.message);
            });
    },
}
