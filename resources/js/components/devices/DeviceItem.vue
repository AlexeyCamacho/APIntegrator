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
                <div>
                    <div class="badge badge-info" v-if="checkOnline(this.device.last_access, 10)">
                        Online
                    </div>
                    <div class="badge badge-error" v-else>
                        Offline
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
                        <div v-if="this.device.active_errors.length">
                            <p>Ошибки:</p>
                            <template v-for="error in this.device.active_errors">
                                <Error :error="error" :settings-page="false"></Error>
                            </template>
                        </div>
                        <div class="alert alert-success p-1" v-else>
                            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            <span>Ошибок не найдено.</span>
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

export default {
    components: {
        Error,
    },
    mixins: [checkOnline],
    props: {
        device: Object
    }
}
</script>

<style scoped>

</style>
