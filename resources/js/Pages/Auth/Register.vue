<template>
    <div class="c-app flex-row align-items-center">
        <CContainer>
            <CRow class="justify-content-center">
                <CCol md="8">
                    <FlashMessages />

                    <CCard class="p-4">
                        <CCardBody>
                            <h1>Register</h1>
                            <CForm @submit.prevent="submit">
                                <CInput
                                    label="Name"
                                    horizontal
                                    v-model="form.name"
                                    :invalid-feedback="getInvalidMsg('name')"
                                    :isValid="isValid('name')"
                                />
                                <CInput
                                    type="email"
                                    label="Email"
                                    horizontal
                                    v-model="form.email"
                                    :invalid-feedback="getInvalidMsg('email')"
                                    :isValid="isValid('email')"
                                />
                                <CInput
                                    type="password"
                                    label="Password"
                                    horizontal
                                    v-model="form.password"
                                    :invalid-feedback="getInvalidMsg('password')"
                                    :isValid="isValid('password')"
                                />
                                <CInput
                                    type="password"
                                    label="Password Confirm"
                                    horizontal
                                    v-model="form.password_confirmation"
                                    :invalid-feedback="getInvalidMsg('password_confirmation')"
                                    :isValid="isValid('password_confirmation')"
                                />

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-3">
                                        <CButton color="primary" @click="submit">Register</CButton>
                                    </div>
                                </div>
                            </CForm>
                        </CCardBody>
                    </CCard>
                </CCol>
            </CRow>
        </CContainer>
    </div>
</template>

<script>
    import FlashMessages from '@/Components/FlashMessages';
    import InteractsWithErrors from '@/mixin/InteractsWithErrors';

    export default {
        components: { FlashMessages },
        mixins: [InteractsWithErrors],
        layout: null,
        metaInfo: {
            title: 'Register',
        },
        data () {
            return {
                form: {
                    name: null,
                    email: null,
                    password: null,
                    password_confirmation: null,
                },
            };
        },
        methods: {
            submit() {
                this.$inertia.post(this.$route('register'), this.form)
            },
        },
    };
</script>
