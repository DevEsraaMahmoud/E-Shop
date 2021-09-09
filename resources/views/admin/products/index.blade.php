@extends('admin.admin_master')
@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">
                <a href="{{route('add.products')}}" type="submit" class="btn btn-primary">Add product</a>
                <div class="col-md-12">
                    @if(session('success'))
                        <div class="alert alert-primary alert-dismissible" role="alert" id="liveAlert">
                            <strong>{{session('success')}}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">All products</div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">product Name</th>
                                <th scope="col">product price</th>
                                <th scope="col">Category</th>
                                <th scope="col">quantity</th>
                                <th scope="col">product Image</th>
                                <th scope="col">Created at</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <th scope="row">{{$product->id}}</th>
                                    <th scope="row">{{$product->product_name}}</th>
                                    <th scope="row">{{$product->product_price}}</th>
                                    <th scope="row">{{$product->category->category_name}}</th>
                                    <th scope="row">{{$product->quantity}}</th>
                                    <th scope="row"><img src="{{asset($product->product_image)}} " style="height: 50px; width: 50px;"></th>
                                    <td>{{$product->created_at->diffForHumans()}}</td>
                                    <td>
                                        <a href="{{route('edit.products', $product->id)}}" class="btn btn-info">Edit</a>
                                        <a href="{{route('destroy.product', $product->id)}}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{--
                                                {{$products->links()}}
                        --}}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
