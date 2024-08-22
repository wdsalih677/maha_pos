@extends('layouts.master')
@section('css')

@section('title')
    {{ __('permission.add_permission') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0" style="font-family: Cairo, sans-serif">{{ __('permission.add_permission') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ __('permission.user_permission') }}</a></li>
                <li class="breadcrumb-item active">{{ __('permission.add_permission') }}</li>
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
                <form action="{{ route('role.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-30">
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputEmail1">إسم الصلاحيه :</label>
                                <input type="text" class="form-control" name="name" aria-describedby="emailHelp" placeholder="ادخل اسم الصلاحيه">
                              </div>
                        </div>
                    </div>
                    <label >{{ __('permission.permissions') }} :</label>
                    <div class="row">
                        @foreach ($permissions as $x )
                                <div class="col-md-3">
                                    <input type="checkbox" name="permission[]" value="{{ $x->name }}">
                                    <label>{{ $x->name }}</label>
                                </div>
                        @endforeach
                    </div> 
                    <br><br>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">{{ __('main_trans.add') }}</button>
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
