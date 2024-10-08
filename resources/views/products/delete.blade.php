<div class="modal fade" id="deletemodal{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                {{ __('product.delete_product') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route('products.destroy',$product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')
                    <div class="row">
                        <div class="col">
                            <label class="mr-sm-2">{{ __('product.product_name_ar') }} :</label>
                            <input name="name_ar" value="{{ $product->getTranslation('name' , 'ar') }}" type="text"  class="form-control" disabled>

                            <label class="mr-sm-2">{{ __('product.sell_price') }} :</label>
                            <input  name="sell_price" value="{{ $product->sell_price }}" type="number" class="form-control" disabled>

                            <label class="mr-sm-2" >{{ __('category.category') }} :</label>
                            <select name="category_id" class="form-control" style="height: 51px" disabled>
                                @foreach ( $categories as $category )
                                    <option value="{{ $category->id }}" {{ $category->id == $product->categories->id ? 'selected' : '' }}>{{ App::getLocale() == 'ar' ? $category->getTranslation('name' ,'ar') : $category->getTranslation('name' ,'en') }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label class="mr-sm-2">{{ __('product.product_name_en') }} :</label>
                            <input name="name_en" value="{{ $product->getTranslation('name' , 'en') }}" type="text"  class="form-control" disabled>

                            <label class="mr-sm-2">{{ __('product.buy_price') }} :</label>
                            <input name="buy_price" value="{{ $product->buy_price }}" type="number"  class="form-control" disabled>

                            <label class="mr-sm-2">{{ __('product.stock') }} :</label>
                            <input name="stock" value="{{ $product->stock }}" type="number"  class="form-control" disabled>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6 text-center m-md-auto mt-5">
                            <img class="img-thumbnail image-preview" src="{{ asset('storage/products/'.$product->image) }}" style="height: 60px;width:100px">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label>{{ __('product.description_ar') }} :</label>
                            <textarea name="description_ar" class="form-control" style="height: 200px" disabled>{{ $product->getTranslation('description' , 'ar') }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label>{{ __('product.description_en') }} :</label>
                            <textarea name="description_en" class="form-control" style="height: 200px" disabled>{{ $product->getTranslation('description' , 'en') }}</textarea>
                        </div>
                    </div>
            </div>
                    <div class="modal-footer" style="display: flex;justify-content: space-between;">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('main_trans.close') }}</button>
                        <button type="submit" class="btn btn-danger">{{ __('main_trans.delete') }}</button>
                    </div>
            </form>

        </div>
    </div>
</div>

