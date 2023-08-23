<template>
    <div class="flex sm:flex-row flex-col gap-2">
        <div class="form-control w-full">
            <label class="label" for="name">
                <span class="label-text">Ошибка</span>
            </label>
            <input type="text" name="name" id="name" v-model="this.newErrorForm.data.name" placeholder="Низкое напряжение" class="input input-bordered w-full input-sm" autocomplete="on"/>
            <ErrorsMessage :errors="v$.newErrorForm.data.name.$errors"></ErrorsMessage>
        </div>
        <div class="form-control w-full">
            <label class="label" for="priority">
                <span class="label-text">Приоритет</span>
            </label>
            <input type="number" name="priority" id="priority" v-model="this.newErrorForm.data.priority" class="input input-bordered w-full input-sm" autocomplete="on"/>
        </div>
        <div class="form-control w-full">
            <label class="label" for="name">
                <span class="label-text">Цвет</span>
            </label>
            <select class="select select-bordered w-full max-w-xs py-0 h-8 min-h-8"
                    :class="['bg-' + this.newErrorForm.data.color, 'text-' + this.newErrorForm.data.color + '-content']"
                    v-model="this.newErrorForm.data.color">
                <option v-for="color in this.getColors" :class="['bg-' + color, 'text-' + color + '-content']">{{color}}</option>
            </select>
        </div>
        <div class="flex flex-col">
            <label class="label invisible" for="name">
                <span class="label-text">Цвет</span>
            </label>
            <div class="flex gap-2">
                <button class="btn btn-success !h-8" @click="newError"><PlusIcon class="h-5 w-5"></PlusIcon></button>
                <button class="btn btn-error !h-8" @click="hideFormNewError"><XMarkIcon class="h-5 w-5"></XMarkIcon></button>
            </div>
        </div>
    </div>
</template>

<script>
import {useVuelidate} from "@vuelidate/core/dist/index.mjs";
import {minLength, required} from "@vuelidate/validators";
import { PlusIcon, XMarkIcon } from '@heroicons/vue/24/outline'
import ErrorsMessage from "../../shared/ErrorsMessage.vue";
import {mapActions, mapGetters} from "vuex";

export default {
    components: {
        PlusIcon,
        XMarkIcon,
        ErrorsMessage
    },
    props: {
        deviceID: Number
    },
    setup: () => ({ v$: useVuelidate() }),
    validations () {
        return {
            newErrorForm: {
                data: {
                    name: {
                        required,
                        minLength: minLength(2)
                    },
                }
            }
        }
    },
    data() {
        return {
            showNewError: false,
            newErrorForm: {
                data: {
                    name: '',
                    priority: 1,
                    color: 'info'
                },
                processing: false,
            }
        }
    },
    emits: ['closeForm'],
    computed: {
        ...mapGetters([
            'getColors'
        ]),
    },
    methods: {
        ...mapActions([
            'storeError'
        ]),
        hideFormNewError() {
            this.showNewError = false;
            this.newErrorForm.data.name = '';
            this.newErrorForm.data.color = 'info';
            this.newErrorForm.data.priority = 1;
            this.v$.$reset();
            this.$emit('closeForm');
        },
        async newError() {
            this.newErrorForm.processing = true;
            let isFormCorrect = await this.v$.$validate()
            if (isFormCorrect) {
                await this.storeError({deviceID: this.deviceID, data: this.newErrorForm.data})
                    .then((response) => {
                        this.hideFormNewError();
                        this.$emit('closeForm');
                    }).finally(() => {
                        this.newErrorForm.processing = false;
                    });
            }
            this.newErrorForm.processing = false;
        }
    }
}
</script>

<style scoped>

</style>
