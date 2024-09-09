<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{ route('dashboard') }}">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">{{ trans('main_sitebar.dashboard') }}</span>
                            </div>
                            <div class="pull-right"></div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{ __('main_sitebar.MahaPOS') }}</li>
                    <!-- menu item Elements-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#users">
                            <div class="pull-left"><i class="ti-palette"></i><span class="right-nav-text">{{ __('main_sitebar.users') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="users" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('users.index') }}">{{ __('main_sitebar.users_list') }}</a></li>
                            <li><a href="{{ route('role.index') }}">{{ __('permission.user_permission') }}</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#categories">
                            <div class="pull-left"><i class="ti-palette"></i><span class="right-nav-text">{{ __('main_sitebar.categories') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="categories" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('categories.index') }}">{{ __('main_sitebar.categories_list') }}</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#products">
                            <div class="pull-left"><i class="ti-palette"></i><span class="right-nav-text">{{ __('main_sitebar.products') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="products" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('products.index') }}">{{ __('main_sitebar.products_list') }}</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#clients">
                            <div class="pull-left"><i class="ti-palette"></i><span class="right-nav-text">{{ __('main_sitebar.clients') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="clients" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('clients.index') }}">{{ __('main_sitebar.clients_list') }}</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#orders">
                            <div class="pull-left"><i class="ti-palette"></i><span class="right-nav-text">{{ __('main_sitebar.orders') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="orders" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('getAllOrders') }}">{{ __('main_sitebar.orders_list') }}</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
