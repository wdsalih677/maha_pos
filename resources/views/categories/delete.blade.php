<div class="modal fade" id="deletemodal{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                {{ __('category.delete_category') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route('categories.destroy' , $category->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="row">
                        <div class="col">
                            <label for="">{{ __('category.category_name_ar') }} :</label>
                            <input type="text" name="name_ar" value="{{ $category->getTranslation('name' , 'ar') }}" class="form-control" disabled>
                            <input type="hidden" name="id" value="$category->id">
                        </div>
                        <div class="col">
                            <label for="">{{ __('category.category_name_en') }} :</label>
                            <input type="text" name="name_en" value="{{ $category->getTranslation('name' , 'en') }}" class="form-control" disabled>
                        </div>
                    </div>
            </div>
                    <div class="modal-footer" style="display: flex;justify-content: space-between;">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ __('main_trans.close') }}</button>
                        <button type="submit" class="btn btn-danger">{{ __('main_trans.delete') }}</button>
                    </div>
            </form>

        </div>
    </div>
</div>