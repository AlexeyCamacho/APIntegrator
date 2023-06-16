<template>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4">
                <button class="btn btn-primary btn-sm font-medium">Добавить устройство</button>
            </div>
            <div v-if="!devicesCount" class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
                Устройств не найдено
            </div>
        </div>
    </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'

export default {
    computed: {
        ...mapActions([
            'loadDevices'
        ]),
        ...mapGetters([
            'getDevices',
            'devicesCount'
        ]),
    }
}
</script>

