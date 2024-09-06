<div class="modal fade" id="deletemodal{{ $order->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                   {{ __('order.delete_order') }} | {{ $order->ordernumber }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form action="{{ route('orders.destroy' , $order->id) }}" method="POST">
                        @csrf
                        @method("DELETE")
                        @foreach ($order->products as $product) 
                        <div class="col-md-6">
                            <label>{{ __('product.product_name') }}</label>
                            <input type="text" class="form-control" value="{{ App::getLocale() == 'ar' ? $product->getTranslation('name', 'ar') : $product->getTranslation('name', 'en') }}">
                            <label>{{ __('product.quantity') }}</label>
                            <input type="text" class="form-control" value="{{ $product->pivot->quantity }}">
                        </div>
                        <div class="col-md-6">
                            <label>{{ __('order.unit_price') }}</label>
                            <input type="text" class="form-control" value="{{ number_format($product->sell_price, 2) }}">
                            <label>{{ __('order.total_unit_price') }}</label>
                            <input type="text" class="form-control" value="{{ number_format($product->pivot->quantity * $product->sell_price , 2) }}">
                        </div>
                    @endforeach
                </div>
                <br>
                <h6 class="mb-0" style="font-family: Cairo, sans-serif">{{ __('order.total_price') }} = {{ number_format($order->total_price,2) }}</h6>
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