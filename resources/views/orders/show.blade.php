@extends('layouts.master')
@section('css')

@section('title')
    {{ __('order.orders_details') }} | {{ $order->ordernumber }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0" style="font-family: Cairo, sans-serif">{{ __('order.orders_details') }} | {{ $order->ordernumber }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ __('main_sitebar.orders') }}</a></li>
                <li class="breadcrumb-item active">{{ __('order.orders_details') }} | {{ $order->ordernumber }}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table-bordered border table table-striped dataTable p-0" style="text-align: center;">
                        <thead style="color: rgb(130, 148, 123);">
                            <tr>
                                <th>#</th>
                                <th>{{ __('product.product_name') }}</th>
                                <th>{{ __('product.quantity') }}</th>
                                <th>{{ __('order.unit_price') }}</th>
                                <th>{{ __('order.total_unit_price') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $order->products as $product)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ App::getLocale() == 'ar' ? $product->getTranslation('name', 'ar') : $product->getTranslation('name', 'en') }}</td>
                                <td>{{ $product->pivot->quantity }}</td>
                                <td>{{ number_format($product->sell_price, 2) }}</td>
                                <td>{{ number_format($product->pivot->quantity * $product->sell_price , 2) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>{{ __('product.product_name') }}</th>
                                <th>{{ __('product.quantity') }}</th>
                                <th>{{ __('order.total_price') }}</th>
                                <th>{{ __('order.total_unit_price') }}</th>
                            </tr>
                        </tfoot>
                    </table>
                    <br>
                    <h6 class="mb-0" style="font-family: Cairo, sans-serif">{{ __('order.total_price') }} = {{ number_format($order->total_price,2) }}</h6>
                    <br>
                    <hr>
                    <button type="submit" class="btn btn-info btn-block" onclick="printOrderDetails();"><i class="fa fa-print"></i> {{ __('main_trans.print') }}</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
<script>
    function printOrderDetails() {
        var breadcrumbItem = document.querySelector('.breadcrumb-item.active').outerHTML;
        var tableContent = document.getElementById('datatable').outerHTML;
        var totalPrice = document.querySelector('h6.mb-0').outerHTML;

        var printContents = `
            <div style="margin-bottom: 20px;">
                <ol class="breadcrumb">
                    ${breadcrumbItem}
                </ol>
            </div>
            ${tableContent}
            <div style="margin-top: 20px;">
                ${totalPrice}
            </div>
        `;

        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>
@endsection