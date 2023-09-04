import {mapGetters} from "vuex";

export default {
    methods: {
        checkDeviceOperator(deviceID) {
            return this.checkPermisson('devices.*.' + deviceID) || this.checkPermisson('devices.control.' + deviceID);
        },
        checkDeviceAdmin(deviceID) {
            return this.checkPermisson('devices.*.' + deviceID);
        }
    },
    computed: {
        ...mapGetters([
            'checkPermisson',
        ]),
    },
}
