export default {
    setStatuses(state, statuses) {
        state.statuses = statuses;
    },
    pushStatus(state, status) {
        state.statuses.push(status);
    },
    deleteStatus(state, statusID) {
        let statuses = state.statuses;
        let index = statuses.findIndex(p => p.id === statusID);
        statuses.splice(index, 1);
        state.statuses = statuses;
    },
    setActiveStatuses(state, statuses) {
        state.activeStatuses = statuses;
    },
}
