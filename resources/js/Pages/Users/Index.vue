<template>
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <div><i class="fa fa-table"></i> Users</div>
            <CreateBtn class="ml-auto" :href="$route('users.create')" />
        </div>
        <div class="card-body py-1">
            <SearchTable
                :items="users.data"
                :meta="users.meta"
                :filter="Array.isArray(filter) ? {} : filter"
                :fields="['name', 'email', 'created_at', 'action']"
                addTableClasses="border"
            >
                <template #action="{item}">
                    <td>
                        <EditBtn :href="$route('users.edit', item.id)" />
                        <DeleteBtn :href="$route('users.destroy', item.id)" />
                    </td>
                </template>
            </SearchTable>
        </div>
    </div>
</template>

<script>
    import CreateBtn from '@/Components/Btns/CreateBtn';
    import EditBtn from '@/Components/Btns/EditBtn';
    import DeleteBtn from '@/Components/Btns/DeleteBtn';
    import SearchTable from '@/Components/SearchTable';

    export default {
        components: { CreateBtn, EditBtn, DeleteBtn, SearchTable },
        metaInfo: {
            title: 'Users',
        },
        props: {
            users: Object,
            filter: [Array, Object],
        },
        mounted () {
            this.$store.commit('setBreadcrumbs', [
                {text: 'Users'},
            ]);
        },
    }
</script>
