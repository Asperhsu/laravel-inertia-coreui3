<template>
    <h1>About</h1>
</template>

<script>
    export default {
        metaInfo: {
            title: 'About',
        },
        mounted () {
            this.$store.commit('setBreadcrumbs', [
                {text: 'About'},
            ]);
        },
    }
</script>
