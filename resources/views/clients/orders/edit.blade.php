@extends('layouts.master')
@section('css')

@section('title')
    {{ __('order.edit_order') }} | {{ $order->ordernumber }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0" style="font-family: Cairo, sans-serif">{{ __('order.edit_order') }} | {{ $order->ordernumber }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ __('main_sitebar.orders') }}</a></li>
                <li class="breadcrumb-item active">{{ __('order.edit_order') }}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
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
                                                            {{ in_array($product->id, $order->products->pluck('id')->toArray()) ? 'disabled' : '' }}
                                                            class="btn {{ in_array($product->id, $order->products->pluck('id')->toArray()) ? '' : 'btn-info' }} btn-sm add-product-btn" 
                                                            id="product-{{ $product->id }}" 
                                                            data-name="{{ App::getLocale() == 'ar' ? $product->getTranslation('name', 'ar') : $product->getTranslation('name', 'en') }}"
                                                            data-id="{{ $product->id }}"
                                                            data-price="{{ $product->sell_price }}">
                                                            <i class="fa fa-plus"></i>
                                                        </button>
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
            <form action="{{ route('orders.update' , $client->id) }}" method="post">
                @csrf
                @method("PATCH")
                <div class="card-body">
                    <h5 class="mb-0" style="font-family: Cairo, sans-serif">{{ __('main_sitebar.orders') }} :</h5>
                    <hr>
                    <br>
                    <input type="hidden" name="ordernumber" value="{{ $order->ordernumber }}">
                    <table id="datatable" class="table-bordered border table  dataTable p-0" style="text-align: center;">
                        <thead style="color: #84ba3f;">
                            <tr>
                                <th>{{ __('product.product_name') }}</th>
                                <th>{{ __('product.quantity') }}</th>
                                <th>{{ __('product.price') }}</th>
                                <th>{{ __('main_trans.option') }}</th>
                            </tr>
                        </thead>
                        <tbody class="order-list"> 
                            @foreach ( $order->products as $product )
                            <tr>
                                <td>{{ App::getLocale() == 'ar' ? $product->getTranslation('name','ar') : $product->getTranslation('name','en') }}</td>
                                <input type="hidden" name="product_ids[]" value="{{ $product->id }}}">
                                <td><input type="number"  data-price="{{ $product->sell_price }}}" name="quantities[]" class="form-control input-sm product-quantity" min="1" value="{{ $product->pivot->quantity }}"></td>
                                <td class="product-price">{{ number_format( $product->sell_price * $product->pivot->quantity ,2) }}</td>
                                <td><button class="btn btn-danger btn-sm remove-product-btn" data-id="{{ $product->id }}"><i class="fa fa-trash"></i></button></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                    <hr>
                    <h6 class="mb-0" style="font-family: Cairo, sans-serif">{{ __('main_trans.total') }} : <span class="total-price">0</span></h6>
                    <br>
                    <button type="submit" class="btn btn-primary btn-block" id="add-orders-form">{{ __('client.add_order') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
