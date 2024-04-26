<div>

    <nav class="navbar navbar-expand-lg bg-secondary border-bottom sticky-top border-body">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="/" wire:navigate>
                <img src="https://cdn2.iconfinder.com/data/icons/sustainable-fashion-4/512/LocalBrand-clothing-clothes-brand-goods-localproducts-localfashion-512.png"
                    alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                Store No
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav ms-auto text-center">
                    <button class="btn btn-link text-warning" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar"
                        aria-label="Toggle navigation">
                        {{ $cartCount }}
                        <i class="far fa-shopping-cart"></i>
                    </button>
                    <li class="nav-item">
                        <a class="nav-link text-white" aria-current="page" href="/" wire:navigate>Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/features" wire:navigate>Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/pricing" wire:navigate>Pricing</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="btn btn-primary form-control" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Join
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg-end">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @livewire('carts.index')
</div>
