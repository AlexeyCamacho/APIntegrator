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
                    <div class="flex flex-row rounded-lg border">
                        <div class="basis-1/4 border p-4">
                            Иконка
                        </div>
                        <div class="p-4">
                            Другое
                        </div>
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
</template>

<script>
import { mapGetters, mapActions } from 'vuex'


export default {
    data() {
        return {

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
    },
    beforeMount() {
        this.loadDevice(this.$route.params.deviceId);
    }
}
</script>

