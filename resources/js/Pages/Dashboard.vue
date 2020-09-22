<template>
    <div>
        <h1>Hello World</h1>
        <CLink to="about" class="btn btn-link">About</CLink>
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
