<ul class="menu-inner py-1">
    <li class="menu-item {{ request()->is('/') ? 'active' : '' }}">
        <a href="/" class="menu-link">
            <i class="menu-icon tf-icons mdi mdi-home-outline"></i>
            <div data-i18n="Home">Home</div>
        </a>
    </li>

    @if (Auth()->user()->role == 'Kepala')
        <li
            class="menu-item {{ request()->is(['/transactions/generalbooks', '/transactions/textbooks']) ? 'active' : '' }}">
            <a href="/transactions" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons mdi mdi-sync-circle"></i>
                <div data-i18n="transactions">Transaksi</div>
                <div class="badge bg-danger rounded-pill ms-auto {{ $late_days == null ? 'd-none' : '' }}">
                    {{ $late_days }}
                </div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('generalbooks.index') }}" class="menu-link">
                        <div data-i18n="Data-User">Buku Umum</div>
                        <div class="badge bg-danger rounded-pill ms-auto {{ $late_days == null ? 'd-none' : '' }}">
                            {{ $late_days }}
                        </div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('textbooks.index') }}" class="menu-link">
                        <div data-i18n="Konfirmasi-Akun">Buku Paket</div>
                        <div class="badge bg-danger rounded-pill ms-auto {{ $late_days == null ? 'd-none' : '' }}">
                            {{ $late_days }}
                        </div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item {{ request()->is('users') ? 'active' : '' }}">
            <a href="/users" class="menu-link">
                <i class="menu-icon tf-icons mdi mdi-human"></i>
                <div data-i18n="users">Users</div>
            </a>
        </li>
        <li
            class="menu-item {{ request()->is(['/transactions/generalbooks', '/transactions/textbooks']) ? 'active' : '' }}">
            <a href="/transactions" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons mdi mdi-file"></i>
                <div data-i18n="transactions">Laporan</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('reports.generalbook') }}" class="menu-link">
                        <div data-i18n="Data-User">Laporan Buku Umum</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('reports.textbook') }}" class="menu-link">
                        <div data-i18n="Konfirmasi-Akun">:aporan Buku Paket</div>
                    </a>
                </li>
            </ul>
        </li>
    @else
        <li class="menu-item {{ request()->is('users') ? 'active' : '' }}">
            <a href="/users" class="menu-link">
                <i class="menu-icon tf-icons mdi mdi-human"></i>
                <div data-i18n="users">Users</div>
            </a>
        </li>
        <li class="menu-item {{ request()->is('categories') ? 'active' : '' }}">
            <a href="/categories" class="menu-link">
                <i class="menu-icon tf-icons mdi mdi-shape"></i>
                <div data-i18n="categories">Kategori Buku</div>
            </a>
        </li>

        <li class="menu-item {{ request()->is('books') ? 'active' : '' }}">
            <a href="/books" class="menu-link">
                <i class="menu-icon tf-icons mdi mdi-book"></i>
                <div data-i18n="books">Buku</div>
            </a>
        </li>
        <li
            class="menu-item {{ request()->is(['/transactions/generalbooks', '/transactions/textbooks']) ? 'active' : '' }}">
            <a href="/transactions" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons mdi mdi-sync-circle"></i>
                <div data-i18n="transactions">Transaksi</div>
                <div class="badge bg-danger rounded-pill ms-auto {{ $late_days == null ? 'd-none' : '' }}">
                    {{ $late_days }}
                </div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('generalbooks.index') }}" class="menu-link">
                        <div data-i18n="Data-User">Buku Umum</div>
                        <div class="badge bg-danger rounded-pill ms-auto {{ $late_days == null ? 'd-none' : '' }}">
                            {{ $late_days }}
                        </div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('textbooks.index') }}" class="menu-link">
                        <div data-i18n="Konfirmasi-Akun">Buku Paket</div>
                        <div class="badge bg-danger rounded-pill ms-auto {{ $late_days == null ? 'd-none' : '' }}">
                            {{ $late_days }}
                        </div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item {{ request()->is('penalties') ? 'active' : '' }}">
            <a href="/penalties" class="menu-link">
                <i class="menu-icon tf-icons mdi mdi-cash"></i>
                <div data-i18n="penalties">Denda</div>
            </a>
        </li>

        <li
            class="menu-item {{ request()->is(['/transactions/generalbooks', '/transactions/textbooks']) ? 'active' : '' }}">
            <a href="/transactions" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons mdi mdi-file"></i>
                <div data-i18n="transactions">Laporan</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('reports.generalbook') }}" class="menu-link">
                        <div data-i18n="Data-User">Buku Umum</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('reports.textbook') }}" class="menu-link">
                        <div data-i18n="Konfirmasi-Akun">Buku Paket</div>
                    </a>
                </li>
            </ul>
        </li>
    @endif

</ul>
