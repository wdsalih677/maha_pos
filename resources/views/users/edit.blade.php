<div class="modal fade" id="editmodal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                {{ __('users.edit_user') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route('users.update' , $user->id) }}" method="POST">
                    @csrf
                    @method("PATCH")
                    <div class="row">
                        <div class="col">
                            <label for="Name" class="mr-sm-2">{{ __('users.username') }} :</label>
                            <input id="name" name="name" type="text" value="{{ $user->name }}"  class="form-control" required>

                            <label for="Name" class="mr-sm-2">{{ __('users.confirm-password') }} :</label>
                            <input id="name" type="password" name="confirm-password" class="form-control" required>

                            <label for="Name"  class="mr-sm-2">{{ __('users.status') }} :</label>
                            <select name="status" class="form-control" required>
                                <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>{{ __('users.active') }}</option>
                                <option value="0" {{ $user->status == 0 ? 'selected' : '' }}>{{ __('users.not_active') }}</option>
                            </select>
                            <br>
                        </div>
                        <div class="col">
                            <label for="Name" class="mr-sm-2">{{ __('users.email') }} :</label>
                            <input id="name" name="email" type="email" value="{{ $user->email }}" class="form-control" required>

                            <label for="Name" class="mr-sm-2">{{ __('users.password') }} :</label>
                            <input id="name" name="password" type="password"  class="form-control" required>

                            <label for="Name"  class="mr-sm-2">{{ __('users.user_role') }} :</label>
                            <select name="role_name" class="form-control" required>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}" {{ $role->name }} >{{ $role->name }}</option>
                                @endforeach
                            </select>
                            <br>
                        </div>
                    </div>
            </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ __('main_trans.close') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('main_trans.edit') }}</button>
                    </div>
            </form>

        </div>
    </div>
</div>
