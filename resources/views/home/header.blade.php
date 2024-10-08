<header class="header_section">
    <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="{{ url('/') }}">
            <span>
                Simple E-Commerce
            </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  ">
                <li>
                    <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('userShop') }}">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('userWhyUs') }}">Why Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('userTestimonial') }}">Testimonial</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('userContactUs') }}">Contact Us</a>
                </li>
            </ul>
            <div class="user_option">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ route('userOrder') }}" style="position: relative; display: inline-block;">
                            My Order
                        </a>
                        <a href="{{ route('userCart') }}" style="position: relative; display: inline-block;">
                            <i class="fa fa-shopping-bag" aria-hidden="true" style="font-size: 24px; color: #333;"></i>
                            <span class="fw-bold bg-warning"
                                style="position: absolute; top: -10px; left: 8px; padding: 1px 8px; border-radius: 50%; font-size: 16px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);">{{ $user_product_count }}</span>
                        </a>

                        <form method="POST" action="{{ route('logout') }}" class="ml-4">
                            @csrf

                            <button type="submit" class="btn btn-outline-danger">
                                Logout <i class="fa fa-sign-out" aria-hidden="true"></i>
                            </button>
                        </form>
                    @else
                        <a href="{{ url('/login') }}">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <span>
                                Login
                            </span>
                        </a>
                        <a href="{{ url('/register') }}">
                            <i class="fa fa-vcard" aria-hidden="true"></i>
                            <span>
                                Register
                            </span>
                        </a>
                    @endauth
                @endif
            </div>
        </div>
    </nav>
</header>
