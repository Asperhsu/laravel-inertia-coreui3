<template>
    <div>
        <CDataTable
            :items="items"
            :fields="fields"
            hover
            cleaner
            :itemsPerPage="perPageOptions[0]"
            :items-per-page-select="perPageSelect"
            :tableFilter='{ external: true, lazy: false }'
            :sorter='{ external: true, resetable: true }'
            :sorterValue="{column: query.sort_by, asc: query.sort_dir == 'asc'}"
            :tableFilterValue="query.keyword"
            @update:sorter-value="sortTable"
            @update:table-filter-value="filterTable"
            @pagination-change="changePerPage"
            v-bind="$attrs"
        >
            <template v-for="(slot, name) in $scopedSlots" v-slot:[name]="data">
                <slot :name="name" v-bind="data"></slot>
            </template>
        </CDataTable>

        <CPagination
            v-if="meta.last_page > 1"
            align="center"
            :active-page="meta.current_page"
            :pages="meta.last_page"
            @update:activePage="changePage"
        />
    </div>
</template>

<script>
    export default {
        props: {
            url: {
                type: String,
                default: location.pathname,
            },
            items: Array,
            fields: Array,
            meta: {
                type: Object,
                default: () => ({
                    current_page: 1,
                    last_page: 1,
                }),
            },
            filter: {
                type: Object,
                default: () => ({
                    keyword: null,
                    per_page: null,
                    page: null,
                    sort_by: null,
                    sort_dir: null,
                }),
            },
            perPageOptions: {
                type: Array,
                default: () => [15, 30, 50],
            },
        },

        data () {
            return {
                query: {...this.filter},
            };
        },

        computed: {
            perPageSelect () {
                return {
                    values: this.perPageOptions,
                    external: true,
                };
            },
        },

        watch: {
            query: {
                deep: true,
                handler () {
                    this.$nextTick(() => {
                        this.refresh();
                    });
                },
            }
        },

        methods: {
            sortTable (value) {
                this.query.sort_by = value.column;
                this.query.sort_dir = value.asc ? 'asc' : 'desc';
            },
            filterTable (value) {
                this.query.keyword = value;
            },
            changePage (page) {
                this.query.page = page;
            },
            changePerPage (num) {
                this.query.per_page = num;
            },
            refresh () {
                let url = new URL(location.href);
                let params = url.searchParams;
                Object.keys(this.query).map(key => {
                    params.set(key, this.query[key]);
                });

                let query = Array.from(params)
                    .filter(([key, value]) => !!value)
                    .map(([key, value]) => key + '=' + value)
                    .join('&');

                let resource = this.url + (query ? '?' + query : '');
                this.$inertia.replace(resource);
            },
        },
    }
</script>
