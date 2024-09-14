<div class="modal fade" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                {{ __('supplier.add_supplier') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route('suppliers.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label>{{ __('supplier.name') }}</label>
                            <input type="text" class="form-control" name="name">
                            <label>{{ __('supplier.phone') }}</label>
                            <input type="number" class="form-control" name="phone">
                            <label>{{ __('supplier.city') }}</label>
                            <input type="city" class="form-control" name="city">
                        </div>
                        <div class="col-md-6">
                            <label>{{ __('supplier.email') }}</label>
                            <input type="email" class="form-control" name="email">
                            <label>{{ __('supplier.country') }}</label>
                            <input type="country" class="form-control" name="country">
                            <label>{{ __('supplier.address') }}</label>
                            <input type="address" class="form-control" name="address">
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