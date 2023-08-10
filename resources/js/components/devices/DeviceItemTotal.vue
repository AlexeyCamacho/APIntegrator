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
                    <div class="badge badge-info" v-if="checkOnline(this.device.last_access, 10)">
                        Online
                    </div>
                    <div class="badge badge-error" v-else>
                        Offline
                    </div>
                    <div>
                        <div class="dropdown dropdown-left">
                            <label tabindex="0" class="btn m-1">...</label>
                            <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
                                <li @click="this.$router.push({ name: 'DeviceSettings', params: { deviceID: this.device.id }})"><a>Настройки</a></li>
                                <li @click="this.$emit('openDeleteDeviceModal')"><a>Удалить</a></li>
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
        <div class="p-4">
            <p class="text-sm">{{ this.device.description }}</p>
        </div>
        <div class="flex flex-row p-4 justify-between">
            <div>Ошибки</div>
            <div>Кнопки</div>
        </div>
        <div class="flex flex-col p-4">Статистика</div>
    </div>
</template>

<script>
import checkOnline from "../mixins/CheckOnline.js";

export default {
    mixins: [checkOnline],
    props: {
        device: Object
    },
    emits: ['openDeleteDeviceModal'],
}
</script>

<style scoped>

</style>
