import user from "../../../API/user.js";

export default {
    async loadUser(state) {
        return await user.loadUser()
            .then((response) => {
                state.commit('setUser', response.data);
                state.commit('setPermissions', response.data);
            })
            .catch((e) => {
                toast.error(e.response.data.message);
            });
    },
}
