<template>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div v-if="!getDevice" class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
                Устройство не найдено
            </div>
            <div v-else class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4 my-4">
                {{ getDevice.name }}
            </div>
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

