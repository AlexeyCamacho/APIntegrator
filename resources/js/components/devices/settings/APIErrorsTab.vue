<template>
    <div v-if="this.getErrorsByCreate.length">
        <div class="mb-2" >Список доступных ошибок:</div>
        <template v-for="error in this.getErrorsByCreate">
            <Error :error="error" :settings-page="true" @error-Delete="clearFocus"></Error>
        </template>
    </div>
    <div v-else>
        <p>Устройство не поддерживает ошибки. Добавьте новую или используйте шаблон.</p>
    </div>
    <div class="mt-4" v-show="!this.showNewError">
        <button class="btn btn-primary font-medium" @click="showFormNewError">Новая ошибка</button>
    </div>
    <div class="mt-4" v-show="this.showNewError">
        <NewErrorForm :device-i-d="this.device.id" @close-Form="hideFormNewError"></NewErrorForm>
    </div>
</template>

<script>
import {mapActions, mapGetters} from "vuex";
import NewErrorForm from "../../shared/errors/NewErrorForm.vue";
import Error from "../../shared/errors/Error.vue";
import clearFocus from "../../mixins/clearFocus.js";

export default {
    components: {
        NewErrorForm,
        Error
    },
    mixins: [clearFocus],
    props: {
        device: Object
    },
    data() {
        return {
            showNewError: false,
        }
    },
    computed: {
        ...mapGetters([
            'getErrorsByCreate',
            'getColors'
        ]),
    },
    methods: {
        ...mapActions([
            'storeError'
        ]),
        showFormNewError() {
            this.showNewError = true;
        },
        hideFormNewError() {
            this.showNewError = false;
        },
    }
}
</script>

<style scoped>

</style>
