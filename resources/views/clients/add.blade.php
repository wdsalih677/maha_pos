<div class="modal fade" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                {{ __('client.add_client') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route('clients.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="">{{ __('client.name') }} :</label>
                            <input type="text" name="name" class="form-control">

                            <label>{{ __('client.country') }}</label>
                            <input type="text" name="country" class="form-control">

                            <label>{{ __('client.d_o_b') }}</label>
                            <input type="date" name="d_o_b" class="form-control">
                        </div>
                        <div class="col">
                            <label for="">{{ __('client.phone') }} :</label>
                            <input type="text" name="phone" class="form-control">

                            <label>{{ __('users.email') }}</label>
                            <input type="email" name="email" class="form-control">

                            <label>{{ __('client.city') }}</label>
                            <input type="text" name="city" class="form-control">
                        </div>
                    </div>
                    <br>
                    
                    <br>
                    <label>{{ __('client.address') }} :</label>
                    <textarea name="address" class="form-control"></textarea>
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