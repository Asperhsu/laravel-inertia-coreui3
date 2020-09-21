<template>
    <div>
        <CAlert v-if="$page.flash.success" color="primary" closeButton>
            {{ $page.flash.success }}
        </CAlert>
        <CAlert v-if="($page.flash.error || Object.keys($page.errors).length > 0)" color="danger" closeButton>
            <div v-if="$page.flash.error">{{ $page.flash.error }}</div>
            <ul class="mb-0" v-if="Object.keys($page.errors).length">
                <li v-for="(msg, field) in $page.errors" :key="field">
                    {{ field }}: {{ msg }}
                </li>
            </ul>
        </CAlert>
    </div>
</template>

<script>
    export default { }
</script>
