@include('Frontend.partials.app')

<div class="container">
    <div class="row justify-content-center mb-3 pb-3">
        <div class="col-md-12 heading-section text-center ftco-animate">
            <span class="subheading"></span>
            <h2 class="mb-4">Products Details</h2>
            <p></p>
        </div>
    </div>
</div>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading">Products</span>
                <h2 class="mb-4">Search Results</h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @if ($searchResults->isEmpty())
                <p>No matching products found.</p>
            @else
                @foreach ($searchResults as $dashboard)
                    <div class="col-md-3 product">
                        <a href='/product-single/{{$dashboard->id}}' class="img-prod">
                            <img class="img-fluid" src="/{{ $dashboard->image }}" alt="Colorlib Template">
                            <span class="status">30%</span>
                            <div class="overlay"></div>
                        </a>
                        <div class="text py-3 pb-4 px-3 text-center">
                            <h3><a href="#">{{ $dashboard->product_name }}</a></h3>
                            <div class="d-flex">
                                <div class="pricing">
                                    <p class="price">
                                        <span class="mr-2 price-dc">₹{{ $dashboard->original_rate }}</span>
                                        <span class="price-sale">{{ $dashboard->discount_rate }}</span>
                                    </p>
                                </div>
                            </div>
                            <span class="fa fa-star checked "></span>
                            <span class="fa fa-star checked "></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <div class="bottom-area d-flex px-3">
                                <div class="m-auto d-flex">
                                    <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                        <span><i class="ion-ios-cart"></i></span>
                                    </a>
                                    <a href="#" class="heart d-flex justify-content-center align-items-center ">
                                        <span><i class="ion-ios-heart"></i></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>

@include('Frontend.partials.second_footer')
@include('Frontend.partials.footer')
