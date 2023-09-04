export default {
    setUser(state, user) {
        state.user = user;
    },
    setPermissions(state, user) {
        state.permissions = user.permissions;
    },
}
