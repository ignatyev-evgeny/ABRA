<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="{{ route('main.index') }}">{{ __('Abra Shop') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('main.index') }}">{{ __('Home') }}</a>
                </li>
            </ul>
            @auth()
                <ul class="navbar-nav me-2">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle bold" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ __('Hi, :userName', ['userName' => \Illuminate\Support\Facades\Auth::user()->name]) }}</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('cabinet.product.list') }}"><i class="bi bi-boxes"></i> {{ __('List products') }}</a></li>
                            <li><a class="dropdown-item" href="{{ route('cabinet.baskets.list') }}"><i class="bi bi-basket2-fill"></i> {{ __('Users baskets') }}</a></li>
                            <li><a class="dropdown-item" href="{{ route('main.logout') }}"><i class="bi bi-box-arrow-left"></i> {{ __('Logout') }}</a></li>
                        </ul>
                    </li>
                </ul>
            @endauth
            @guest()
                <a class="nav-link pe-3" aria-current="page" href="{{ route('main.signin') }}">{{ __('Sing in') }}</a>
            @endguest
            <button onclick="location.href = '{{ route('main.basket') }}'" class="btn btn-outline-dark" type="submit">
                <i class="bi-cart-fill me-1"></i>
                {{ __('Basket') }}
                <span class="badge bg-dark text-white ms-1 rounded-pill">{{ $basketCount }}</span>
            </button>
        </div>
    </div>
</nav>