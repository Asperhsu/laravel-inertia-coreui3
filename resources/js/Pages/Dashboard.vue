<template>
    <div>
        <h1>Hello World</h1>
    </div>
</template>

<script>
    export default {
        metaInfo: {
            title: 'Dashboard',
        },
        mounted () {
            this.$store.commit('setBreadcrumbs', [
                {text: 'Dashboard'},
            ]);
        },
    }
</script>
