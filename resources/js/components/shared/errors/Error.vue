<template>
    <div>
        <span class="mr-2" v-show="this.settingsPage">ID{{ error.id }}</span>
        <span class="mr-2" v-show="this.settingsPage">Приоритет: {{ error.priority }}</span>
        <span class="badge font-medium" :class="'badge-' + error.color">{{ error.name }}</span>
        <div class="dropdown dropdown-top m-1 ml-4" v-show="this.settingsPage">
            <label tabindex="0" class="btn !btn-xs"><XMarkIcon class="h-3 w-3"></XMarkIcon></label>
            <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
                <li><a class="bg-error" @click="this.deleteError(error.id)">Удалить?</a></li>
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
        error: Object,
        settingsPage: false
    },
    emits: ['deviceDelete'],
    methods: {
        ...mapActions([
            'destroyError'
        ]),
        async deleteError(errorID) {
            await this.destroyError(errorID).finally(() => {
                this.$emit('deviceDelete');
            });
        }
    }
}
</script>

<style scoped>

</style>
