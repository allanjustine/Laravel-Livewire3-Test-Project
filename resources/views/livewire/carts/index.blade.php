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
                        <h1>Item 1</h1>
                        <p>Hello</p>
                        <p>$100</p>
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
            Grand total: $1110000
        </div>
    </div>
</div>
