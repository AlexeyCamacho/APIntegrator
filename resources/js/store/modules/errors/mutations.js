export default {
    setErrors(state, errors) {
        state.errors = errors;
    },
    pushError(state, error) {
        state.errors.push(error);
    },
    deleteError(state, errorID) {
        let errors = state.errors;
        let index = errors.findIndex(p => p.id === errorID);
        errors.splice(index, 1);
        state.errors = errors;
    },
    setActiveErrors(state, errors) {
        state.activeErrors = errors;
    },
}
