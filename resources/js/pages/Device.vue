<template>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div v-if="!getDevice" class="bg-white overflow-hidden shadow-sm rounded-lg p-4">
                Устройство не найдено
            </div>
            <template v-else class="my-4">
                <div class="px-1 text-xl">
                    {{ getDevice.name }}
                </div>
                <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                    <div class="flex flex-row border-b-2">
                        <div class="basis-1/4 p-4 border-r-2">
                            Иконка
                        </div>
                        <div class="p-4 w-full">
                            <div class="flex flex-row justify-between">
                                <div class="badge badge-info">
                                    Online
                                </div>
                                <div>
                                    <div class="dropdown dropdown-left">
                                        <label tabindex="0" class="btn m-1">...</label>
                                        <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
                                            <li><a>Настройки</a></li>
                                            <li @click="openDeleteDeviceModal"><a>Удалить</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div>
                                Последний запрос: 01.08.2023 11:29
                            </div>
                        </div>
                    </div>
                    <div class="p-4">
                        <p class="text-sm">{{ getDevice.description }}</p>
                    </div>
                    <div class="flex flex-row p-4 justify-between">
                        <div>Ошибки</div>
                        <div>Кнопки</div>
                    </div>
                    <div class="flex flex-col p-4">Статистика</div>
                </div>
            </template>
        </div>
    </div>

    <DeleteDeviceModal v-model:show="this.showDeviceDeviceModal" :deviceName="getDevice.name" :deviceID="getDevice.id"
                       @succeed-Destroy-Device="this.$router.push({ name: 'DevicesPage' })"></DeleteDeviceModal>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'
import DeleteDeviceModal from '../components/shared/Modals/DeleteDevice.vue';


export default {
    components: {
        DeleteDeviceModal
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

