<template>
    <div class="c-app flex-row align-items-center">
        <CContainer>
            <CRow class="justify-content-center">
                <CCol md="8">
                    <FlashMessages />

                    <CAlert v-if="$page.flash.status" color="success" closeButton>
                        {{ $page.flash.status }}
                    </CAlert>

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

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-3">
                                        <CButton color="primary" @click="submit">Send Password Reset Link</CButton>
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
        data () {
            return {
                form: {
                    email: null,
                },
            };
        },
        methods: {
            submit() {
                this.$inertia.post(this.$route('password.email'), this.form)
            },
        },
    };
</script>
