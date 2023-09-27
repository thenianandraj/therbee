<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
  <div class="container">
      <a class="navbar-brand" href="/"><img src="/images/WoodenLogo.jpg" alt="logo" style="width: 130px;height: 80px;"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="oi oi-menu"></span> Menu
      </button>

      <div class="input-group input-group-sm">
        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
            <span class="input-group-text custom-pink-bg"><i class="icon-search"></i></span>
        </div>
    </div>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="/" class="nav-link">HOME</a></li>
                <li class="nav-item"><a href="/list_cart" class="nav-link">MYORDERS</a></li>
                <li class="nav-item"><a href="/wishlist" class="nav-link">wISHLIST</a></li>
                  @if(Auth::user())
                  <li class="nav-item cta cta-colored">
                      <a href="cart" class="nav-link">
                          <span class="icon-shopping_cart"></span>{{(Auth::user()->name) }}
                          {{-- [{{ Auth::check() ? auth()->user()->cartItems->count() : 0 }}] --}}
                      </a>
                  </li>							
                  @else
                  <li class="nav-item cta cta-colored"><a href="/login" class="nav-link"><span class="icon-shopping_cart"></span>LOGIN[0]</a></li>
                  @endif
            </ul>
        </div>
     </div>  
 </div>
</nav>
