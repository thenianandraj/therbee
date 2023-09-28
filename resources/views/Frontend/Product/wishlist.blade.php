@include('Frontend.partials.app')
    <!-- END nav -->

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpeg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Wishlist</span></p>
            <h1 class="mb-0 bread">My Wishlist</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>#</th>
								<th>Images</th>
						        <th>Product List</th>
						        <th>Price</th>
						        <th>Discount Price</th>
						      </tr>
						    </thead>
						    <tbody>
							@if ($wishlistItems)
							 @foreach ($wishlistItems as $item)
						      <tr class="text-center">
						        <td class="product-remove"><a href="/remove-wishlist/{{$item->id}}"><span class="ion-ios-close"></span></a></td>
						        
								<td class="image-prod">
									<div class="img" style="background-image: url('{{ $item->product->image }}');"></div>
								</td>
						        
						        <td class="product-name">
						        	<h3>{{ $item->product->product_name }}</h3>
						        	<p>{{ $item->product->description }}</p>
						        </td>
						        
						        <td class="price">${{ $item->product->original_rate }}</td>
						        
						        <td class="total">${{ $item->product->discount_rate}}</td>
						      </tr><!-- END TR-->
							 @endforeach
							@else
							<tr>
								<td colspan="6">No items in wishlist.</td>
							</tr>
						    @endif
						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>
			</div>
		</section>

	
    
  

  


  <script>
		$(document).ready(function(){

		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){
		        
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		            
		            $('#quantity').val(quantity + 1);

		          
		            // Increment
		        
		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		      
		            // Increment
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
		            }
		    });
		    
		});
	</script>
    

  <style>
	.product-image {
    width: 50px; 
    height: 50px;
	}
  </style>

@include('Frontend.partials.footer')