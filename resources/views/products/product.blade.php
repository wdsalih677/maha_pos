@extends('layouts.master')
@section('css')

@section('title')
    {{ __('main_sitebar.products') }}
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0" style="font-family: Cairo, sans-serif">{{ __('main_sitebar.products_list') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ __('main_sitebar.products') }}</a></li>
                <li class="breadcrumb-item active">{{ __('main_sitebar.products_list') }}</li>
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
                <br><br><br>
                <div class="row">
                    @foreach ( $products as $product )
                    <div class="col-xl-3 mb-30">
                        <div class="card card-statistics mb-30">
                            <div class="card-body">
                                <h5 class="card-title" style="font-family: Cairo, sans-serif;display: flex;justify-content: space-between;"><label>{{ $product->getTranslation('name' , 'ar') }}</label>|<span>{{ $product->getTranslation('name' , 'en') }}</span></h5>
                                <div class="row">
                                    <div class="col">
                                        <label for="">{{ __("product.buy_price") }}</label>: 
                                        <label for="">{{ $product->buy_price }}</label>
                                        <br>
                                        <label for="">{{ __('category.category') }}</label>:
                                        <label for="">{{ $product->categories->name }}</label>
                                    </div>
                                    <div class="col">
                                        <label for="">{{ __("product.sell_price") }}</label>:
                                        <label for="">{{ $product->sell_price }}</label>
                                        <br>
                                        <label for="">{{ __('product.stock') }}</label>:
                                        <label for="">{{ $product->stock }}</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">{{ __('product.description_ar') }}</label>:
                                        <br>
                                        <p id="short-content">
                                            {{ Str::limit($product->getTranslation('description' ,'ar'), 10) }}
                                            <a href="javascript:void(0);" id="read-more">{{ __('main_trans.read_more') }}</a>
                                        </p>
                                        <p id="full-content" style="display: none;">
                                            {{ $product->getTranslation('description' ,'ar') }}
                                            <a href="javascript:void(0);" id="read-less">{{ __('main_trans.read_less') }}</a>
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">{{ __('product.description_en') }}</label>:
                                        <br>
                                        <p id="short-content0">
                                            {{ Str::limit($product->getTranslation('description' ,'en'), 10) }}
                                            <a href="javascript:void(0);" id="read-more0">{{ __('main_trans.read_more') }}</a>
                                        </p>
                                        <p id="full-content0" style="display: none;">
                                            {{ $product->getTranslation('description' ,'en') }}
                                            <a href="javascript:void(0);" id="read-less0">{{ __('main_trans.read_less') }}</a>
                                        </p>
                                    </div>
                                </div>
                                <hr>
                                <img class="img-thumbnail" src="{{ asset('storage/products/'.$product->image) }}" height="150px" width="100%" alt="">
                                <hr>
                                <div style="display: flex;justify-content: space-between;">
                                    <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#editmodal{{ $product->id }}">{{ __('main_trans.edit') }}</button>
                                    <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#deletemodal{{ $product->id }}">{{ __('main_trans.delete') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('products.edit')
                    @include('products.delete')                    
                    @endforeach
                </div>
                <div class="d-flex justify-content-center">
                    {{ $products->links('pagination::bootstrap-4') }}
                </div>
                @include('products.add')
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
<script>
    //script to display image preview
    $(".image").change(function (){
        if(this.files && this.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $('.image-preview').attr('src',e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
</script>
{{-- read-more and read-less script for description ar--}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const readMore = document.getElementById('read-more');
        const readLess = document.getElementById('read-less');
        const shortContent = document.getElementById('short-content');
        const fullContent = document.getElementById('full-content');

        readMore.addEventListener('click', function () {
            shortContent.style.display = 'none';
            fullContent.style.display = 'block';
        });

        readLess.addEventListener('click', function () {
            shortContent.style.display = 'block';
            fullContent.style.display = 'none';
        });
    });
</script>
{{-- read-more and read-less script for description en --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const readMore = document.getElementById('read-more0');
        const readLess = document.getElementById('read-less0');
        const shortContent = document.getElementById('short-content0');
        const fullContent = document.getElementById('full-content0');

        readMore.addEventListener('click', function () {
            shortContent.style.display = 'none';
            fullContent.style.display = 'block';
        });

        readLess.addEventListener('click', function () {
            shortContent.style.display = 'block';
            fullContent.style.display = 'none';
        });
    });
</script>
@endsection
