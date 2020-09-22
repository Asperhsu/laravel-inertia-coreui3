<template>
    <CSidebarNavDropdown :name="name" :font-icon="icon" :show.sync="show">
        <template v-for="(item, index) in children">
            <CSidebarNavItem v-if="!item.children" :key="_uid + '_' + index"
                :name="item.name"
                :to="item.href"
                :font-icon="item.icon"
                :active="active(item.href)"
            />
            <SidebarNavDropdown v-else :key="_uid + '_' + index" v-bind="item" ref="grandsons" />
        </template>
    </CSidebarNavDropdown>
</template>

<script>
    export default {
        name: "SidebarNavDropdown",
        props: {
            name: String,
            icon: String,
            children: Array,
        },
        data () {
            return {
                show: false,
            };
        },
        mounted () {
            if (this.show) return;

            this.show = this.children.reduce((flag, child) => flag || this.active(child.href), false);

            if (!this.show && this.$refs.grandsons) {
                this.show = this.$refs.grandsons.reduce((flag, grandson) => flag || grandson.show, false);
            }
        },
        methods: {
            active (href) {
                return window.location.href.startsWith(href)
            },
        },
    }
</script>
