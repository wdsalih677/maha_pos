<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>{{ __('main_sitebar.dashboard') }}</title>
    @include('layouts.head')
</head>

<body>

    <div class="wrapper">

        <!--=================================
 preloader -->

        <div id="pre-loader">
            <img src="assets/images/pre-loader/loader-01.svg" alt="">
        </div>

        <!--=================================
 preloader -->

        @include('layouts.main-header')

        @include('layouts.main-sidebar')

        <!--=================================
 Main content -->
        <!-- main-content -->
        <div class="content-wrapper">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="mb-0" style="font-family: Cairo, sans-serif">{{ trans('main_sitebar.dashboard') }}</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                            <br>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- widgets -->
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-danger">
                                        <i class="fa fa-shopping-cart highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">{{ __('main_sitebar.orders') }}</p>
                                    <h4>{{ $orders }}</h4>
                                </div>
                            </div>
                            <a href="{{ route('getAllOrders') }}">
                                <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                    <i class="fa fa-shopping-cart mr-1" aria-hidden="true"></i>
                                    {{ __('main_sitebar.orders_list') }}
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-warning">
                                        <i class="fa fa-bookmark highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">{{ __('main_sitebar.products') }}</p>
                                    <h4>{{ $products }}</h4>
                                </div>
                            </div>
                            <a href="{{ route('products.index') }}">
                                <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                    <i class="fa fa-bookmark-o mr-1" aria-hidden="true"></i>
                                    {{ __('main_sitebar.products_list') }}
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-success">
                                        <i class="fa fa-sitemap highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">{{ __('main_sitebar.categories') }}</p>
                                    <h4>{{ $category }}</h4>
                                </div>
                            </div>
                            <a href="{{ route('categories.index') }}">
                                <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                    <i class="fa fa-calendar mr-1" aria-hidden="true"></i> {{ __('main_sitebar.categories_list') }}
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-primary">
                                        <i class="fa fa-male highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">{{ __('main_sitebar.clients') }}</p>
                                    <h4>{{ $clients }}</h4>
                                </div>
                            </div>
                            <a href="{{ route('clients.index') }}">
                                <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                    <i class="fa fa-male mr-1" aria-hidden="true"></i> {{ __('main_sitebar.clients_list') }}
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Orders Status widgets-->
            <div class="row">
                <div class="col-md-8 mb-30">
                    <div class="card card-statistics">
                        <div class="card-body">
                            @include('layouts.error')
                            <h5 class="mb-0" style="font-family: Cairo, sans-serif">{{ __('main_sitebar.products') }} :</h5>
                            <hr>
                            <br>
                            <div class="accordion plus-icon shadow">
                                @foreach ( $categories as $category )
                                    <div class="acd-group">
                                        <a href="#" class="acd-heading">{{ $category->name }}</a>
                                        @if ( $category->products->count() > 0 )
                                            <div class="acd-des">
                                                <div class="table-responsive">
                                                    <table id="datatable" class="table-bordered border table table-striped dataTable p-0" style="text-align: center;">
                                                        <thead style="color: rgb(130, 148, 123);">
                                                            <tr>
                                                                <th>#</th>
                                                                <th>{{ __('product.product_name') }}</th>
                                                                <th>{{ __('product.stock') }}</th>
                                                                <th>{{ __('product.sell_price') }}</th>
                                                                <th>{{ __('order.add_order') }}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody> 
                                                            @foreach ($category->products as $product)
                                                            <tr>
                                                                <td>{{ $loop->index + 1 }}</td>
                                                                <td>{{ App::getLocale() == 'ar' ? $product->getTranslation('name', 'ar') : $product->getTranslation('name', 'en') }}</td>
                                                                <td>{{ $product->stock }}</td>
                                                                <td>{{ number_format($product->sell_price, 2) }}</td>
                                                                <td>
                                                                    <button
                                                                        class="btn btn-info btn-sm add-product-btn" 
                                                                        id="product-{{ $product->id }}" 
                                                                        data-name="{{ App::getLocale() == 'ar' ? $product->getTranslation('name', 'ar') : $product->getTranslation('name', 'en') }}"
                                                                        data-id="{{ $product->id }}"
                                                                        data-price="{{ $product->sell_price }}"
                                                                    ><i class="fa fa-plus"></i></button>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>{{ __('product.product_name') }}</th>
                                                                <th>{{ __('product.stock') }}</th>
                                                                <th>{{ __('product.sell_price') }}</th>
                                                                <th>{{ __('order.add_order') }}</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>    
                                            </div> 
                                        @else
                                            <div class="acd-des">
                                                <div class="alert alert-info">{{ __('category.no_products') }}</div>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-30">
                    <div class="card card-statistics">
                        <form action="" method="post">
                            @csrf
                            <div class="card-body">
                                <h5 class="mb-0" style="font-family: Cairo, sans-serif">{{ __('main_sitebar.orders') }} :</h5>
                                <hr>
                                <br>
                                <table id="datatable" class="table-bordered border table  dataTable p-0" style="text-align: center;">
                                    <thead style="color: #84ba3f;">
                                        <tr>
                                            <th>{{ __('product.product_name') }}</th>
                                            <th>{{ __('product.quantity') }}</th>
                                            <th>{{ __('product.price') }}</th>
                                            <th>{{ __('main_trans.option') }}</th>
                                        </tr>
                                    </thead>
                                    <form action="{{ route('dashboard.store') }}" method="POST">
                                        @csrf
                                        <tbody class="order-list"> 
                                            
                                        </tbody>
                                    </form>
                                </table>
                                <br>
                                <hr>
                                <h6 class="mb-0" style="font-family: Cairo, sans-serif">{{ __('main_trans.total') }} : <span class="total-price">0</span></h6>
                                <br>
                                <button type="submit" class="btn btn-primary btn-block" id="add-orders-form" disabled>{{ __('client.add_order') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--=================================
 wrapper -->

            <!--=================================
 footer -->

            @include('layouts.footer')
        </div><!-- main content wrapper end-->
    </div>
    </div>
    </div>

    <!--=================================
 footer -->

    @include('layouts.footer-scripts')

</body>

</html>
