@extends('layouts.master')
@section('css')

@section('title')
    {{ __('main_sitebar.users') }}
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0" style="font-family: Cairo, sans-serif">{{ __('main_sitebar.users_list') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ __('main_sitebar.users') }}</a></li>
                <li class="breadcrumb-item active">{{ __('main_sitebar.users_list') }}</li>
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
                                <th>{{ __('users.username') }}</th>
                                <th>{{ __('users.email') }}</th>
                                <th>{{ __('users.status') }}</th>
                                <th>{{ __('users.user_role') }}</th>
                                <th>{{ __('main_trans.option') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $users as $user)
                            <tr>
                                <td>{{ $loop->index +1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if ($user->status == 1)
                                        <label class="badge bg-success" style="font-size: 12px; color:white;">{{ __('users.active') }}</label>
                                    @else   
                                        <label class="badge bg-danger" style="font-size: 12px; color:white;">{{ __('users.not_active') }}</label>
                                    @endif
                                </td>
                                <td>
                                    @if($user->getRoleNames()->isNotEmpty())
                                        @foreach ($user->getRoleNames() as $role)
                                            {{ $role }}<br>
                                        @endforeach
                                    @else
                                        No roles assigned
                                    @endif
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editmodal{{ $user->id }}" title="{{ __('main_trans.edit') }}"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deletemodal{{ $user->id }}" title="{{ __('main_trans.delete') }}"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                            @include('users.edit')
                            @include('users.delete')
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>{{ __('users.username') }}</th>
                                <th>{{ __('users.email') }}</th>
                                <th>{{ __('users.status') }}</th>
                                <th>{{ __('users.user_role') }}</th>
                                <th>{{ __('main_trans.option') }}</th>
                            </tr>
                        </tfoot>
                    </table>
                    @include('users.add')
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
