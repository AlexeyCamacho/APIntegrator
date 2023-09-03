<template>
    <div class="md:flex flex-row">
        <div class="basis-52 border-grey-600 md:border-r-2 p-4 hidden md:block">icon</div>
        <div class="basis-full">
            <div class="sm:flex flex-row justify-between p-4 shadow">
                <div class="text-xl hover:underline">
                    <router-link :to="{ name: 'DevicePage', params: { deviceID: this.device.id }}">
                        {{ this.device.name }}
                    </router-link>
                </div>
                <div class="flex gap-2">
                    <template v-for="status in this.getDeviceStatuses">
                        <Status :status="status" :settings-page="false"></Status>
                    </template>
                    <div v-if="checkOnline(this.device.last_access, 10)">
                        <span class="badge badge-info font-semibold">Online</span>
                    </div>
                    <div v-else>
                        <span class="badge badge-error font-semibold">Offline</span>
                    </div>
                </div>
            </div>
            <div class="md:flex flex-row pr-4 pb-4 pl-1 pt-1 gap-1 justify-between">
                <div class="basis-1/2">
                    <div>Последний запрос:
                        <template v-if="this.device.last_access">{{ this.device.last_access }}</template>
                        <template v-else> запросы не обнаружены</template>
                    </div>
                    <div class="mt-2">
                        <div v-if="this.device.active_errors.length" class="flex flex-col gap-1">
                            <p>Ошибки:</p>
                            <template v-for="error in this.getDeviceErrorsByPriority">
                                <Error :error="error" :settings-page="false"></Error>
                            </template>
                        </div>
                        <div class="badge badge-success py-4" v-else>
                            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            Ошибок не найдено
                        </div>
                    </div>
                </div>
                <div class="basis-1/2 flex flex-col lg:flex-row lg:items-end justify-end gap-2 my-2 md:my-0">
                    <button class="btn btn-outline btn-error">Отключить</button>
                    <button class="btn btn-outline btn-primary">Перезагрузить</button>
                    <button class="btn btn-outline btn-neutral">Выгрузить данные</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import checkOnline from "../mixins/CheckOnline.js";
import Error from "../shared/errors/Error.vue";
import Status from "../shared/statuses/Status.vue";

export default {
    components: {
        Error,
        Status
    },
    mixins: [checkOnline],
    props: {
        device: Object
    },
    computed: {
        getDeviceErrorsByPriority() {
            return this.device.active_errors.sort((a, b) => parseFloat(b.priority) - parseFloat(a.priority)).slice(0, 3);
        },
        getDeviceStatuses() {
            return this.device.active_statuses.sort((a, b) => parseFloat(b.id) - parseFloat(a.id)).slice(0, 3);
        }
    }
}
</script>

<style scoped>

</style>
