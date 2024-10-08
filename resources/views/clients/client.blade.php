@extends('layouts.master')
@section('css')

@section('title')
    {{ __('main_sitebar.clients_list') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0" style="font-family: Cairo, sans-serif">{{ __('main_sitebar.clients_list') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ __('main_sitebar.clients') }}</a></li>
                <li class="breadcrumb-item active">{{ __('main_sitebar.clients_list') }}</li>
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
                @include('layouts.error')
                <br>
                <button type="submit" class="btn btn-success" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#addmodal">{{ __('main_trans.add') }}</button>
                <br><br>
                <div class="table-responsive">
                    <table id="datatable" class="table-bordered border table table-striped dataTable p-0" style="text-align: center;">
                        <thead style="color: rgb(130, 148, 123);">
                            <tr>
                                <th>#</th>
                                <th>{{ __('client.name') }}</th>
                                <th>{{ __('client.phone') }}</th>
                                <th>{{ __('client.email') }}</th>
                                <th>{{ __('client.country') }}</th>
                                <th>{{ __('client.city') }}</th>
                                <th>{{ __('client.address') }}</th>
                                <th>{{ __('main_trans.option') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $clients as $client )   
                                <tr>
                                    <td>{{ $loop->index +1 }}</td>
                                    <td>{{ $client->name }}</td>
                                    <td>{{ $client->phone }}</td>
                                    <td>{{ $client->email }}</td>
                                    <td>{{ $client->country }}</td>
                                    <td>{{ $client->city }}</td>
                                    <td>{{ $client->address }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-info btn-sm" data-toggle="dropdown" type="button">{{ __('main_trans.option') }}<i class="fa fa-caret-down ml-1"></i></button>
                                            <div class="dropdown-menu tx-13">
                                                <a class="dropdown-item" href="{{ route('client.orders.create',$client->id) }}" title="{{ __('client.add_order') }}"><i class="text-info fa fa-plus"></i> {{ __('client.add_order') }}</a>
                                                <a class="dropdown-item" href="{{ route('client.orders.show' ,$client->id ) }}" title="{{ __('client.show_all_order') }}" ><i class="text-success fa fa-eye"></i> {{ __("client.show_all_order") }}</a>
                                                <button class="dropdown-item"  data-toggle="modal" data-target="#editmodal{{ $client->id }}" title="{{ __('main_trans.edit') }}" ><i class="text-warning fa fa-edit"></i> {{ __("main_trans.edit") }}</button>
                                                <button class="dropdown-item"  data-toggle="modal" data-target="#deletemodal{{ $client->id }}" title="{{ __('main_trans.delete') }}" ><i class="text-danger fa fa-trash"></i> {{ __("main_trans.delete") }}</button>
                                            </div>
                                        </div> 
                                    </td>
                                </tr>
                                @include('clients.edit')
                                @include('clients.delete')
                            @endforeach
                
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>{{ __('client.name') }}</th>
                                <th>{{ __('client.phone') }}</th>
                                <th>{{ __('client.email') }}</th>
                                <th>{{ __('client.country') }}</th>
                                <th>{{ __('client.city') }}</th>
                                <th>{{ __('client.address') }}</th>
                                <th>{{ __('main_trans.option') }}</th>
                            </tr>
                        </tfoot>
                    </table>
                    @include('clients.add')
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
