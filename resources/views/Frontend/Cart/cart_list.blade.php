@include('Frontend.partials.app')


<div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpeg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
                <h1 class="mb-0 bread">My Cart</h1>
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
                                <th>OrderId</th>
                                <th>Images</th>
                                <th>Product name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Update</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          <input type="hidden" value="{{$temp=0}}">
                          <input type="hidden" value="{{$a=0}}">
                            @foreach($users as $users)
                                <tr class="text-center">
                                    <td> ORD-ID-{{ $users->id }}</td>
                                    <td class="image-prod">
                                        <div class="img" style="background-image:url('{{ $users->image }}');"></div>
                                    </td>
                                    <td class="product-name">
                                        <h3>{{ $users->product_name }}</h3>
                                        <p>{{ $users->description }}</p>
                                    </td>
                                    <td class="price">₹{{ $users->discount_rate }}</td>
                                    <td class="quantity">
                                        <div class="input-group mb-3">
                                            <input type="number" name="quantity"
                                                class="quantity form-control input-number" value="{{ $users->qty }}"
                                                min="1" max="100">
                                        </div>
                                        <a href="/update_cart/{{ $users->id }}/plus"><span
                                                class="ion-ios-add-circle"></span></a>
                                        <a href="/update_cart/{{ $users->id }}/minus"><span
                                                class="ion-ios-remove-circle"></span></a>
                                    </td>
                                    </td>
                                    <input type="hidden"
                                        value="{{ $subtotal=$users->discount_rate * $users->qty }}">
                                    <td class="total">₹{{ $subtotal }}</td>
                                    <td class="product-remove"><a href="/update_cart/{{ $users->id }}"><span
                                                class="ion-ios-open"></span></a></td>

                                    <td class="product-remove"><a href="/remove_cart/{{ $users->id }}"><span
                                                class="ion-ios-close"></span></a></td>
                                </tr><!-- END TR-->
                                <input type="hidden" value="{{$a=$a+$subtotal}}">
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row justify-content-end">
            {{-- <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                  <div class="cart-total mb-3">
                      <h3>Coupon Code</h3>
                      <p>Enter your coupon code if you have one</p>
                        <form action="#" class="info">
                <div class="form-group">
                    <label for="">Coupon code</label>
                  <input type="text" class="form-control text-left px-3" placeholder="">
                </div>
              </form>
                  </div>
                  <p><a href="checkout.html" class="btn btn-primary py-3 px-4">Apply Coupon</a></p>
              </div> --}}
            <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                <div class="cart-total mb-3">
                    <h3>Delivery Details</h3>
                    {{-- <p>Enter your destination to get a shipping estimate</p> --}}
                    <form action="#" class="info">
                        <div class="form-group">
                            <label for="">Full Name</label>
                            <input type="text" class="form-control text-left px-3" placeholder="">
                        </div>
                        <div class="form-group">
                          <label for="country">Mobile Number</label>
                          <input type="text" class="form-control text-left px-3" placeholder="">
                      </div>
                      <div class="form-group">
                        <label for="country">Address</label>
                        <input type="text" class="form-control text-left px-3" placeholder="">
                      </div>
                        <div class="form-group">
                            <label for="country">Landmark</label>
                            <input type="text" class="form-control text-left px-3" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="country">Zip/Postal Code</label>
                            <input type="text" class="form-control text-left px-3" placeholder="">
                        </div>
                       <input type="checkbox" value="1" id="" name="is_default">&nbsp;Make this my default address
                    <input type="submit" class="btn btn-primary py-3 px-4" value="Use This Address">
                  </form>
                </div>
            </div>
            <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                <div class="cart-total mb-3">
                    <h3>Cart Totals</h3>
                    <p class="d-flex">
                        <span>Subtotal</span>
                        <span>₹{{$a}}</span>
                    </p>
                    <p class="d-flex">
                        <span>Delivery</span>
                        <span>$0.00</span>
                    </p>
                    <p class="d-flex">
                        <span>Discount</span>
                        <span>$3.00</span>
                    </p>
                    <hr>
                    <p class="d-flex total-price">
                      <input type="text" value="{{$a}}.00" name="amount" readonly="readonly"
                      class="form-control text-left px-3">
                    </p>   
                    <input type="submit" class="btn btn-primary py-3 px-4" value="Proceed to Checkout">
                </div>
            </div>
        </div>
    </div>
</section>



@include('Frontend.partials.footer')