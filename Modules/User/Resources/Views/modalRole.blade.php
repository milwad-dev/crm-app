<div class="modal fade" id="addNewCard" tabindex="-1" aria-labelledby="addNewCardTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-sm-5 mx-50 pb-5">
                <h1 class="text-center mb-1" id="addNewCardTitle">Add Role To User</h1>
                <form class="row gy-1 gx-2 mt-75" action="{{ route('users.addRole', 0) }}" id="select-role-form" method="POST">
                    @csrf
                    <div class="col-12">
                        <x-panel-label for="role" title="Select Role For User" />
                        <x-panel-select name="role" id="role" defaultText="Select Role For User">
                            @foreach($roles as $role)
                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                        </x-panel-select>
                    </div>
                    <div class="col-12 text-center">
                        <x-panel-button />
                        <button type="reset" class="btn btn-outline-secondary mt-1" data-bs-dismiss="modal" aria-label="Close">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
