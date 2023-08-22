<template>
    <div v-if="this.getErrors.length">
        {{ this.getErrors }}
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

export default {
    components: {
        NewErrorForm
    },
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
            'getErrors',
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
