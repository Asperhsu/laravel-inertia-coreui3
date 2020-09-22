<template>
    <form @submit.prevent="submit">
        <div class="card">
            <div class="card-body">
                <Form ref="form" :errors="errors" :user="user" />
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
            title: 'Edit User',
        },
        props: {
            errors: Object,
            user: Object,
        },
        mounted () {
            this.$store.commit('setBreadcrumbs', [
                {text: 'Users', to: this.$route('users.index')},
                {text: 'Edit'},
            ]);
        },
        methods: {
            submit() {
                this.$inertia.put(this.$route('users.update', this.user.id), this.$refs.form.fields)
            },
        },
    }
</script>
