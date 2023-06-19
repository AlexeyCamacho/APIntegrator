<template>
    <Modal :show="this.show" @close="closeModal">
        <div class="p-6">
            <h2 class="text-lg font-medium text-gray-900">
                Новое устройство успешно добавлено.
            </h2>
            <form>
                <div class="form-control w-full my-1">
                    <label class="label" for="name">
                        <span class="label-text">Имя устройства</span>
                    </label>
                    <input type="text" name="name" id="name" autocomplete v-model="this.newDeviceForm.data.name" placeholder="Кофе-машина" class="input input-bordered w-full input-sm" />
                    <ErrorsMessage :errors="v$.newDeviceForm.data.name.$errors"></ErrorsMessage>
                </div>
                <div class="form-control">
                    <label class="label" for="description">
                        <span class="label-text">Описание устройства</span>
                    </label>
                    <textarea name="description" id="description" v-model="this.newDeviceForm.data.description" class="textarea textarea-bordered h-24 resize-none" placeholder="ТЦ 'МегаСити'"></textarea>
                </div>
            </form>

            <div class="mt-6 flex justify-end gap-2">
                <button class="btn btn-active btn-neutral" @click="closeModal"> Отмена </button>
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
import Modal from './Modal.vue';

export default {

}
</script>
