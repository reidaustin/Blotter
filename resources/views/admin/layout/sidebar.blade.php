<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo ">
        <a href="javascript:void(0);" class="app-brand-link">
            <span class="app-brand-text demo menu-text fw-bolder ms-2">blotter</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>
    <ul class="menu-inner py-1">

        <!-- Dashboard -->
        {{-- <li class="menu-item @yield('dashboard')">
            <a href="" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li> --}}
        <!-- pages -->
        {{-- <li class="menu-item @yield('blotter')">
            <a href="{{route('admin.blotter')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Layouts">Daily Blooter</div>
            </a>
        </li> --}}
        <li class="menu-item @yield('tour')">
            <a href="{{ route('admin.tour') }}" class="menu-link">
                <div>Tour Time</div>
            </a>
        </li>
        <li class="menu-item @yield('officer')">
            <a href="{{ route('admin.officer') }}" class="menu-link">
                <div>Officer</div>
            </a>
        </li>
        <li class="menu-item @yield('commander')">
            <a href="{{ route('admin.commander') }}" class="menu-link">
                <div>Tour Commander</div>
            </a>
        </li>
        <li class="menu-item @yield('supervisor')">
            <a href="{{ route('admin.supervisor') }}" class="menu-link">
                <div>Supervisor</div>
            </a>
        </li>
        <li class="menu-item @yield('legend')">
            <a href="{{ route('admin.legend') }}" class="menu-link">
                <div>Legend</div>
            </a>
        </li>
        <li class="menu-item @yield('user')">
            <a href="{{ route('admin.user') }}" class="menu-link">
                <div>User</div>
            </a>
        </li>
        <li class="menu-item @yield('locked')">
            <a href="{{ route('admin.locked.tour') }}" class="menu-link">
                <div>Locked Tours</div>
            </a>
        </li>
    </ul>
</aside>
