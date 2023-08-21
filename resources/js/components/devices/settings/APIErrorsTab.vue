<template>
    <div v-if="this.getErrors.length">
        {{ this.getErrors }}
    </div>
    <div v-else>
        <p>Устройство не поддерживает ошибки. Добавьте новую или используйте шаблон.</p>
    </div>
    <div class="mt-4" v-show="!this.showNewError">
        <button class="btn btn-primary font-medium" @click="newError">Новая ошибка</button>
    </div>
    <div class="mt-4" v-show="this.showNewError">
        <div class="flex sm:flex-row flex-col gap-2">
            <div class="form-control w-full">
                <label class="label" for="name">
                    <span class="label-text">Ошибка</span>
                </label>
                <input type="text" name="name" id="name"  placeholder="Низкое напряжение" class="input input-bordered w-full input-sm" autocomplete="on"/>
            </div>
            <div class="form-control w-full">
                <label class="label" for="priority">
                    <span class="label-text">Приоритет</span>
                </label>
                <input type="number" name="priority" id="priority" class="input input-bordered w-full input-sm" autocomplete="on"/>
            </div>
            <div class="form-control w-full">
                <label class="label" for="name">
                    <span class="label-text">Цвет</span>
                </label>
                <input type="number" name="name" id="name" class="input input-bordered w-full input-sm" autocomplete="on"/>
            </div>
            <div class="flex gap-2 items-end">
                <button class="btn btn-success" @click="newError"><PlusIcon class="h-5 w-5"></PlusIcon></button>
                <button class="btn btn-error" @click="newError"><XMarkIcon class="h-5 w-5"></XMarkIcon></button>
            </div>
        </div>
    </div>
</template>

<script>

import {mapGetters} from "vuex";
import { PlusIcon, XMarkIcon } from '@heroicons/vue/24/outline'

export default {
    components: {
        PlusIcon,
        XMarkIcon
    },
    props: {
        device: Object
    },
    data() {
        return {
            showNewError: false
        }
    },
    computed: {
        ...mapGetters([
            'getErrors',
        ]),
    },
    methods: {
        newError() {
            this.showNewError = true;
        }
    }
}
</script>

<style scoped>

</style>
