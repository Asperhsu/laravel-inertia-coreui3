<template>
    <form @submit.prevent="submit">
        <div class="card">
            <div class="card-body">
                <Form ref="form" :errors="errors" />
            </div>

            <div class="card-footer">
                <SubmitBtn />
            </div>
        </div>
    </form>
</template>

<script>
    import SubmitBtn from '@/Components/Btns/SubmitBtn';
    import Form from "./Form";

    export default {
        components: {SubmitBtn, Form},
        metaInfo: {
            title: 'Create User',
        },
        props: {
            errors: Object,
        },
        mounted () {
            this.$store.commit('setBreadcrumbs', [
                {text: 'Users', href: this.$route('users.index')},
                {text: 'Create'},
            ]);
        },
        methods: {
            submit() {
                this.$inertia.post(this.$route('users.store'), this.$refs.form.fields)
            },
        },
    }
</script>
