<template>
    <inertia-link
        class="c-header-nav-link"
        v-bind="$props"
    >
        <slot></slot>
    </inertia-link>
</template>

<script>
    import { CHeaderNavLink } from '@coreui/vue';
    export default {
        name: 'HeaderNavLink',
        extends: CHeaderNavLink,
    };
</script>
