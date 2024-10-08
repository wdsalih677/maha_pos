<div class="modal fade" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                {{ __('product.add_product') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label class="mr-sm-2">{{ __('product.product_name_ar') }} :</label>
                            <input name="name_ar" type="text"  class="form-control" required>

                            <label class="mr-sm-2">{{ __('product.sell_price') }} :</label>
                            <input  name="sell_price" type="number" step="0.01" class="form-control" required>

                            <label class="mr-sm-2" >{{ __('category.category') }} :</label>
                            <select name="category_id" class="form-control" style="height: 51px">
                                @foreach ( $categories as $category )
                                    <option value="{{ $category->id }}">{{ App::getLocale() == 'ar' ? $category->getTranslation('name' ,'ar') : $category->getTranslation('name' ,'en') }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label class="mr-sm-2">{{ __('product.product_name_en') }} :</label>
                            <input name="name_en" type="text"  class="form-control" required>

                            <label class="mr-sm-2">{{ __('product.buy_price') }} :</label>
                            <input name="buy_price" type="number" step="0.01" class="form-control" required>

                            <label class="mr-sm-2">{{ __('product.stock') }} :</label>
                            <input name="stock" type="number"  class="form-control" required>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="mr-sm-2">{{ __('product.image') }} <span style="font-family: 'Cairo', sans-serif; color:rgb(216, 216, 216)">jpeg,png,jpg,gif  <span class="text-danger">*</span>  </span> :</label>
                            <input name="image" class="form-control image" type="file" accept="image/png, image/gif, image/jpeg ,image/jpg">
                        </div>
                        <div class="col-md-6 text-center m-md-auto mt-5">
                            <img class="img-thumbnail image-preview" src="{{ URL::asset('assets/images/bg/01.jpg') }}" style="height: 60px;width:100px">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label>{{ __('product.warehous') }} :</label>
                            <select name="warehous_id" class="form-control">
                                @foreach ($warehouses as $warehous )
                                    <option value="{{ $warehous->id }}">{{ $warehous->warehous_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label>{{ __('product.description_ar') }} :</label>
                            <textarea name="description_ar" class="form-control" style="height: 200px"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label>{{ __('product.description_en') }} :</label>
                            <textarea name="description_en" class="form-control" style="height: 200px"></textarea>
                        </div>
                    </div>
            </div>
                    <div class="modal-footer" style="display: flex;justify-content: space-between;">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('main_trans.close') }}</button>
                        <button type="submit" class="btn btn-success">{{ __('main_trans.add') }}</button>
                    </div>
            </form>

        </div>
    </div>
</div>

