<template>
    <Modal :show="this.show" @close="closeModal">
        <div class="p-6">
            <h2 class="text-lg font-medium text-gray-900">
                Добавление нового устройства
            </h2>
            <form>
                <div class="form-control w-full my-1">
                    <label class="label" for="name">
                        <span class="label-text">Имя устройства</span>
                    </label>
                    <input type="text" name="name" id="name" v-model="this.newDeviceForm.data.name" placeholder="Кофе-машина" class="input input-bordered w-full input-sm" autocomplete="on"/>
                    <ErrorsMessage :errors="v$.newDeviceForm.data.name.$errors"></ErrorsMessage>
                </div>
                <div class="form-control">
                    <label class="label" for="description">
                        <span class="label-text">Описание устройства</span>
                    </label>
                    <textarea name="description" id="description" v-model="this.newDeviceForm.data.description" class="textarea textarea-bordered h-24 resize-none" placeholder="ТЦ 'МегаСити'" autocomplete="on"></textarea>
                </div>
            </form>

            <div class="mt-6 flex justify-end gap-2">
                <button class="btn btn-neutral" @click="closeModal"> Отмена </button>
                <button
                    class="btn btn-primary"
                    :class="{ 'opacity-25': this.newDeviceForm.processing }"
                    :disabled="this.newDeviceForm.processing"
                    @click="newDevice"
                >
                    Добавить
                </button>
            </div>
        </div>
    </Modal>
</template>

<script>
import { mapActions } from 'vuex'
import Modal from './Modal.vue';
import { useVuelidate } from '@vuelidate/core'
import { required, minLength } from '@vuelidate/validators'
import ErrorsMessage from "../ErrorsMessage.vue";

export default {
    components: {
        Modal,
        ErrorsMessage
    },
    setup: () => ({ v$: useVuelidate() }),
    validations () {
        return {
            newDeviceForm: {
                data: {
                    name: {
                        required,
                        minLength: minLength(3)
                    },
                }
            }
        }
    },
    props: {
        show: Boolean
    },
    emits: ['update:show', 'succeedStoreDevice'],
    computed: {
        proxyShow: {
            get() {
                return this.show
            },
            set(value) {
                this.$emit('update:show', value)
            }
        }
    },
    data() {
        return {
            newDeviceForm: {
                data: {
                    name: '',
                    description: ''
                },
                processing: false,
            }
        }
    },
    methods: {
        ...mapActions([
            'storeDevice'
        ]),
        closeModal() {
            this.proxyShow = false;
            this.v$.$reset();
            this.resetNewDeviceForm();
        },
        async newDevice() {
            this.newDeviceForm.processing = true;
            let isFormCorrect = await this.v$.$validate()
            if (isFormCorrect) {
                await this.storeDevice(this.newDeviceForm.data)
                    .then((response) => {
                        this.closeModal();
                        this.$emit('succeedStoreDevice', response.password);
                    }).finally(() => {
                        this.newDeviceForm.processing = false;
                    });
            }
            this.newDeviceForm.processing = false;
        },
        resetNewDeviceForm() {
            for (let key in this.newDeviceForm.data) {
                this.newDeviceForm.data[key] = '';
            }
        }
    },
}
</script>

