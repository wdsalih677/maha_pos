@extends('layouts.master')
@section('css')

@section('title')
    {{ __("main_sitebar.warehouses_list") }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0" style="font-family: Cairo, sans-serif">{{ __("main_sitebar.warehouses_list") }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ __('main_sitebar.warehouses') }}</a></li>
                <li class="breadcrumb-item active">{{ __("main_sitebar.warehouses_list") }}</li>
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
                <button class="btn btn-success" data-toggle="modal" data-target="#addmodal">{{ __('main_trans.add') }}</button>
                <br><br>
                <div class="table-responsive">
                    <table id="datatable" class="table-bordered border table table-striped dataTable p-0" style="text-align: center;">
                        <thead style="color: rgb(130, 148, 123);">
                            <tr>
                                <th>#</th>
                                <th>{{ __('warehous.warehous_name') }}</th>
                                <th>{{ __('warehous.email') }}</th>
                                <th>{{ __('warehous.phone') }}</th>
                                <th>{{ __('warehous.country') }}</th>
                                <th>{{ __('warehous.city') }}</th>
                                <th>{{ __('warehous.zip_code') }}</th>
                                <th>{{ __('main_trans.option') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $warehouses as $warehous)
                            <tr>
                                <td>{{ $loop->index +1 }}</td>
                                <td>{{ $warehous->warehous_name }}</td>
                                <td>{{ $warehous->email }}</td>
                                <td>{{ $warehous->phone }}</td>
                                <td>{{ $warehous->country }}</td>
                                <td>{{ $warehous->city }}</td>
                                <td>{{ $warehous->zip_code }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editmodal{{ $warehous->id }}" title="{{ __('main_trans.edit') }}"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deletemodal{{ $warehous->id }}" title="{{ __('main_trans.delete') }}"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                            @include('warehouses.edit')
                            @include('warehouses.delete')
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>{{ __('warehous.warehous_name') }}</th>
                                <th>{{ __('warehous.email') }}</th>
                                <th>{{ __('warehous.phone') }}</th>
                                <th>{{ __('warehous.country') }}</th>
                                <th>{{ __('warehous.city') }}</th>
                                <th>{{ __('warehous.zip_code') }}</th>
                                <th>{{ __('main_trans.option') }}</th>
                            </tr>
                        </tfoot>
                    </table>
                    @include('warehouses.add')
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection