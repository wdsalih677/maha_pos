@extends('layouts.master')
@section('css')

@section('title')
    {{ __('client.orders_of_client') }} | {{ $client->name }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0" style="font-family: Cairo, sans-serif">{{ __('client.orders_of_client') }} | {{ $client->name }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ __('main_sitebar.clients_list') }}</a></li>
                <li class="breadcrumb-item active">{{ __('client.orders_of_client') }} | {{ $client->name }}</li>
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
                <div class="container ml-0">

                </div>
                <div class="accordion plus-icon shadow">
                    <div class="acd-group">
                        {{-- @if ($client->orders == null) --}}
                            @foreach ($orders as $order)
                            <a href="#" class="acd-heading">{{ __('client.orders_dated') }} {{  $order->created_at->format('d/m/Y') }} | {{ $order->created_at->diffForHumans() }}</a>
                            <div class="acd-des">
                                <h6 class="default-color text-center" style="font-family: Cairo, sans-serif">{{ __('order.order_number') }} | {{ $order->ordernumber }}</h6>
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
                                            @foreach ( $order->products as $product )
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
                                </div>
                            </div> 
                            @endforeach
                            {{-- {{ $orders->links('pagination::bootstrap-5') }} --}}
                            <div class="pagination">
                                {{ $orders->links('pagination::bootstrap-4') }}
                            </div>
                        {{-- @else --}}
                            {{-- <div class="acd-des">
                                <div class="alert alert-danger text-lg-center">{{ __('category.no_products') }}</div>
                            </div>   --}}
                        {{-- @endif --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
