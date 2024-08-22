@extends('layouts.master')
@section('css')

@section('title')
    {{ __("permission.user_permission") }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0" style="font-family: Cairo, sans-serif">{{ __('permission.user_permission_list') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ __('main_sitebar.users') }}</a></li>
                <li class="breadcrumb-item active">{{ __('permission.user_permission') }}</li>
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
                <a href="{{ route('role.create') }}" class="btn btn-success">{{ __('main_trans.add') }}</a>
                <br><br>
                <div class="table-responsive">
                    <table id="datatable" class="table-bordered border table table-striped dataTable p-0" style="text-align: center;">
                        <thead style="color: rgb(130, 148, 123);">
                            <tr>
                                <th>#</th>
                                <th>{{ __('permission.permission_name') }}</th>
                                <th>{{ __('main_trans.option') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $roles as $role)
                            <tr>
                                <td>{{ $loop->index +1 }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{ route('role.edit', $role->id ) }}" title="{{ __('main_trans.edit') }}" ><i class="fa fa-edit"></i></a>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deletemodal{{ $role->id }}" title="{{ __('main_trans.delete') }}"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                            @include('permissions.delete')
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>{{ __('permission.permission_name') }}</th>
                                <th>{{ __('main_trans.option') }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
