export default {
    getUser: state => {
        return state.user;
    },
    getPermissions: state => {
        return state.permissions;
    },
    checkPermisson: state => (name) => {
        let index = state.permissions.findIndex(p => p.name === name);
        return index !== -1;
    }
}
