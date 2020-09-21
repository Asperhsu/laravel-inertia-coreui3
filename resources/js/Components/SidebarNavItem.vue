<template>
    <li class="c-sidebar-nav-item">
        <slot>
            <inertia-link :class="linkClasses" v-bind="computedLinkProps">
                <CIcon v-if="icon" v-bind="computedIcon" />
                <i v-if="fontIcon" :class="['c-sidebar-nav-icon', fontIcon]" />
                {{name}}
                <CBadge
                    v-if="badge"
                    v-bind="Object.assign({}, badge, { text: null })"
                >{{badge.text}}</CBadge>
            </inertia-link>
        </slot>
    </li>
</template>

<script>
    import { CSidebarNavItem } from '@coreui/vue';
    export default {
        name: 'SidebarNavItem',
        extends: CSidebarNavItem,
        computed: {
            linkClasses () {
                return [
                    this.label ? 'c-sidebar-nav-label' : 'c-sidebar-nav-link',
                    this.color && `c-sidebar-nav-link-${this.color}`,
                    this.addLinkClasses,
                    this.active && this.activeClass
                ];
            },
        }
    };
</script>
