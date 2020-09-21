<template>
    <inertia-link class="btn btn-sm btn-ghost-primary" :href="href">
        <i class="fa fa-pen"></i>
    </inertia-link>
</template>

<script>
    export default {
        props: {
            href: String,
        },
    }
</script>
