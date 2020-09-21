<template>
    <ol class="breadcrumb">
        <li
            v-for="(item, index) in linkItems"
            :key="index"
            :class="[item.addClasses, sharedClasses, addLinkClasses]"
            role="presentation"
        >
            <inertia-link v-bind="Object.assign({}, item, { addClasses: null, text: null })">{{item.text}}</inertia-link>
        </li>
        <li v-if="lastItem" :class="lastItemClasses" role="presentation">
            <!-- span added to enable text styling through classes -->
            <span v-text="lastItem.text"></span>
        </li>
        <slot></slot>
    </ol>
</template>

<script>
    import { CBreadcrumb } from '@coreui/vue';
    export default {
        name: 'Breadcrumb',
        extends: CBreadcrumb,
    };
</script>
