<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
              <span class="app-brand-logo demo">

              </span>
            <span class="app-brand-text demo menu-text fw-bold ms-2">shamal</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <li class="menu-item active open">
            <ul class="menu-sub">
                <li class="menu-item {{ Request::is('entities*') ? 'active' : '' }}">
                    <a href="{{ route('entities.index') }}" class="menu-link">
                        <div data-i18n="Without menu">Entities</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('themes*') ? 'active' : '' }}">
                    <a href="{{route('themes.index')}}" class="menu-link">
                        <div data-i18n="Without navbar">Themes</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('urls*') ? 'active' : '' }}">
                    <a href="{{ route('urls.index') }}" class="menu-link">
                        <div data-i18n="Container">Settings</div>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>



