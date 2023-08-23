export default {
    getErrors: state => {
        return state.errors;
    },
    getErrorsByCreate: state => {
        let errors = state.errors;
        errors.sort((a, b) => parseFloat(b.id) - parseFloat(a.id));
        return errors;
    },
}
