import {ref, watchEffect} from 'vue'

export function checkOnline(last_access, minutes) {
    const online = ref(null);

    watchEffect(() => {
        // reset state before fetching..
        online.value = null
        // toValue() unwraps potential refs or getters
        let lastDate = new Date(last_access);
        lastDate.setMinutes(lastDate.getMinutes() + minutes);
        console.log(lastDate);
        online.value =  lastDate > new Date();
    })

    return { online };
}
