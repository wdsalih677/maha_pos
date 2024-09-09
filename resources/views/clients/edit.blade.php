<div class="modal fade" id="editmodal{{ $client->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                {{ __('client.edit_client') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route('clients.update' , $client->id) }}" method="POST">
                    @csrf
                    @method("PATCH")
                    <div class="row">
                        <div class="col">
                            <label for="">{{ __('client.name') }} :</label>
                            <input type="text" value="{{ $client->name }}" name="name" class="form-control">
                        </div>
                        <div class="col">
                            <label for="">{{ __('client.phone') }} :</label>
                            <input type="text" value="{{ $client->phone }}" name="phone" class="form-control">
                        </div>
                    </div>
                    <br>
                    <label>{{ __('users.email') }}</label>
                    <input type="email" name="email" class="form-control" value="{{ $client->email }}">
                    <br>
                    <label>{{ __('client.address') }} :</label>
                    <textarea name="address" class="form-control">{{ $client->address }}</textarea>
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