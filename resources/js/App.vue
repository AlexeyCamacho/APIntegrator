<template>
    <NavBar/>
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8 mt-5 overflow-y-auto">
        <router-view/>
    </div>
</template>

<script>
import NavBar from "./components/shared/navbar/NavBar.vue";
import { mapActions } from 'vuex'

export default {
    components: {
        NavBar: NavBar
    },
    methods: {
        ...mapActions([
            'loadUser'
        ])
    },
    beforeMount() {
        this.loadUser();
    }
}
</script>
