<template>
    <div class="text-sm breadcrumbs">
        <ul>
            <li @click="this.$router.push({ name: 'DevicesPage'})"><a>Устройства</a></li>
            <li class="text-xl">{{ this.device.name }}</li>
        </ul>
    </div>
    <div class="bg-white overflow-hidden shadow-sm rounded-lg">
        <div class="flex flex-row border-b-2">
            <div class="basis-1/4 p-4 border-r-2 hidden md:block">
                Иконка
            </div>
            <div class="p-4 w-full">
                <div class="flex flex-row justify-between">
                    <div class="flex gap-2">
                        <div v-if="checkOnline(this.device.last_access, 10)">
                            <span class="badge badge-info font-semibold">Online</span>
                        </div>
                        <div v-else>
                            <span class="badge badge-error font-semibold">Offline</span>
                        </div>
                        <template v-for="status in this.getActiveStatuses">
                            <Status :status="status" :settings-page="false"></Status>
                        </template>
                    </div>
                    <div v-if="this.checkDeviceOperator(this.device.id)">
                        <div class="dropdown dropdown-left">
                            <label tabindex="0" class="btn m-1">...</label>
                            <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
                                <li @click="this.$router.push({ name: 'DeviceSettings', params: { deviceID: this.device.id }})"><a>Настройки</a></li>
                                <li @click="this.$emit('openDeleteDeviceModal')" v-if="this.checkDeviceAdmin(this.device.id)"><a>Удалить</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div>
                    Последний запрос:
                    <template v-if="this.device.last_access">{{ this.device.last_access }}</template>
                    <template v-else> запросы не обнаружены</template>
                </div>
            </div>
        </div>
        <div class="p-4" v-if="this.device.description">
            <p class="text-sm">{{ this.device.description }}</p>
        </div>
        <div class="flex flex-row p-4 justify-between">
            <div>
                <p>Ошибки:</p>
                <div v-if="this.getActiveErrorsByPriority.length">
                    <template v-for="error in this.getActiveErrorsByPriority">
                        <Error :error="error" :settings-page="false"></Error>
                    </template>
                </div>
                <div class="alert alert-success p-2 gap-1" v-else>
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <span>Ошибок не найдено</span>
                </div>
            </div>
            <div>Кнопки</div>
        </div>
        <div class="flex flex-col p-4">Статистика</div>
    </div>
</template>

<script>
import checkOnline from "../mixins/CheckOnline.js";
import {mapGetters} from "vuex";
import Error from "../shared/errors/Error.vue";
import Status from "../shared/statuses/Status.vue";
import checkPermissions from "../mixins/checkPermissions.js";

export default {
    components: {
        Error,
        Status
    },
    mixins: [checkOnline, checkPermissions],
    props: {
        device: Object
    },
    emits: ['openDeleteDeviceModal'],
    computed: {
        ...mapGetters([
            'getActiveErrorsByPriority',
            'getActiveStatuses',
        ]),
    },
}
</script>

<style scoped>

</style>
