<div class="modal fade" id="editmodal{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                {{ __('category.edit_category') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route('categories.update' , $category->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col">
                            <label for="">{{ __('category.category_name_ar') }} :</label>
                            <input type="text" name="name_ar" value="{{ $category->getTranslation('name' , 'ar') }}" class="form-control">
                        </div>
                        <div class="col">
                            <label for="">{{ __('category.category_name_en') }} :</label>
                            <input type="text" name="name_en" value="{{ $category->getTranslation('name' , 'en') }}" class="form-control">
                        </div>
                    </div>
            </div>
                    <div class="modal-footer" style="display: flex;justify-content: space-between;">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ __('main_trans.close') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('main_trans.edit') }}</button>
                    </div>
            </form>

        </div>
    </div>
</div>