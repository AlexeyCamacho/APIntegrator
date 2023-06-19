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
                    {{ device.name }}
            </div>
        </div>
    </div>

    <NewDeviceModal v-model:show="this.showAddDeviceModal"></NewDeviceModal>

</template>

<script>
import { mapGetters, mapActions } from 'vuex'
import NewDeviceModal from '../components/shared/Modals/NewDevice.vue';

export default {
    components: {
        NewDeviceModal,
    },

    data() {
        return {
            showAddDeviceModal: false,
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
    },
    beforeMount() {
        this.loadDevices();
    }
}
</script>

