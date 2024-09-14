<div class="modal fade" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                {{ __('warehous.add_warehous') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route('warehouses.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label>{{ __("warehous.warehous_name") }}</label>
                            <input type="text" name="warehous_name" class="form-control">
                            <label>{{ __("warehous.phone") }}</label>
                            <input type="text" name="phone" class="form-control">
                            <label>{{ __("warehous.country") }}</label>
                            <input type="text" name="country" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label>{{ __("warehous.email") }}</label>
                            <input type="text" name="email" class="form-control">
                            <label>{{ __("warehous.city") }}</label>
                            <input type="text" name="city" class="form-control">
                            <label>{{ __("warehous.zip_code") }}</label>
                            <input type="number" name="zip_code" class="form-control">
                        </div>
                    </div>
            </div>
                    <div class="modal-footer" style="display: flex;justify-content: space-between;">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ __('main_trans.close') }}</button>
                        <button type="submit" class="btn btn-success">{{ __('main_trans.add') }}</button>
                    </div>
            </form>

        </div>
    </div>
</div>