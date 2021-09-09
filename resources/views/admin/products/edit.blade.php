@extends('admin.admin_master')
@section('admin')
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        @if(session('success'))
                            <div class="alert alert-primary alert-dismissible" role="alert" id="liveAlert">
                                <strong>{{session('success')}}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="card-header">Add product</div>
                        <div class="card-body">
                            <form method="post" action="{{route('update.products', $product->id)}}"  enctype="multipart/form-data"
                            >
                                @csrf
                                <input type="hidden" name="old_image" value="{{$product->product_image}}">

                                <div class="mb-3">
                                    <label for="product_name" class="form-label">product Name</label>
                                    <input type="text" value="{{$product->product_name}}" name="product_name" class="form-control @error('product_name') is-invalid @enderror" id="product_name" aria-describedby="emailHelp">
                                    @error('product_name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="product_price" class="form-label">product Price</label>
                                    <input type="text"  value="{{$product->product_price}}" name="product_price" class="form-control @error('product_price') is-invalid @enderror" id="product_price" aria-describedby="emailHelp">
                                    @error('product_price')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="quantity" class="form-label">quantity</label>
                                    <input type="text" value="{{$product->quantity}}" name="quantity" class="form-control @error('quantity') is-invalid @enderror" id="quantity" aria-describedby="emailHelp">
                                    @error('quantity')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="category" class="form-label">category</label>
                                    <select name="category">
                                        <option>{{$product->category->category_name}}</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="product_image" class="form-label">product Image</label>
                                    <input type="file" name="product_image" class="form-control @error('product_image') is-invalid @enderror" id="Category_name" aria-describedby="emailHelp">
                                    @error('product_image')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Add product</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection