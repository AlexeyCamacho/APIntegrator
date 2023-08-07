<template>
    <Modal :show="this.show" @close="closeModal">
        <div class="p-6">
            <h2 class="text-lg font-medium text-gray-900">
                Вы уверены, что хотите удалить устройство {{ this.deviceName }}?
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                Восстановить устройство будет невозможно.
            </p>

            <div class="mt-6 flex justify-end gap-2">
                <button class="btn btn-neutral" @click="closeModal"> Отмена </button>
                <button
                    class="btn btn-error"
                    :class="{ 'opacity-25': this.deleteDeviceForm.processing }"
                    :disabled="this.deleteDeviceForm.processing"
                    @click="deleteDevice"
                >
                    Удалить
                </button>
            </div>
        </div>
    </Modal>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'
import Modal from './Modal.vue';
import { useVuelidate } from '@vuelidate/core'
import { required, minLength, requiredIf } from '@vuelidate/validators'
import ErrorsMessage from "../ErrorsMessage.vue";
export default {
    components: {
        Modal,
    },
    props: {
        show: Boolean,
        deviceName: String,
        deviceID: Number
    },
    emits: ['update:show', 'succeedDestroyDevice'],
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
            deleteDeviceForm: {
                data: {
                    id: -1,
                },
                processing: false,
            }
        }
    },
    methods: {
        ...mapActions([
            'destroyDevice'
        ]),
        closeModal() {
            this.proxyShow = false;
        },
        async deleteDevice() {
            this.deleteDeviceForm.data.id = this.deviceID;
            this.deleteDeviceForm.processing = true;
            await this.destroyDevice(this.deleteDeviceForm.data.id)
                .then((response) => {
                    this.$emit('succeedDestroyDevice');
                }).finally(() => {
                    this.closeModal();
                    this.deleteDeviceForm.processing = false;
                });

        },
    },
}
</script>

