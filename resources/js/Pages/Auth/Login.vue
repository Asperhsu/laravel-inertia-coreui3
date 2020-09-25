<template>
    <div class="c-app flex-row align-items-center">
        <CContainer>
            <CRow class="justify-content-center">
                <CCol md="8">
                    <FlashMessages />
                    <CCardGroup>
                        <CCard class="p-4">
                            <CCardBody>
                                <CForm @submit.prevent="submit">
                                    <h1>Login</h1>
                                    <p class="text-muted">
                                        Sign In to your account
                                    </p>
                                    <CInput placeholder="Email" autocomplete="username email"
                                        v-model="form.email"
                                        :invalid-feedback="getInvalidMsg('email')"
                                        :isValid="isValid('email')">
                                        <template #prepend-content>
                                            <i class="fa fa-user"></i>
                                        </template>
                                    </CInput>
                                    <CInput placeholder="Password" type="password" autocomplete="curent-password"
                                        v-model="form.password"
                                        :invalid-feedback="getInvalidMsg('password')"
                                        :isValid="isValid('password')">
                                        <template #prepend-content>
                                            <i class="fa fa-lock"></i>
                                        </template>
                                    </CInput>
                                    <CRow>
                                        <CCol col="6" class="text-left">
                                            <CButton color="primary" class="px-4">Login</CButton>
                                        </CCol>
                                        <CCol col="6" class="text-right">
                                            <CButton color="link" class="px-0" :to="$route('password.request')">Forgot password?</CButton >
                                            <CButton color="link" class="d-lg-none" :to="$route('register')">Register now!</CButton>
                                        </CCol>
                                    </CRow>
                                </CForm>
                            </CCardBody>
                        </CCard>
                        <CCard color="primary" text-color="white" class="text-center py-5 d-md-down-none" body-wrapper>
                            <CCardBody>
                                <h2>Sign up</h2>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur
                                    adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua.
                                </p>
                                <CButton color="light" variant="outline" size="lg" :to="$route('register')">
                                    Register Now!
                                </CButton>
                            </CCardBody>
                        </CCard>
                    </CCardGroup>
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
            title: 'Login',
        },
        data () {
            return {
                form: {
                    email: null,
                    password: null,
                },
            };
        },
        methods: {
            submit() {
                this.$inertia.post(this.$route('login'), this.form)
            },
        },
    };
</script>
