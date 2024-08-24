<div class="modal fade" id="deletemodal{{ $role->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                {{ __('permission.delete_permission') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route('role.destroy' , $role->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="row">
                        <div class="col">
                            <label for="Name" class="mr-sm-2 text-danger">{{ __('permission.permission_name') }} :</label>
                            <input id="name" name="name" type="text" value="{{ $role->name }}"  class="form-control" disabled>
                            <input type="hidden" name="id" value="{{ $role->id }}">
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