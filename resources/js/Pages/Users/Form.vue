<template>
    <div>
        <CInput
            label="Name"
            horizontal
            v-model="fields.name"
            :invalid-feedback="getInvalidMsg('name')"
            :isValid="isValid('name')"
        />
        <CInput
            type="email"
            label="Email"
            horizontal
            v-model="fields.email"
            :invalid-feedback="getInvalidMsg('email')"
            :isValid="isValid('email')"
        />
        <CInput
            type="password"
            label="Password"
            horizontal
            v-model="fields.password"
            :invalid-feedback="getInvalidMsg('password')"
            :isValid="isValid('password')"
        />
        <CInput
            type="password"
            label="Password Confirm"
            horizontal
            v-model="fields.password_confirmation"
            :invalid-feedback="getInvalidMsg('password_confirmation')"
            :isValid="isValid('password_confirmation')"
        />
    </div>
</template>

<script>
    import InteractsWithErrors from '@/mixin/InteractsWithErrors';
    export default {
        mixins: [InteractsWithErrors],
        props: {
            user: {
                type: Object,
                default: () => ({}),
            },
        },
        data() {
            return {
                fields: {
                    name: this.user.name,
                    email: this.user.email,
                    password: null,
                    password_confirmation: null,
                },
            };
        },
    }
</script>
