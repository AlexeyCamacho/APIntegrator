<template>
    <div>
        <form>
            <div class="form-control w-full my-1">
                <label class="label" for="name">
                    <span class="label-text">Имя устройства</span>
                </label>
                <input type="text" name="name" id="name" v-model="this.editDeviceForm.data.name" placeholder="Кофе-машина" class="input input-bordered w-full input-sm" autocomplete="on"/>
                <ErrorsMessage :errors="v$.editDeviceForm.data.name.$errors"></ErrorsMessage>
            </div>
            <div class="form-control">
                <label class="label" for="description">
                    <span class="label-text">Описание устройства</span>
                </label>
                <textarea name="description" id="description" v-model="this.editDeviceForm.data.description" class="textarea textarea-bordered h-24 resize-none" placeholder="ТЦ 'МегаСити'" autocomplete="on"></textarea>
            </div>
        </form>

        <div class="mt-6 flex sm:justify-start gap-2">
            <button class="btn btn-primary" :class="{ 'opacity-25': this.editDeviceForm.processing }" :disabled="this.editDeviceForm.processing" @click="editDevice">Сохранить</button>
        </div>
    </div>
</template>

<script>
import {useVuelidate} from "@vuelidate/core/dist/index.mjs";
import {minLength, required} from "@vuelidate/validators";
import ErrorsMessage from "../../shared/ErrorsMessage.vue";
import {mapActions} from "vuex";

export default {
    components: {
        ErrorsMessage
    },
    props: {
        device: Object
    },
    setup: () => ({ v$: useVuelidate() }),
    validations () {
        return {
            editDeviceForm: {
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
            editDeviceForm: {
                data: {
                    name: this.device.name,
                    description: this.device.description
                },
                processing: false,
            }
        }
    },
    watch: {
        device(newValue){
            this.editDeviceForm.data.name = newValue.name
            this.editDeviceForm.data.description = newValue.description
        }
    },
    methods: {
        ...mapActions([
            'updateDevice'
        ]),
        async editDevice() {
            this.editDeviceForm.processing = true;
            let isFormCorrect = await this.v$.$validate()
            if (isFormCorrect) {
                await this.updateDevice({id: this.device.id, data: this.editDeviceForm.data});
            }
            this.editDeviceForm.processing = false;
        },
    },
}
</script>

<style scoped>

</style>
