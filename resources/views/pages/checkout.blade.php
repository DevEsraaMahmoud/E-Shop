@extends('layouts.master_home')
@section('home_content')

    <main class="page">
    <section class="shopping-cart dark">
        <div class="container">
            <div class="block-heading">
                <h2>Shopping Cart</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo.</p>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-12 col-lg-8">
                        <div class="items">
                            <div class="product">
                                <div class="row">
                                    <div class="col-md-3">
                                        <img class="img-fluid mx-auto d-block image" src="{{$product->product_image}}">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="info">
                                            <div class="row">
                                                <div class="col-md-5 product-name">
                                                    <div class="product-name">
                                                        <a href="#">{{$product->product_name}}</a>
                                                                                                           </div>
                                                </div>
                                                <div class="col-md-4 quantity">
                                                    <label for="quantity">Quantity:</label>
                                                    <input id="quantity" type="number" value ="1" class="form-control quantity-input">
                                                </div>
                                                <div class="col-md-3 price">
                                                    <span>{{$product->product_price}}L.E</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <div class="summary">
                            <h3>Summary</h3>
                            <div class="summary-item"><span class="text">Subtotal</span><span class="price">$360</span></div>
                            <div class="summary-item"><span class="text">Discount</span><span class="price">$0</span></div>
                            <div class="summary-item"><span class="text">Shipping</span><span class="price">$0</span></div>
                            <div class="summary-item"><span class="text">Total</span><span class="price">$360</span></div>
                            <button type="button" class="btn btn-primary btn-lg btn-block">Checkout</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection