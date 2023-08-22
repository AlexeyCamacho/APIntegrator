export default {
    setErrors(state, errors) {
        state.errors = errors;
    },
    pushError(state, error) {
        state.errors.push(error);
    },
}
