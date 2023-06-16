<template>
    <div class="my-1">
        <div v-for="error in this.errors">
            <span class="text-red-500 text-sm">{{error.$message}}</span>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        errors: Array,
    },
}
</script>
