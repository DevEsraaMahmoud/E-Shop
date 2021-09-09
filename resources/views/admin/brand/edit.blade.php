@extends('admin.admin_master')
@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Edit Brand</div>
                        <div class="card-body">
                            <form method="post" action="{{route('update.brand', $brand->id)}}" enctype="multipart/form-data">
                                @csrf
                    <input type="hidden" name="old_image" value="{{$brand->brand_image}}">
                                <div class="mb-3">
                                    <label for="brand_name" class="form-label">Brand Name</label>
                                    <input type="text" name="brand_name" value="{{$brand->brand_name}}" class="form-control @error('brand_name') is-invalid @enderror" id="brand_name" aria-describedby="emailHelp">
                                    @error('brand_name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="brand_image" class="form-label">Brand Image</label>
                                    <input type="file" name="brand_image" class="form-control @error('brand_image') is-invalid @enderror" id="brand_image" aria-describedby="emailHelp">
                                    @error('brand_image')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <img src="{{asset($brand->brand_image)}} " style="height: 200px; width: 400px">
                                </div>

                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection