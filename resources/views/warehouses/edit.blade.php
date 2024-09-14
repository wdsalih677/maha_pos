<div class="modal fade" id="editmodal{{ $warehous->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                {{ __('warehous.edit_warehous') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route('warehouses.update' , $warehous->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-md-6">
                            <label>{{ __("warehous.warehous_name") }}</label>
                            <input type="text" name="warehous_name" class="form-control" value="{{ $warehous->warehous_name }}">
                            <label>{{ __("warehous.phone") }}</label>
                            <input type="text" name="phone" class="form-control"  value="{{ $warehous->phone }}">
                            <label>{{ __("warehous.country") }}</label>
                            <input type="text" name="country" class="form-control" value="{{ $warehous->country }}">
                        </div>
                        <div class="col-md-6">
                            <label>{{ __("warehous.email") }}</label>
                            <input type="text" name="email" class="form-control" value="{{ $warehous->email }}">
                            <label>{{ __("warehous.city") }}</label>
                            <input type="text" name="city" class="form-control" value="{{ $warehous->city }}">
                            <label>{{ __("warehous.zip_code") }}</label>
                            <input type="number" name="zip_code" class="form-control" value="{{ $warehous->zip_code }}">
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