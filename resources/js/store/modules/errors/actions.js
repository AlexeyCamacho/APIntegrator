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
                throw e;
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
                throw e;
            });
    },
}
