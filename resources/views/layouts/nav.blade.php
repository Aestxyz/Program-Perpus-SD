<ul class="menu-inner py-1">
    <!-- Dashboard -->
    <li class="menu-item">
        <a href="/home" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="Dashboard">Dashboard</div>
        </a>
    </li>

    <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-check-shield"></i>
            <div class="text-truncate" data-i18n="user-management">User Management</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item">
                <a href="{{ route('roles.index') }}" class="menu-link">
                    <div class="text-truncate" data-i18n="roles">Roles</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('permissions.index') }}" class="menu-link">
                    <div class="text-truncate" data-i18n="permissions">Permissions</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('users.index') }}" class="menu-link">
                    <div class="text-truncate" data-i18n="users">Users</div>
                </a>
            </li>


        </ul>
    </li>

</ul>
