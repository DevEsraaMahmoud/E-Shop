@extends('layouts.master_home')
@section('home_content')

    <div class="shop-items">
        <div class="container-fluid">
            <div class="section-title">
                <h2>Our Products</strong></h2>
            </div>
            <div class="row">

                @foreach($products as $product)
                <div class="col-md-3 col-sm-6">
                    <!-- Restaurant Item -->
                    <div class="item">
                        <!-- Item's image -->
                        <img class="img-responsive" src="{{$product->product_image}}" alt="">
                        <!-- Item details -->
                        <div class="item-dtls">
                            <!-- product title -->
                            <h4><a href="#">{{$product->product_name}}</a></h4>
                            <!-- price -->
                            <span class="price lblue">{{$product->product_price}}</span>
                        </div>
                        <!-- add to cart btn -->
                        <div class="ecom bg-lblue">
                            <a class="btn" href="{{route('addProduct', $product->id)}}">Add to cart</a>
                        </div>
                    </div>
                </div>
               @endforeach
            </div>
        </div>
    </div>
@endsection