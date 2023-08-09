<template>
    <div class="md:flex flex-row">
        <div class="basis-52 border-grey-600 md:border-r-2 p-4 hidden md:block">icon</div>
        <div class="basis-full">
            <div class="sm:flex flex-row justify-between p-4 shadow">
                <div class="text-xl hover:underline">
                    <router-link :to="{ name: 'DevicePage', params: { deviceId: this.device.id }}">
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
            <div class="md:flex flex-row pr-4 pb-4 pl-1 pt-1">
                <div class="basis-1/2">
                    <div>Последний запрос:
                        <template v-if="this.device.last_access">{{ this.device.last_access }}</template>
                        <template v-else> запросы не обнаружены</template>
                    </div>
                    <div class="mt-2">Ошибки:</div>
                </div>
                <div class="basis-1/2 flex flex-col md:flex-row md:items-end justify-end gap-2">
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

export default {
    mixins: [checkOnline],
    props: {
        device: Object
    }
}
</script>

<style scoped>

</style>
