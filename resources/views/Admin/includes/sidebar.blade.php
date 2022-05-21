<div class="sidebar-wrapper active">
    <div class="sidebar-header">
        <div class="d-flex justify-content-between">
            <div class="d-flex justify-content-between align-items-center">
                <a href="index.html"><img src="{{$OrganizationProfile->logo}}" alt="Logo" style="width: 50px;height:50px; margin: 0 10pxs"></a>
                <small style="font-size: 15px">{{$OrganizationProfile->name}}</small>
            </div>
            <div class="toggler">
                <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
            </div>
            <hr>
        </div>
    </div>
    <div class="sidebar-menu">
        <ul class="menu">
            {{-- @dd(auth()->guard('')->check()) --}}
                @Admin
                <li class="sidebar-item">
                    <a href="{{ route('admin.dashboard') }}" class='sidebar-link'>
                        {{-- <i class="fa fa-assistive-listening-systems"></i> --}}
                        <i class="bi bi-menu-button-wide-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('client.index') }}" class='sidebar-link'>
                        <i class="bi bi-person-bounding-box"></i>
                        <span>Client Mangemtn</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('admin.subscription.index') }}" class='sidebar-link'>
                        <i class="bi bi-credit-card-2-front"></i>
                        <span>Subscription </span>
                    </a>
                </li>
                @elseAdmin
                {{-- @dd(auth()->guard('client')->check()) --}}
            <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-calendar2-week"></i>
                    <span>Product</span>
                </a>
                <ul class="submenu">
                    <li class="submenu-item ">
                        <a href="{{ route('SallaProduct') }}">salla Product</a>
                    </li>
                    <li class="submenu-item">
                        <a href="{{ route('Card') }}">Card Product</a>
                    </li>
                    {{-- <li class="submenu-item">
                        <a href="{{ route('related.Products') }}">Related Products</a>
                    </li> --}}
                </ul>

            <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-bag-check-fill"></i>
                    <span>Orders</span>
                </a>
                <ul class="submenu">
                    <li class="submenu-item ">
                        <a href="{{ route('OrderHistory') }}">Orders History</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item   has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-flag"></i>
                    <span>linked Product</span>
                </a>
                <ul class="submenu">
                    <li class="submenu-item ">
                        <a href="{{ route('related.Products') }}">Show Linked Product</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="{{ route('link.product') }}">Link Product</a>
                    </li>
                </ul>
            </li>
            @endAdmin
            <li class="sidebar-item">
                <a href="{{ IsClient() ?? auth()->guard('client')->check() ? route('technical.support') : route('admin.technical.support'); }}" class='sidebar-link'>
                    <i class="bi bi-chat-dots-fill"></i>
                    <span>Support Ticket</span>
                </a>
            </li>
            <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-gear"></i>
                    <span>Setting</span>
                </a>
                <ul class="submenu">
                    <li class="submenu-item ">
                        <a href="{{ route('setting') }}">POS Setting </a>
                    </li>
                    @Admin
                    <li class="submenu-item">
                        <a href="{{ route('admin.orgnazition.profile') }}">Orgniazation Profile</a>
                    </li>
                    @endAdmin
                </ul>
        </ul>
    </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>
