<template>
    <Modal :show="this.show" @close="closeModal">
        <div class="p-6">
            <h2 class="text-lg font-medium text-gray-900">
                Новое устройство успешно добавлено. Для доступа к API сгенерирован секретный ключ. Пожалуйста, сохраните его в надежное место.
            </h2>

            <div class="my-5 flex justify-center">
                <div class="bg-warning p-2 rounded-lg">
                    <span>{{ this.deviceKey }}</span>
                </div>
            </div>

            <p class="mt-1 text-sm text-gray-600">
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

export default {
    components: {
        Modal
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
    },
}
</script>
