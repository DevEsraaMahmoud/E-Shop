@extends('admin.admin_master')
@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Edit slider</div>
                        <div class="card-body">
                            <form method="post" action="{{route('update.slider', $slider->id)}}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="old_image" value="{{$slider->image}}">
                                <div class="mb-3">
                                    <label for="slider_name" class="form-label">slider Title</label>
                                    <input type="text" name="title" value="{{$slider->title}}" class="form-control @error('title') is-invalid @enderror" id="title" aria-describedby="emailHelp">
                                    @error('title')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">slider Name</label>
                                    <input type="text" name="description" value="{{$slider->description}}" class="form-control @error('description') is-invalid @enderror" id="description" aria-describedby="emailHelp">
                                    @error('description')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">slider Image</label>
                                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image" aria-describedby="emailHelp">
                                    @error('image')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <img src="{{asset($slider->image)}} " style="height: 200px; width: 400px">
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