export default {
    getStatuses: state => {
        return state.statuses;
    },
    getStatusesByCreate: state => {
        let statuses = state.statuses;
        statuses.sort((a, b) => parseFloat(b.id) - parseFloat(a.id));
        return statuses;
    },
    getActiveStatuses: state => {
        return state.activeStatuses;
    },
}
