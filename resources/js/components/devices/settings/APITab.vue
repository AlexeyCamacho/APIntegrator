<template>
    <div>
        <p class="mb-2 text-justify">Для доступа устройства к API сайта используются логин и пароль. В случае утери пароля, его можно перегенерировать.</p>
        <p class="mb-3">Логин: {{ device.login }}</p>

        <div class="collapse bg-base-200">
            <input type="checkbox" class="peer w-full" v-model="this.showCollapse"/>
            <div class="collapse-title bg-warning text-warning-content peer-checked:bg-error peer-checked:text-error-content text-center">
                <ChevronDoubleRightIcon class="w-6 h-6 ml-2 cursor-pointer self-center inline"></ChevronDoubleRightIcon>
                <span class="align-middle">Сгенерировать новый пароль</span>
            </div>
            <div class="collapse-content bg-warning text-warning-content peer-checked:bg-error peer-checked:text-error-content text-center">
                <button class="btn btn-warning self-center" @click="this.generateNewPassword">Сгенерировать новый пароль</button>
            </div>
        </div>

    </div>

    <ViewDevicePasswordModal v-model:show="this.showViewPasswordDeviceModal" :deviceKey="this.deviceKey"></ViewDevicePasswordModal>
</template>

<script>
import ViewDevicePasswordModal from "../../shared/Modals/ViewDevicePassword.vue";
import { ChevronDoubleRightIcon } from '@heroicons/vue/24/outline'
import {mapActions} from "vuex";
import ErrorsMessage from "../../shared/ErrorsMessage.vue";

export default {
    components: {
        ViewDevicePasswordModal,
        ChevronDoubleRightIcon,
        ErrorsMessage
    },
    props: {
        device: Object,
    },
    data() {
        return {
            showViewPasswordDeviceModal: false,
            deviceKey: '',
            showCollapse: false,
        }
    },
    methods: {
        ...mapActions([
            'genNewDevicePassword'
        ]),
        async generateNewPassword() {
            await this.genNewDevicePassword(this.device.id)
                .then((response) => {
                    this.deviceKey = response;
                    this.showViewPasswordDeviceModal = true;
                    this.showCollapse = false;
                });
        }
    },
}
</script>

<style scoped>

</style>
