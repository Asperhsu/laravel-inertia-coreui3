<template>
    <CHeader fixed with-subheader light>
        <CToggler
            in-header
            class="ml-3 d-lg-none"
            @click="$store.commit('toggleSidebarMobile')"
        />
        <CToggler
            in-header
            class="ml-3 d-md-down-none"
            @click="$store.commit('toggleSidebarDesktop')"
        />
        <CHeaderBrand class="mx-auto d-lg-none" to="/">
            <CIcon name="logo" height="48" alt="Logo" />
        </CHeaderBrand>
        <CHeaderNav class="d-md-down-none mr-auto">
            <CHeaderNavItem class="px-3">
                <HeaderNavLink href="/dashboard">Dashboard</HeaderNavLink>
            </CHeaderNavItem>
            <CHeaderNavItem class="px-3">
                <HeaderNavLink href="/users" exact>Users</HeaderNavLink>
            </CHeaderNavItem>
            <!-- <CHeaderNavItem class="px-3">
                <HeaderNavLink>Settings</HeaderNavLink>
            </CHeaderNavItem> -->
        </CHeaderNav>
        <CHeaderNav class="mr-4">
            <CHeaderNavItem class="d-md-down-none mx-2">
                <CHeaderNavLink>
                </CHeaderNavLink>
            </CHeaderNavItem>
            <CHeaderNavItem class="d-md-down-none mx-2">
                <CHeaderNavLink>
                </CHeaderNavLink>
            </CHeaderNavItem>
            <CHeaderNavItem class="d-md-down-none mx-2">
                <CHeaderNavLink>
                </CHeaderNavLink>
            </CHeaderNavItem>
            <TheHeaderDropdownAccnt />
        </CHeaderNav>
        <CSubheader class="px-3">
            <Breadcrumb class="border-0 m-0 px-0 px-md-3" :items="breadcrumbs" />
        </CSubheader>
    </CHeader>
</template>

<script>
    import HeaderNavLink from '@/Components/HeaderNavLink';
    import Breadcrumb from '@/Components/Breadcrumb';
    import TheHeaderDropdownAccnt from './TheHeaderDropdownAccnt';

    export default {
        name: 'TheHeader',
        components: {HeaderNavLink, Breadcrumb, TheHeaderDropdownAccnt},
        computed: {
            breadcrumbs () {
                return this.$store.state.breadcrumbs
            },
        },
    };
</script>
