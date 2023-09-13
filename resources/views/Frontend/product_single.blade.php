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
		<form action="/add-cart" method="post">
			@csrf
			<input type="hidden" name="product_id" value="{{ $product->id }}">

			<div class="row">
				<div class="col-lg-6 mb-5 ftco-animate">
					<a href="/{{ $product->image }}" class="image-popup"><img src="/{{ $product->image }}" class="img-fluid" alt="Colorlib Template"></a><br><br>
					{{-- <a href="/{{ $dashboard->image }}" class="image-popup"><img src="/{{ $dashboard->image }}" class="img-fluid" style="height:100px;" alt="Colorlib Template"></a> --}}
				</div>
				<div class="col-lg-6 product-details pl-md-5 ftco-animate">
					<h3>{{ $product->product_name }}</h3>
					<div class="rating d-flex">
						<p class="text-left mr-4">
							<a href="#" class="mr-2">5.0</a>
							<a href="#"><span class="ion-ios-star-outline"></span></a>
							<a href="#"><span class="ion-ios-star-outline"></span></a>
							<a href="#"><span class="ion-ios-star-outline"></span></a>
							<a href="#"><span class="ion-ios-star-outline"></span></a>
							<a href="#"><span class="ion-ios-star-outline"></span></a>
						</p>
						<p class="text-left mr-4">
							<a href="#" class="mr-2" style="color: #000;">100 <span style="color: #bbb;">Rating</span></a>
						</p>
						<p class="text-left">
							<a href="#" class="mr-2" style="color: #000;">500 <span style="color: #bbb;">Sold</span></a>
						</p>
					</div>

					<p class="price"><span class="mr-2 price-dc">₹{{ $product->discount_rate }}</span><span class="price-sale"><s>₹{{ $product->original_rate }}</s></span></p>
					<p>{{ $product->description }}</p>
					<div class="row mt-4">

						<div class="w-100"></div>
						<div class="input-group col-md-6 d-flex mb-3">
							<!-- <span class="input-group-btn mr-2">
							<button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
								<i class="ion-ios-remove"></i>
							</button>
						</span> -->
							<input type="number" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
							<!-- <span class="input-group-btn ml-2">
							<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
								<i class="ion-ios-add"></i>
							</button>
						</span> -->
						</div>
						<div class="w-100"></div>
						<div class="col-md-12">
							<p style="color: #000;">Available</p>
						</div>
					</div>
					<input type="submit" class="btn btn-black py-3 px-5" value="Add to Cart">

				</div>
			</div>
		</form>
	</div>

</section>

<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center mb-3 pb-3">
			<div class="col-md-12 heading-section text-center ftco-animate">
				<span class="subheading">Products</span>
				<h2 class="mb-4">Related Products</h2>
				<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			@foreach ($relatedProducts as $dashboard)
			<div class="col-md-3 product">
				<a href='/product-single{{$dashboard->id}}' class="img-prod"><img class="img-fluid" src="/{{ $dashboard->image }}" alt="product">
					<span class="status">30%</span>
					<div class="overlay"></div>
				</a>
				<div class="text py-3 pb-4 px-3 text-center">
					<h3><a href="#">{{ $dashboard->product_name }}</a></h3>
					<div class="d-flex">
						<div class="pricing">
							<p class="price"><span class="mr-2 price-dc">₹{{ $dashboard->original_rate }}</span><span class="price-sale">{{ $dashboard->discount_rate }}</span></p>
						</div>
					</div>
					<span class="fa fa-star checked "></span>
					<span class="fa fa-star checked "></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<div class="bottom-area d-flex px-3">
						<div class="m-auto d-flex">
							<a href="#" class="heart d-flex justify-content-center align-items-center ">
								<span><i class="ion-ios-heart"></i></span>
							</a>
						</div>
					</div>
					<div class="add-to-cart-button text-center mt-2">
						<button class="btn btn-hotpink">Add to Cart</button>
					</div>
				</div>
			</div>

			@endforeach
		</div>
	</div>
</section>
@include('Frontend.partials.second_footer')
@include('Frontend.partials.footer')