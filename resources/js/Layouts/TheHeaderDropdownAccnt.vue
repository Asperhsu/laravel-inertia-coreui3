<template>
    <CDropdown inNav class="c-header-nav-items" placement="bottom-end" add-menu-classes="pt-0">
        <template #toggler>
            <CHeaderNavLink>
                <div class="c-avatar">
                    <i class="fa fa-user"></i>
                </div>
            </CHeaderNavLink>
        </template>
        <CDropdownHeader tag="div" class="text-center" color="light">
            <strong>Account</strong>
        </CDropdownHeader>
        <CDropdownItem>
            <i class="fa fa-bell mfe-2"></i>Updates
            <CBadge color="info" class="mfs-auto">{{ itemsCount }}</CBadge>
        </CDropdownItem>
        <CDropdownItem>
            <i class="fa fa-envelope mfe-2"></i>Messages
            <CBadge color="success" class="mfs-auto">{{ itemsCount }}</CBadge>
        </CDropdownItem>
        <CDropdownItem>
            <i class="fa fa-tasks mfe-2"></i>Tasks
            <CBadge color="danger" class="mfs-auto">{{ itemsCount }}</CBadge>
        </CDropdownItem>
        <CDropdownItem>
            <i class="fa fa-comments mfe-2"></i>Comments
            <CBadge color="warning" class="mfs-auto">{{ itemsCount }}</CBadge>
        </CDropdownItem>
        <CDropdownHeader tag="div" class="text-center" color="light">
            <strong>Settings</strong>
        </CDropdownHeader>
        <CDropdownItem>
            <i class="fa fa-user mfe-2"></i>Profile
        </CDropdownItem>
        <CDropdownItem>
            <i class="fa fa-cog mfe-2"></i>Settings
        </CDropdownItem>
        <CDropdownItem>
            <i class="fa fa-credit-card mfe-2"></i>Payments
            <CBadge color="secondary" class="mfs-auto">{{ itemsCount }}</CBadge>
        </CDropdownItem>
        <CDropdownItem>
            <i class="fa fa-file mfe-2"></i>Projects
            <CBadge color="primary" class="mfs-auto">{{ itemsCount }}</CBadge>
        </CDropdownItem>
        <CDropdownDivider />
        <CDropdownItem>
            <i class="fa fa-lock mfe-2"></i>Lock Account
        </CDropdownItem>
        <CDropdownItem @click="logout">
            <i class="fa fa-sign-out-alt mfe-2"></i>Logout
        </CDropdownItem>
    </CDropdown>
</template>

<script>
    export default {
        name: 'TheHeaderDropdownAccnt',
        data() {
            return {
                itemsCount: 42,
            };
        },
        methods: {
            logout () {
                this.$inertia.post(this.$route('logout'))
            },
        },
    };
</script>

<style scoped>
    .c-icon {
        margin-right: 0.3rem;
    }
</style>
