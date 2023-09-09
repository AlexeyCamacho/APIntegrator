<template>
    <div v-if="this.online">
        <span class="badge badge-info font-semibold">Online</span>
    </div>
    <div v-else>
        <span class="badge badge-error font-semibold">Offline</span>
    </div>
</template>

<script>
export default {
    props: {
        online: Boolean
    }
}
</script>

<style scoped>

</style>
