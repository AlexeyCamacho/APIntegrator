<template>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4">
                <button class="btn btn-primary font-medium" @click="openAddDeviceModal">Добавить устройство</button>
            </div>
            <div v-if="!devicesCount" class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
                Устройств не найдено
            </div>
        </div>
    </div>

    <Modal :show="showAddDeviceModal" @close="closeAddDeviceModal">
        <div class="p-6">
            <h2 class="text-lg font-medium text-gray-900">
                Добавление нового устройства
            </h2>
            <form>
                <div class="form-control w-full my-1">
                    <label class="label">
                        <span class="label-text">Имя устройства</span>
                    </label>
                    <input type="text" name="name" v-model="this.newDeviceForm.data.name" placeholder="Кофе-машина" class="input input-bordered w-full input-sm" />
                    <ErrorsMessage :errors="v$.newDeviceForm.data.name.$errors"></ErrorsMessage>
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Описание устройства</span>
                    </label>
                    <textarea name="description" v-model="this.newDeviceForm.data.description" class="textarea textarea-bordered h-24 resize-none" placeholder="ТЦ 'МегаСити'"></textarea>
                </div>
            </form>

            <div class="mt-6 flex justify-end gap-2">
                <button class="btn btn-active btn-neutral" @click="closeAddDeviceModal"> Отмена </button>
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
import { mapGetters, mapActions } from 'vuex'
import Modal from '../components/shared/Modal.vue';
import { useVuelidate } from '@vuelidate/core'
import { required, minLength, requiredIf } from '@vuelidate/validators'
import ErrorsMessage from "../components/shared/ErrorsMessage.vue";

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
    data() {
        return {
            showAddDeviceModal: false,
            newDeviceForm: {
                data: {
                    name: '',
                    description: ''
                },
                processing: false,
            }
        }
    },
    computed: {
        ...mapGetters([
            'getDevices',
            'devicesCount'
        ]),
    },
    methods: {
        ...mapActions([
            'loadDevices',
            'storeDevice'
        ]),
        closeAddDeviceModal() {
            this.showAddDeviceModal = false;
            this.v$.$reset();
            this.resetNewDeviceForm();
        },
        openAddDeviceModal() {
            this.showAddDeviceModal = true;
        },
        async newDevice() {
            this.newDeviceForm.processing = true;
            let isFormCorrect = await this.v$.$validate()
            if (isFormCorrect) {
                await this.storeDevice(this.newDeviceForm.data);
            }
            this.newDeviceForm.processing = false;
        },
        resetNewDeviceForm() {
            for (let key in this.newDeviceForm.data) {
                this.newDeviceForm.data[key] = '';
            }
        }
    }
}
</script>

