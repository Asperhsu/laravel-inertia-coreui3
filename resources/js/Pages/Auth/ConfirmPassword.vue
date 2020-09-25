<template>
    <div class="c-app flex-row align-items-center">
        <CContainer>
            <CRow class="justify-content-center">
                <CCol md="8">
                    <FlashMessages />

                    <CCard class="p-4">
                        <CCardBody>
                            <h1>Reset Password</h1>
                            <h5>Please confirm your password before continuing.</h5>

                            <CForm @submit.prevent="submit">
                                <CInput
                                    type="password"
                                    label="Password"
                                    horizontal
                                    v-model="form.password"
                                    :invalid-feedback="getInvalidMsg('password')"
                                    :isValid="isValid('password')"
                                />

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-3">
                                        <CButton color="primary" @click="submit">Confirm Password</CButton>

                                        <CButton v-if="$route().check('password.request')" color="link" class="px-0" :to="$route('password.request')">Forgot password?</CButton >
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
            title: 'Confirm Password',
        },
        data () {
            return {
                form: {
                    password: null,
                },
            };
        },
        methods: {
            submit() {
                this.$inertia.post(this.$route('password.confirm'), this.form)
            },
        },
    };
</script>
