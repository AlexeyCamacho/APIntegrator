<template>
    <Modal :show="this.show" @close="closeModal">
        <div class="p-6">
            <h2 class="text-lg font-medium text-gray-900 text-justify">
                Новое устройство успешно добавлено. Для доступа к API сгенерирован секретный ключ. Пожалуйста, сохраните его в надежное место.
            </h2>


            <div class="my-5 flex justify-center sm:ml-6">
                <div class="bg-warning p-2 rounded-lg">
                    <span>{{ this.deviceKey }}</span>
                </div>
                <Square2StackIcon class="w-6 h-6 ml-2 cursor-pointer self-center" @click="this.copyKey"></Square2StackIcon>
            </div>

            <p class="mt-1 text-sm text-gray-600 text-justify">
                В дальнейшем восстановить данный ключ будет невозможно, однако будет возможность перегенерировать его.
            </p>

            <div class="mt-6 flex justify-end gap-2">
                <button class="btn btn-neutral" @click="closeModal"> Закрыть </button>
            </div>
        </div>
    </Modal>
</template>

<script>
import Modal from './Modal.vue';
import { Square2StackIcon } from '@heroicons/vue/24/outline'
import { useToast } from 'vue-toastification';
const toast = useToast();

export default {
    components: {
        Modal,
        Square2StackIcon
    },
    props: {
        deviceKey: String,
        show: Boolean,
    },
    emits: ['update:show'],
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
    methods: {
        closeModal() {
            this.proxyShow = false;
        },
        copyKey() {
            navigator.clipboard.writeText(this.deviceKey);
            toast.info('Ключ скопирован');
        }
    },
}
</script>
