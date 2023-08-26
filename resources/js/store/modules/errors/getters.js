export default {
    getErrors: state => {
        return state.errors;
    },
    getErrorsByCreate: state => {
        let errors = state.errors;
        errors.sort((a, b) => parseFloat(b.id) - parseFloat(a.id));
        return errors;
    },
    getActiveErrorsByPriority: state => {
        let errors = state.activeErrors;
        errors.sort((a, b) => parseFloat(b.priority) - parseFloat(a.priority));
        return errors;
    },
}
