@include('header')
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
		@foreach ($product as $dashboard)
		<form action="/add-cart" method="post">
			@csrf
			<input type="hidden" name="product_id" value="{{ $dashboard->id }}">

			<div class="row">
				<div class="col-lg-6 mb-5 ftco-animate">
					<a href="/{{ $dashboard->image1 }}" class="image-popup"><img src="/{{ $dashboard->image1 }}" class="img-fluid" alt="Colorlib Template"></a><br><br>
					<a href="/{{ $dashboard->image1 }}" class="image-popup"><img src="/{{ $dashboard->image2 }}" class="img-fluid" style="height:100px;" alt="Colorlib Template"></a>
				</div>
				<div class="col-lg-6 product-details pl-md-5 ftco-animate">
					<h3>{{ $dashboard->productName }}</h3>
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

					<p class="price"><span class="mr-2 price-dc">₹{{ $dashboard->DiscountRate }}</span><span class="price-sale"><s>₹{{ $dashboard->OriginalRate }}</s></span></p>
					<p>{{ $dashboard->Description }}</p>
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
	@endforeach
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
				<a href='/product-single/{{$dashboard->id}}' class="img-prod"><img class="img-fluid" src="/{{ $dashboard->image1 }}" alt="Colorlib Template">
					<span class="status">30%</span>
					<div class="overlay"></div>
				</a>
				<div class="text py-3 pb-4 px-3 text-center">
					<h3><a href="#">{{ $dashboard->productName }}</a></h3>
					<div class="d-flex">
						<div class="pricing">
							<p class="price"><span class="mr-2 price-dc">₹{{ $dashboard->OriginalRate }}</span><span class="price-sale">{{ $dashboard->DiscountRate }}</span></p>
						</div>
					</div>
					<span class="fa fa-star checked "></span>
					<span class="fa fa-star checked "></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<span class="fa fa-star checked"></span>
					<div class="bottom-area d-flex px-3">
						<div class="m-auto d-flex">
							<a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
								<span><i class="ion-ios-menu"></i></span>
							</a>
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
		</div>
	</div>
</section>
@include('second-footer')
@include('footer')