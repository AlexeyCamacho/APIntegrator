<template>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4">
                <button class="btn btn-primary font-medium" @click="openAddDeviceModal">Добавить устройство</button>
            </div>
            <div v-if="!devicesCount" class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
                Устройств не найдено
            </div>
            <div v-for="device in this.getDevices" class="bg-white overflow-hidden shadow-sm sm:rounded-lg my-4">
                <div class="flex flex-row">
                    <div class="basis-52 border-grey-600 border-r-2 p-4">icon</div>
                    <div class="basis-full">
                        <div class="flex flex-row justify-between p-4 shadow">
                            <div class="text-xl">
                                <router-link :to="{ name: 'DevicePage', params: { deviceId: device.id }}">
                                    {{ device.name }}
                                </router-link>
                            </div>
                            <div>
                                <div class="badge badge-info">
                                    Online
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-row pr-4 pb-4 pl-1 pt-1">
                            <div class="basis-1/2">
                                <div>Последний запрос: 31.07.2023 15:40</div>
                                <div class="mt-2">Ошибки:</div>
                            </div>
                            <div class="basis-1/2 flex items-end justify-end gap-2">
                                <button class="btn btn-outline btn-error">Отключить</button>
                                <button class="btn btn-outline btn-primary">Перезагрузить</button>
                                <button class="btn btn-outline btn-neutral">Выгрузить данные</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <NewDeviceModal v-model:show="this.showAddDeviceModal" @succeed-Store-Device="openViewPasswordDeviceModal"></NewDeviceModal>
    <ViewDevicePasswordModal v-model:show="this.showViewPasswordDeviceModal" :deviceKey="this.deviceKey"></ViewDevicePasswordModal>

</template>

<script>
import { mapGetters, mapActions } from 'vuex'
import NewDeviceModal from '../components/shared/Modals/NewDevice.vue';
import ViewDevicePasswordModal from '../components/shared/Modals/ViewDevicePassword.vue';

export default {
    components: {
        NewDeviceModal,
        ViewDevicePasswordModal
    },

    data() {
        return {
            showAddDeviceModal: false,
            showViewPasswordDeviceModal: false,
            deviceKey: '',
        }
    },
    computed: {
        ...mapGetters([
            'getDevices',
            'devicesCount'
        ]),
    },
    methods: {
        ...mapActions([
            'loadDevices'
        ]),
        openAddDeviceModal() {
            this.showAddDeviceModal = true;
        },
        openViewPasswordDeviceModal(key) {
            this.deviceKey = key;
            this.showViewPasswordDeviceModal = true;
        }
    },
    beforeMount() {
        this.loadDevices();
    }
}
</script>

