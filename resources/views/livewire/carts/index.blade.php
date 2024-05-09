<div>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">My Cart</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            @forelse ($users as $user)
                <hr>
                <div class="card border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
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
                            </div>
                            <div class="col">
                                <h1>{{ $user->name }}</h1>
                                <p>{{ $user->email }}</p>
                                <p>{{ $user->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <hr>
                <div class="card border-0">
                    <div class="card-body">
                        <p class="text-center">No users found.</p>
                    </div>
                </div>
            @endforelse

        </div>
        <div class="offcanvas-footer p-2">
            Total users: {{ count($users) }}
        </div>
    </div>
</div>
