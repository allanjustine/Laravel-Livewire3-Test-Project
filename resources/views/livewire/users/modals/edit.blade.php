<div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="editUser" tabindex="-1" aria-labelledby="addUserLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form wire:submit="updateUser">

                @if ($userEdit)
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="addUserLabel">Updating User {{ $name }}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-2">
                                <label for="photos">Select Profile Image</label>
                                <input type="file" class="form-control" wire:model="profile_images" multiple>
                                <div class="row mt-2">
                                    @if (is_array($profile_images))
                                        @foreach ($profile_images as $p)
                                            <div class="col">
                                                @if (is_string($p))
                                                    <img src="{{ Storage::url($p) }}" class="img-fluid" alt=""
                                                        style="width: 120px; height: 100px;">
                                                @elseif (is_object($p) && method_exists($p, 'temporaryUrl'))
                                                    <img src="{{ $p->temporaryUrl() }}" class="img-fluid" alt=""
                                                        style="width: 120px; height: 100px;">
                                                @endif
                                            </div>
                                        @endforeach
                                    @endif
                                    @if ($profile_images == null)
                                        <img src="https://st3.depositphotos.com/15648834/17930/v/450/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"
                                            alt="" class="img-fluid" style="width: 120px; height: 100px;">
                                    @endif
                                </div>
                                @error('profile_images')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label for="name" class="col-form-label">Name</label>
                                <input type="text" class="form-control" wire:model.live="name">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label for="email" class="col-form-label">Email</label>
                                <input type="email" class="form-control" id="email" wire:model.blur="email">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label for="password" class="col-form-label">Password</label>
                                <input type="password" class="form-control" id="password" wire:model.blur="password">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update User</button>
                        </div>
                    </div>
                @endif
            </form>
        </div>
    </div>

</div>
