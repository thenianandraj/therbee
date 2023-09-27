@include('Frontend.partials.app')
<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center mb-3 pb-3">
			<div class="col-md-12 heading-section text-center ftco-animate">
				<span class="subheading">Featured Products</span>
				<h2 class="mb-4">Our Products</h2>
				<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			@foreach ($product as $dashboard)
			<div class="col-md-3 product">
				<a href='/product-single/{{$dashboard->id}}' class="img-prod"><img class="img-fluid"
						src="../{{ $dashboard->image }}" alt="Colorlib Template">
					<span class="status">30%</span>
					<div class="overlay"></div>
				</a>
				<div class="text py-3 pb-4 px-3 text-center">
					<h3><a href="#">{{ $dashboard->product_name }}</a></h3>
					<div class="d-flex">
						<div class="pricing">
							<p class="price"><span class="mr-2 price-dc">{{ $dashboard->original_rate }}</span><span
									class="price-sale">{{ $dashboard->discount_rate }}</span></p>
						</div>
					</div>
					<div class="bottom-area d-flex px-3">
						<div class="m-auto d-flex">
							<a href="#"
								class="add-to-cart d-flex justify-content-center align-items-center text-center">
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

<section class="ftco-section img" style="background-image: url(images/bg_3.jpg);">
	<div class="container">
		<div class="row justify-content-end">
			<div class="col-md-6 heading-section ftco-animate deal-of-the-day ftco-animate">
				<span class="subheading">Best Price For You</span>
				<h2 class="mb-4">Deal of the day</h2>
				<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
				<h3><a href="#">Spinach</a></h3>
				<span class="price">$10 <a href="#">now $5 only</a></span>
				<div id="timer" class="d-flex mt-5">
					<div class="time" id="days"></div>
					<div class="time pl-3" id="hours"></div>
					<div class="time pl-3" id="minutes"></div>
					<div class="time pl-3" id="seconds"></div>
				</div>
			</div>
		</div>
	</div>
</section>

<hr>

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
@include('Frontend.partials.footer')