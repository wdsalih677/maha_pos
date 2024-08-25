<div class="modal fade" id="deletemodal{{ $client->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                {{ __('client.delete_client') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route('clients.destroy' , $client->id) }}" method="POST">
                    @csrf
                    @method("DELETE")
                    <div class="row">
                        <div class="col">
                            <label for="">{{ __('client.name') }} :</label>
                            <input type="text" value="{{ $client->name }}" name="name" class="form-control" disabled>
                        </div>
                        <div class="col">
                            <label for="">{{ __('client.phone') }} :</label>
                            <input type="text" value="{{ $client->phone }}" name="phone" class="form-control" disabled>
                        </div>
                    </div>
                    <br>
                    <label>{{ __('client.address') }} :</label>
                    <textarea name="address" class="form-control" disabled>{{ $client->address }}</textarea>
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