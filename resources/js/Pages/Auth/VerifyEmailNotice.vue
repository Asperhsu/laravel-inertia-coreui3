<template>
    <div class="c-app flex-row align-items-center">
        <CContainer>
            <CRow class="justify-content-center">
                <CCol md="8">

                    <CCard class="p-4">
                        <CCardBody>
                            <h1>Verify Your Email Address</h1>

                            <CAlert v-if="$page.flash.resent" color="success" closeButton>
                                A fresh verification link has been sent to your email address.
                            </CAlert>

                            Before proceeding, please check your email for a verification link.
                            If you did not receive the email

                            <CButton color="link" class="px-0" method="post" :to="$route('verification.resend')">click here to request another</CButton>
                        </CCardBody>
                    </CCard>
                </CCol>
            </CRow>
        </CContainer>
    </div>
</template>

<script>
    export default {
        layout: null,
        metaInfo: {
            title: 'Verify Your Email Address',
        },
    };
</script>
