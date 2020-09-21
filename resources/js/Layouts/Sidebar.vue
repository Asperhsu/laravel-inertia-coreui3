<template>
    <CSidebar
        fixed
        :minimize="minimize"
        :show="show"
        @update:show="(value) => $store.commit('set', ['sidebarShow', value])"
    >
        <CSidebarBrand class="d-md-down-none" to="/">
        </CSidebarBrand>

        <CSidebarNav>
            <template v-for="(item, index) in menus">
                <SidebarNavDropdown v-if="item.children" :key="_uid + '_' + index" v-bind="item" />
                <CSidebarNavTitle v-else-if="item.title" :key="_uid + '_' + index" v-text="item.title" />
                <SidebarNavItem v-else :key="_uid + '_' + index"
                    :name="item.name"
                    :href="item.href"
                    :font-icon="item.icon"
                    :active="active(item.href)"
                />
            </template>
        </CSidebarNav>

        <CSidebarMinimizer
            class="d-md-down-none"
            @click.native="$store.commit('set', ['sidebarMinimize', !minimize])"
        />
    </CSidebar>
</template>

<script>
    import SidebarNavItem from '@/Components/SidebarNavItem';
    import SidebarNavDropdown from '@/Components/SidebarNavDropdown';

    export default {
        components: { SidebarNavItem, SidebarNavDropdown },
        computed: {
            show () {
                return this.$store.state.sidebarShow
            },
            minimize () {
                return this.$store.state.sidebarMinimize
            },
            menus () {
                return this.$page.sidebar || [];
            },
        },
        methods: {
            active (href) {
                return window.location.href.startsWith(href)
            },
        },
    };
</script>
