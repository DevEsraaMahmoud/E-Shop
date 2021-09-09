@extends('admin.admin_master')
@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    @if(session('success'))
                        <div class="alert alert-primary alert-dismissible" role="alert" id="liveAlert">
                            <strong>{{session('success')}}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">All Brands</div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Brand Name</th>
                                <th scope="col">Brand Image</th>
                                <th scope="col">Created at</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($brands as $brand)
                                <tr>
                                    <th scope="row">{{$brand->id}}</th>
                                    <th scope="row">{{$brand->brand_name}}</th>
                                    <th scope="row"><img src="{{asset($brand->brand_image)}} " style="height: 50px; width: 50px;"></th>
                                    <td>{{$brand->created_at->diffForHumans()}}</td>
                                    <td>
                                        <a href="{{route('edit.brand', $brand->id)}}" class="btn btn-info">Edit</a>
                                        <a href="{{route('destroy.brand', $brand->id)}}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
{{--
                        {{$brands->links()}}
--}}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Add Brand</div>
                        <div class="card-body">
                            <form method="post" action="{{route('store.brand')}}"  enctype="multipart/form-data"
                            >
                                @csrf
                                <div class="mb-3">
                                    <label for="brand_name" class="form-label">Brand Name</label>
                                    <input type="text" name="brand_name" class="form-control @error('brand_name') is-invalid @enderror" id="Category_name" aria-describedby="emailHelp">
                                    @error('brand_name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="brand_image" class="form-label">Brand Image</label>
                                    <input type="file" name="brand_image" class="form-control @error('brand_image') is-invalid @enderror" id="Category_name" aria-describedby="emailHelp">
                                    @error('brand_image')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Add Brand</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
