<template>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-row mb-4 justify-between">
                <div>
                    <button class="btn btn-primary font-medium" @click="openAddDeviceModal">Добавить устройство</button>
                </div>
                <div class="justify-center self-center">
                    <input type="text" name="deviceName" id="deviceName" placeholder="Поиск" v-model="this.search" class="input input-bordered w-full input-sm" autocomplete="on">
                </div>
            </div>
            <div v-if="!devicesCount" class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
                Устройств не найдено
            </div>
            <div v-for="device in this.paginatedDevices" class="bg-white overflow-hidden shadow-sm sm:rounded-lg my-4">
                <DeviceItem :device="device"></DeviceItem>
            </div>

            <div class="flex justify-center">
                <div class="join">
                    <button class="join-item btn" @click="this.prevPage" :class="[this.page <= 1 ? 'btn-disabled' : '']">«</button>
                    <button class="join-item btn">{{ this.page }}</button>
                    <button class="join-item btn" @click="this.nextPage" :class="[this.page >= this.pages ? 'btn-disabled' : '']">»</button>
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
import DeviceItem from "../components/devices/DeviceItem.vue";

export default {
    components: {
        NewDeviceModal,
        ViewDevicePasswordModal,
        DeviceItem
    },
    data() {
        return {
            showAddDeviceModal: false,
            showViewPasswordDeviceModal: false,
            deviceKey: '',
            devicePerPage: 5,
            page: 1,
            search: ''
        }
    },
    computed: {
        ...mapGetters([
            'getDevices',
            'devicesCount'
        ]),
        pages() {
            return Math.ceil(this.filteredDevices.length / this.devicePerPage);
        },
        paginatedDevices() {
            let from = (this.page - 1) * this.devicePerPage;
            let to = from + this.devicePerPage;
            return this.filteredDevices.slice(from, to);
        },
        filteredDevices() {
            return this.getDevices.filter((device) =>
                device.name.toLowerCase().includes(this.search.toLowerCase())
            );
        }
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
        },
        nextPage() {
            this.page += 1;
        },
        prevPage() {
            this.page -= 1;
        },
    },
    beforeMount() {
        this.loadDevices();
    }
}
</script>

