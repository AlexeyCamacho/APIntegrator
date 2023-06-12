import { createStore } from 'vuex'
import { getField, updateField } from 'vuex-map-fields';
import modules from './modules'

export const store = createStore({
    modules: modules,
    getters: {
        getField
    },
    mutations: {
        updateField
    },
})

