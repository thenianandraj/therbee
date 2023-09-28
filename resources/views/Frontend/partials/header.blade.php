<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="/"><img src="/images/WoodenLogo.jpg" alt="logo"
                style="width: 180px;height: 100px;"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>
        <form action="/global_search" method="GET">
        <div class="input-group input-group-sm">
            <input class="form-control custom-input" type="search" placeholder="Search" name="keywords" aria-label="Search">
            <div class="input-group-append">
                <span class="input-group-text custom-pink-bg"><i class="icon-search"></i></span>
            </div>
        </div>
    </form>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="/" class="nav-link">HOME</a></li>
                <li class="nav-item"><a href="/list_cart" class="nav-link">MYORDERS</a></li>
                <li class="nav-item"><a href="/wishlist" class="nav-link">WISHLIST</a></li>
                @if(Auth::user())
                    <li class="nav-item cta cta-colored">
                        <a href="cart" class="nav-link">
                            <span class="icon-shopping_cart"></span>{{ (Auth::user()->name) }}
                            [{{ Auth::check() ? auth()->user()->cartItems->count() : 0 }}]
                        </a>
                    </li>
                @else
                    <li class="nav-item cta cta-colored"><a href="/login" class="nav-link"><span
                                class="icon-shopping_cart"></span>LOGIN[0]</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>
<nav class="navbar navbar-expand-sm navbar-light bg-white">
    <div class="container justify-content-center justify-content-sm-between">
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                @foreach($categories  as $category)
                    <li class="nav-item ">@if($category->name == 'SKIN CARE')<a
                            href="/category_single{{ $category->name }}" class="nav-link">SkinCare</a>@endif</li>
                    <li class="nav-item"> @if($category->name == 'HAIR CARE')<a
                            href="/category_single{{ $category->name }}" class="nav-link">HairCare</a>@endif</li>
                    <li class="nav-item"> @if($category->name == 'BATH AND BODY CARE')<a
                            href="/category_single{{ $category->name }}" class="nav-link">Bath&Body </a>@endif</li>
                    <li class="nav-item"> @if($category->name == 'ESSENTIAL OIL')<a
                            href="/category_single{{ $category->name }}" class="nav-link">ESSENTIAL OIL </a>@endif
                    </li>
                    <li class="nav-item">@if($category->name == 'LIP CARE')<a
                            href="/category_single{{ $category->name }}" class="nav-link">LipCare</a>@endif</li>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>