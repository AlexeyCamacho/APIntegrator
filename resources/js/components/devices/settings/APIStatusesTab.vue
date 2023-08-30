<template>
    <div v-if="this.getStatusesByCreate.length">
        <div class="mb-2" >Список доступных статусов:</div>
        <template v-for="status in this.getStatusesByCreate">
            <Status :status="status" :settings-page="true" @status-Delete="clearFocus"></Status>
        </template>
    </div>
    <div v-else>
        <p>Устройство не поддерживает состояния. Добавьте новое или используйте шаблон.</p>
    </div>
    <div class="mt-4" v-show="!this.showNewStatus">
        <button class="btn btn-primary font-medium" @click="showFormNewStatus">Новый статус</button>
    </div>
    <div class="mt-4" v-show="this.showNewStatus">
        <NewStatusForm :device-i-d="this.device.id" @close-Form="hideFormNewStatus"></NewStatusForm>
    </div>
</template>

<script>
import {mapActions, mapGetters} from "vuex";
import NewStatusForm from "../../shared/statuses/NewStatusForm.vue";
import Status from "../../shared/statuses/Status.vue";
import clearFocus from "../../mixins/clearFocus.js";

export default {
    components: {
        NewStatusForm,
        Status
    },
    mixins: [clearFocus],
    props: {
        device: Object
    },
    data() {
        return {
            showNewStatus: false,
        }
    },
    computed: {
        ...mapGetters([
            'getStatusesByCreate',
            'getColors'
        ]),
    },
    methods: {
        ...mapActions([
            'storeStatus'
        ]),
        showFormNewStatus() {
            this.showNewStatus = true;
        },
        hideFormNewStatus() {
            this.showNewStatus = false;
        },
    }
}
</script>

<style scoped>

</style>
