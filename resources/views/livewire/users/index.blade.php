<div>
    @include('livewire.users.modals.create')
    @include('livewire.users.modals.edit')

    @if (session('message'))
        <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
            <div>
                <i class="fas fa-check-circle text-success"></i> {{ session('message') }}
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
            <div>
                <i class="fas fa-check-circle text-danger"></i> {{ session('error') }}
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

        </div>
    @endif
    <div class="d-flex justify-content-between mt-5">
        <div class="col-3">
            <input class="form-control me-2" wire:model.live="search" type="search" placeholder="Search"
                aria-label="Search">
        </div>
        <div class="">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUser"
                wire:click="resetData()">Add User</button>
        </div>
    </div>
    {{-- @if (sizeof($usersSearched) > 0)
        <ul class="dropdown-menu always-open px-2 mb-3">
            @foreach ($usersSearched as $user)
                <li>
                    {{ $user->name }}
                </li>
                <li>
                    {{ $user->email }}
                </li>
                <li class="dropdown-divider"></li>
            @endforeach
        </ul>
    @endif --}}
    <div class="table-responsive mt-3">
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Profile Photo</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Join Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td class="text-center">{{ $user->id }}</td>
                        <td>
                            @if (is_array($user->profile_image) && $user->profile_image != null)
                                @foreach ($user->profile_image as $index => $profile)
                                    <img src="{{ Storage::url($profile) }}" alt=""
                                        class="img-fluid w-25 h-25 rounded border">
                                @endforeach
                            @endif
                            @if ($user->profile_image == null)
                                <img src="https://st3.depositphotos.com/15648834/17930/v/450/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"
                                    alt="" class="img-fluid w-25 h-25 rounded border">
                            @endif
                        </td>
                        </td>
                        <td>{{ $user->name }}
                        </td>
                        <td>{{ $user->email }}</td>
                        <td class="text-muted">{{ $user->created_at->diffForHumans() }}</td>
                        <td>
                            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editUser"
                                wire:click="editUser({{ $user->id }})">Update</a>
                            <button class="btn btn-danger" wire:click="delete({{ $user->id }})"
                                wire:loading.attr="disabled">Delete</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No data found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{ $users->links() }}
    </div>
    <style>
        .dropdown-menu.always-open {
            display: block;
        }
    </style>

    <script>
        window.addEventListener('success', event => {
            $('#addUser').modal('hide');
        });
    </script>
</div>
