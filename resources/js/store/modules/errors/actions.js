import errors from '../../../API/errors.js';
import { useToast, POSITION } from 'vue-toastification';

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
}
