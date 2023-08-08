export default {
    methods: {
        checkOnline(last_access, minutes) {
            let lastDate = new Date(last_access);
            lastDate.setMinutes(lastDate.getMinutes() + minutes);
            return lastDate > new Date();
        }
    }
}
