<template>
    <div class="c-app flex-row align-items-center">
        <CContainer>
            <CRow class="justify-content-center">
                <CCol md="8">
                    <FlashMessages />

                    <CCard class="p-4">
                        <CCardBody>
                            <h1>Reset Password</h1>
                            <CForm @submit.prevent="submit">
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
                                        <CButton color="primary" @click="submit">Reset Password</CButton>
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
            title: 'Reset Password',
        },
        props: {
            token: String,
            email: String,
        },
        data () {
            return {
                form: {
                    token: this.token,
                    email: this.email,
                    password: null,
                    password_confirmation: null,
                },
            };
        },
        methods: {
            submit() {
                this.$inertia.post(this.$route('password.update'), this.form)
            },
        },
    };
</script>
