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
                <div class="form-control w-full max-w-xs my-1">
                    <label class="label">
                        <span class="label-text">Имя устройства</span>
                    </label>
                    <input type="text" placeholder="Кофе-машина" class="input input-bordered w-full max-w-xs input-sm" />
                </div>

                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Описание устройства</span>
                    </label>
                    <textarea class="textarea textarea-bordered h-24 resize-none" placeholder="Находится в ТЦ 'МегаСити'"></textarea>
                </div>
            </form>

            <div class="mt-6 flex justify-end gap-2">
                <button class="btn btn-active btn-neutral" @click="closeAddDeviceModal"> Отмена </button>

<!--                :class="{ 'opacity-25': form.processing }"-->
<!--                :disabled="form.processing"-->

                <button
                    class="btn btn-primary"

                    @click="newDevice"
                >
                    Добавить
                </button>
            </div>
            <div class="flex justify-end mt-2">
<!--                <Transition enter-from-class="opacity-0" leave-to-class="opacity-0" class="transition ease-in-out">-->
<!--                    <p v-if="form.hasErrors" class="text-sm text-red-700 self-center">Ошибка при удалении.</p>-->
<!--                </Transition>-->
            </div>
        </div>
    </Modal>

</template>

<script>
import { mapGetters, mapActions } from 'vuex'
import Modal from '../components/shared/Modal.vue';
import { useForm } from 'vee-validate';

export default {
    components: {
        Modal
    },
    data() {
        return {
            showAddDeviceModal: false
        }
    },
    computed: {
        ...mapActions([
            'loadDevices'
        ]),
        ...mapGetters([
            'getDevices',
            'devicesCount'
        ]),
    },
    methods: {
        closeAddDeviceModal() {
            this.showAddDeviceModal = false;
        },
        openAddDeviceModal() {
            this.showAddDeviceModal = true;
        },
        newDevice() {

        }
    }
}
</script>

