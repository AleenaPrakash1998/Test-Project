<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme position-fixed h-100 top-0 left-0">
    <div class="app-brand demo">
        <a href="{{ route('vendors.index') }}" class="app-brand-link">
              <span class="app-brand-logo demo">

              </span>
            <div class="d-flex justify-content-center align-items-center border rounded px-3 py-2">
                <h3 class="text-uppercase">SHOP EASE</h3>
            </div>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <li class="menu-item  open">
            <ul class="menu-sub">
                <li class="menu-item {{ Request::is('vendors*') ? 'active' : '' }}">
                    <a href="{{ route('vendors.index') }}"
                       class="menu-link {{ Request::is('vendors*') ? 'active' : '' }}">
                        <div data-i18n="Without menu"><span class="me-2"><i class='bx bx-book-bookmark'></i></span>Vendors
                        </div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('products*') ? 'active' : '' }}">
                    <a href="{{route('products.index')}}"
                       class="menu-link {{ Request::is('products*') ? 'active' : '' }}">
                        <div data-i18n="Without navbar"><span class="me-2"><i class='bx bxl-product-hunt'></i></span>Products
                        </div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('stocks*') ? 'active' : '' }}">
                    <a href="{{route('stocks.index')}}"
                       class="menu-link {{ Request::is('stocks*') ? 'active' : '' }}">
                        <div data-i18n="Without navbar"><span class="me-2"><i class='bx bx-images'></i></span>Stocks
                        </div>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
    <div style="height: 292px;width: 195px;margin-left: 4pc">
        <img style="height: 100%;width: 100%" class="object-fit-cover"
             src="{{asset('assets/img/backgrounds/sidebar-image.png')}}"/>
    </div>
</aside>


<style>
    .menu-item > .menu-link.active {
        background-color: #C39F7433 !important;
    }

</style>
