<template>
    <div>
        <span class="mr-2" v-show="this.settingsPage">ID{{ status.id }}</span>
        <span class="badge font-medium" :class="'badge-' + status.color">{{ status.name }}</span>
        <div class="dropdown dropdown-top m-1 ml-4" v-show="this.settingsPage">
            <label tabindex="0" class="btn !btn-xs"><XMarkIcon class="h-3 w-3"></XMarkIcon></label>
            <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
                <li><a class="bg-status" @click="this.deleteStatus(status.id)">Удалить?</a></li>
            </ul>
        </div>
    </div>
</template>

<script>
import {XMarkIcon} from "@heroicons/vue/24/outline/index.js";
import {mapActions} from "vuex";

export default {
    components: {
        XMarkIcon
    },
    props: {
        status: Object,
        settingsPage: false
    },
    emits: ['statusDelete'],
    methods: {
        ...mapActions([
            'destroyStatus'
        ]),
        async deleteStatus(statusID) {
            await this.destroyStatus(statusID).finally(() => {
                this.$emit('statusDelete');
            });
        }
    }
}
</script>

<style scoped>

</style>
