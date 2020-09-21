<template>
    <inertia-link class="btn btn-sm btn-success" :href="href">
        <i class="fa fa-plus"></i>
    </inertia-link>
</template>

<script>
    export default {
        props: {
            href: String,
        },
    }
</script>
