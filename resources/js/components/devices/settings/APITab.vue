<template>
    <div>
        <p class="mb-2 text-justify">Для доступа устройства к API сайта используются логин и пароль. В случае утери пароля, его можно перегенерировать.</p>
        <p class="mb-3">Логин: {{ device.login }}</p>

        <div class="collapse bg-base-200">
            <input type="checkbox" class="peer w-full" />
            <div class="collapse-title bg-warning text-warning-content peer-checked:bg-error peer-checked:text-error-content">
                Сгенерировать новый пароль
            </div>
            <div class="collapse-content bg-warning text-warning-content peer-checked:bg-error peer-checked:text-error-content">
                <button class="btn btn-warning" @click="this.generateNewPassword">Сгенерировать новый пароль</button>
            </div>
        </div>

    </div>

    <ViewDevicePasswordModal v-model:show="this.showViewPasswordDeviceModal" :deviceKey="this.deviceKey"></ViewDevicePasswordModal>
</template>

<script>
import ViewDevicePasswordModal from "../../shared/Modals/ViewDevicePassword.vue";
import {mapActions} from "vuex";

export default {
    components: {
        ViewDevicePasswordModal
    },
    props: {
        device: Object,
        deviceKey: '',
    },
    data() {
        return {
            showViewPasswordDeviceModal: false
        }
    },
    methods: {
        ...mapActions([
            'genNewDevicePassword'
        ]),
        generateNewPassword() {
            this.genNewDevicePassword(this.device.id);
        }
    },
}
</script>

<style scoped>

</style>
