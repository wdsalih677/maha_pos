@extends('layouts.master')
@section('css')

@section('title')
    {{ __('permission.edit_permission') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0" style="font-family: Cairo, sans-serif">{{ __('permission.edit_permission') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ __('permission.user_permission') }}</a></li>
                <li class="breadcrumb-item active">{{ __('permission.edit_permission') }}</li>
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
                <form action="{{ route('role.update' , $role->id) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-md-6 mb-30">
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputEmail1">إسم الصلاحيه :</label>
                                <input type="text" class="form-control" name="name" value="{{ $role->name }}">
                                <input type="hidden" name="id" value="{{ $role->id }}">
                              </div>
                        </div>
                    </div>
                    <label >{{ __('permission.permissions') }} :</label>
                    <div class="row">
                        @foreach ($permissions as $x )
                                <div class="col-md-3">
                                    <input type="checkbox" name="permission[]" value="{{ $x->name }}" {{ in_array($x->id, $rolePermissions) ? 'checked' : '' }}>
                                    <label>{{ $x->name }}</label>
                                </div>
                        @endforeach
                    </div> 
                    <br><br>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">{{ __('main_trans.edit') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
