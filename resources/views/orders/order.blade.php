@extends('layouts.master')
@section('css')

@section('title')
{{ __('main_sitebar.orders_list') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0" style="font-family: Cairo, sans-serif">{{ __('main_sitebar.orders_list') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ __('main_sitebar.orders') }}</a></li>
                <li class="breadcrumb-item active">{{ __('main_sitebar.orders_list') }}</li>
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
                <table id="datatable" class="table-bordered border table table-striped dataTable p-0" style="text-align: center;">
                    <thead style="color: rgb(130, 148, 123);">
                        <tr>
                            <th>#</th>
                            <th>{{ __('client.name') }}</th>
                            <th>{{ __('order.total_price') }}</th>
                            <th>{{ __('order.order_date') }}</th>
                            <th>{{ __('order.order_number') }}</th>
                            <th>{{ __('order.orders_details') }}</th>
                            <th>{{ __('main_trans.option') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $orders as $order)
                        <tr>
                            <td>{{ $loop->index +1 }}</td>
                            <td>{{ $order->clients->name }}</td>
                            <td>{{number_format($order->total_price , 2) }}</td>
                            <td>{{  $order->created_at->format('d/m/Y') }} | {{ $order->created_at->diffForHumans() }}</td>
                            <td>{{ $order->ordernumber }}</td>
                            <td>
                                <a href="{{ route("order.detalis" , $order->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> {{ __('main_trans.show') }}</a>
                            </td>
                            <td>
                                <a href="{{ route('orders.edit' , $order->id ) }}" class="btn btn-primary btn-sm" title="{{ __('main_trans.edit') }}"><i class="fa fa-edit"></i></a>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deletemodal{{ $order->id }}" title="{{ __('main_trans.delete') }}"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                        @include('clients.orders.delete')
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>{{ __('client.name') }}</th>
                            <th>{{ __('order.total_price') }}</th>
                            <th>{{ __('order.order_date') }}</th>
                            <th>{{ __('order.order_number') }}</th>
                            <th>{{ __('order.orders_details') }}</th>
                            <th>{{ __('main_trans.option') }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
