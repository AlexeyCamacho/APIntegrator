<template>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4">
                <button class="btn btn-primary font-medium" @click="openAddDeviceModal">Добавить устройство</button>
            </div>
            <div v-if="!devicesCount" class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
                Устройств не найдено
            </div>
            <div v-for="device in this.getDevices" class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4 my-4">
                <router-link :to="{ name: 'DevicePage', params: { deviceId: device.id }}">
                    {{ device.name }}
                </router-link>
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

