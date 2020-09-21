<template>
    <button type="button" class="btn btn-sm btn-ghost-danger" @click="submit">
        <i class="fa fa-trash"></i>
    </button>
</template>

<script>
    export default {
        props: {
            href: String,
            name: String,
        },
        methods: {
            submit () {
                if (confirm(`Are you sure delete ${this.name || ''} ?`)) {
                    this.$inertia.delete(this.href);
                }
            },
        },
    }
</script>
