<template>
    <div class="flex flex-row">
        <div class="flex sm:flex-row flex-col gap-2 md:basis-2/3 grow md:grow-0">
            <div class="form-control w-full">
                <label class="label" for="name">
                    <span class="label-text">Статус</span>
                </label>
                <input type="text" name="name" id="name" v-model="this.newStatusForm.data.name" placeholder="Заряжается" class="input input-bordered w-full input-sm" autocomplete="on"/>
                <ErrorsMessage :errors="v$.newStatusForm.data.name.$errors"></ErrorsMessage>
            </div>
            <div class="form-control w-full">
                <label class="label" for="name">
                    <span class="label-text">Цвет</span>
                </label>
                <select class="select select-bordered w-full max-w-xs py-0 h-8 min-h-8"
                        :class="['bg-' + this.newStatusForm.data.color, 'text-' + this.newStatusForm.data.color + '-content']"
                        v-model="this.newStatusForm.data.color">
                    <option v-for="color in this.getColors" :class="['bg-' + color, 'text-' + color + '-content']">{{color}}</option>
                </select>
            </div>
            <div class="flex flex-col">
                <label class="label invisible" for="name">
                    <span class="label-text">Цвет</span>
                </label>
                <div class="flex gap-2">
                    <button class="btn btn-success !h-8" @click="newStatus"><PlusIcon class="h-5 w-5"></PlusIcon></button>
                    <button class="btn btn-error !h-8" @click="hideFormNewStatus"><XMarkIcon class="h-5 w-5"></XMarkIcon></button>
                </div>
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
            newStatusForm: {
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
            newStatusForm: {
                data: {
                    name: '',
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
            'storeStatus'
        ]),
        hideFormNewStatus() {
            this.newStatusForm.data.name = '';
            this.newStatusForm.data.color = 'info';
            this.v$.$reset();
            this.$emit('closeForm');
        },
        async newStatus() {
            this.newStatusForm.processing = true;
            let isFormCorrect = await this.v$.$validate()
            if (isFormCorrect) {
                await this.storeStatus({deviceID: this.deviceID, data: this.newStatusForm.data})
                    .then((response) => {
                        this.hideFormNewStatus();
                        this.$emit('closeForm');
                    }).finally(() => {
                        this.newStatusForm.processing = false;
                    });
            }
            this.newStatusForm.processing = false;
        }
    }
}
</script>

<style scoped>

</style>
