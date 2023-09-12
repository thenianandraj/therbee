@include('Frontend.partials.app')
<!----------------------------------------------Main-content---------------------------------------------->
<section id="home-section" class="hero">
    <div class="home-slider owl-carousel">
        {{-- <div class="slider-item" style="images/Beautypost.jpg max-width=100%; height=400px;">
        </div> --}}
        <img class="slider-item" src="images/Beautypost.jpg" style="max-width=100%; height=520px;">
    </div>
</section>


<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading">Featured Category</span>
                <h2 class="mb-4">Our Catgory</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($categories as $category)
            <div class="col-md-6 col-lg-3 ftco-animate">
                <div class="product">
                    <a href="#" class="img-prod">
                        <img class="img-fluid" src="{{ asset($category->image) }}" alt="Category Image" style="border: none;">
                    </a>
                    <div class="text py-3 pb-4 px-3 text-center">
                        <h3 class="bold-category-name">{{ $category->name }}</h3>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading">Featured Products</span>
                <h2 class="mb-4">Our Products</h2>
                <div class="featured__controls">
                    <ul>
                        <li class="active" data-category="*">All</li>
                        @foreach ($categories as $category)
                            <li data-category="{{ strtolower(str_replace(' ', '-', $category->name)) }}">{{ $category->name }}</li>
                        @endforeach
                    </ul>
                </div>
                
                
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($products as $product)
                @if($product->add_product == '1')
                    <div class="col-md-6 col-lg-3 ftco-animate">
                        <div class="product {{ strtolower(str_replace(' ', '-', $product->category)) }}">
                            <a href="#" class="img-prod"><img class="img-fluid" src="{{asset($product->image)}}" alt="Colorlib Template">
                                <span class="status">30%</span>
                                <div class="overlay"></div>
                            </a>
                            <div class="text py-3 pb-4 px-3 text-center">
                                <h3><a href="#">{{$product->product_name}}</a></h3>
                                <div class="d-flex">
                                    <div class="pricing">
                                        <p class="price"><span class="mr-2 price-dc">₹{{$product->original_rate}}</span><span class="price-sale">₹{{$product->discount_rate}}</span></p>
                                    </div>
                                </div>
                                <div class="bottom-area d-flex px-3">
                                    <div class="m-auto d-flex">
                                        <a href="#" class="heart d-flex justify-content-center align-items-center" >
                                            <span><i class="ion-ios-heart"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="add-to-cart-button text-center mt-2">
                                <button class="btn btn-hotpink">Add to Cart</button>
                            </div>
                            <br>
                        </div>
                    </div>
                    <br>
                @endif
            @endforeach
        </div>
    </div>
</section>


<section class="ftco-section img">
    <img class="img-prod" src="/images/Organicpost.jpg" alt="image" style="width:100%;height: 510px;">
   
</section>
<br>


<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
    <div class="container py-4">
        <div class="row d-flex justify-content-center py-5">
            <div class="col-md-6">
                <h2 style="font-size: 22px;" class="mb-0">Subcribe to our Newsletter</h2>
                <span>Get e-mail updates about our latest shops and special offers</span>
            </div>
            <div class="col-md-6 d-flex align-items-center">
                <form action="#" class="subscribe-form">
                    <div class="form-group d-flex">
                        <input type="text" class="form-control" placeholder="Enter email address">
                        <input type="submit" value="Subscribe" class="submit px-3">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!----------------------------------------------Main-content---------------------------------------------->
<!-- Add jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    var selectedCategory = '*';
    $('.product').show();

    $('.featured__controls ul li').on('click', function () {
        $('.featured__controls ul li').removeClass('active');
        $(this).addClass('active');

        var category = $(this).attr('data-category');
 
        if (category === '*') { 
            $('.product').show();
        } else {
            console.log('Hiding all products'); 
            $('.product').hide();

            $('.' + category).show();
        }
        selectedCategory = category;
    });
});
</script>

@include('Frontend.partials.footer')



