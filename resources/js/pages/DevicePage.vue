<template>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div v-if="!getDevice" class="bg-white overflow-hidden shadow-sm rounded-lg p-4">
                Устройство не найдено
            </div>
            <template v-else class="my-4">
                <DeviceItemTotal :device="getDevice" @open-Delete-Device-Modal="this.openDeleteDeviceModal"></DeviceItemTotal>
            </template>
        </div>
    </div>

    <DeleteDeviceModal v-model:show="this.showDeviceDeviceModal" :deviceName="getDevice.name" :deviceID="getDevice.id"
                       @succeed-Destroy-Device="this.$router.push({ name: 'DevicesPage' })"></DeleteDeviceModal>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'
import DeleteDeviceModal from '../components/shared/Modals/DeleteDevice.vue';
import DeviceItemTotal from "../components/devices/DeviceItemTotal.vue";


export default {
    components: {
        DeleteDeviceModal,
        DeviceItemTotal
    },
    data() {
        return {
            showDeviceDeviceModal: false,
        }
    },
    computed: {
        ...mapGetters([
            'getDevice',
        ]),
    },
    methods: {
        ...mapActions([
            'loadDevice'
        ]),
        openDeleteDeviceModal() {
            this.showDeviceDeviceModal = true;
        },
    },
    beforeMount() {
        this.loadDevice(this.$route.params.deviceId);
    }
}
</script>

