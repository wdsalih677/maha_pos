<div class="modal fade" id="editmodal{{ $supplier->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                {{ __('supplier.edit_supplier') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route('suppliers.update' , $supplier->id) }}" method="POST">
                    @csrf
                    @method("PATCH")
                    <div class="row">
                        <div class="col-md-6">
                            <label>{{ __('supplier.name') }}</label>
                            <input type="text" class="form-control" name="name" value="{{ $supplier->name }}">
                            <label>{{ __('supplier.phone') }}</label>
                            <input type="number" class="form-control" name="phone" value="{{ $supplier->phone }}">
                            <label>{{ __('supplier.city') }}</label>
                            <input type="city" class="form-control" name="city" value="{{ $supplier->city }}">
                        </div>
                        <div class="col-md-6">
                            <label>{{ __('supplier.email') }}</label>
                            <input type="email" class="form-control" name="email" value="{{ $supplier->email }}">
                            <label>{{ __('supplier.country') }}</label>
                            <input type="country" class="form-control" name="country" value="{{ $supplier->country }}">
                            <label>{{ __('supplier.address') }}</label>
                            <input type="address" class="form-control" name="address" value="{{ $supplier->address }}">
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