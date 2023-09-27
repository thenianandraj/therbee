@include('Frontend.partials.app')
<!----------------------------------------------Main-content---------------------------------------------->
@include('Frontend.partials.second_header')

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
                    <a href="/category_single{{$category->name}}" class="img-prod">
                        <img class="img-fluid" src="{{ asset($category->image) }}" alt="Category Image" style="border: none;">
                    </a>
                    <div class="text py-3 pb-4 px-3 text-center">
                        <h3 class="text-h3">{{ $category->name }}</h3>
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
                            <a href="/product_single{{$product->id}}" class="img-prod"><img class="img-fluid" src="{{asset($product->image)}}" alt="Colorlib Template">
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
                                        <a href="" class="heart d-flex justify-content-center align-items-center" data-product-id="{{ $product->id }}" >
                                            <span><i class="ion-ios-heart"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="add-to-cart-button text-center mt-2">
                                <form action="/add_cart" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="hidden" value="{{ $product->product_name }}" name="name">
                                    <input type="hidden" value="{{ $product->discount_Rate}}" name="price">
                                    <input type="hidden" value="1" name="quantity">
                                <button  class="btn btn-hotpink">Add to Cart</button>
                            </form>
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


@include('Frontend.partials.second_footer')

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
<script>
    $(document).ready(function () {
        $('.heart').click(function (event) {
            event.preventDefault();
            if (!{{ Auth::check() ? 'true' : 'false' }}) {
            window.location.href = '/login';
             } else {

            var productId = $(this).data('product-id');
            var url = "{{ route('wishlist.add', ':id') }}";
            url = url.replace(':id', productId);
             }
            $.ajax({
                url: url,
                type: 'GET',
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
                success: function (response) {
                    console.log(response.message);
                },
                error: function (error) {
                    console.error(error.responseJSON.error);
                }
            });
        });
    });
</script>



@include('Frontend.partials.footer')



