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
                        <div class="card-header">All Sliders</div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Title</th>
                                <th scope="col">description</th>
                                <th scope="col">image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sliders as $slider)
                                <tr>
                                    <th scope="row">{{$slider->id}}</th>
                                    <th scope="row">{{$slider->title}}</th>
                                    <th scope="row">{{$slider->description}}</th>
                                    <th scope="row"><img src="{{asset($slider->image)}} " style="height: 50px; width: 50px;"></th>
                                    <td>
                                        <a href="{{route('edit.slider', $slider->id)}}" class="btn btn-info">Edit</a>
                                        <a href="{{route('destroy.slider', $slider->id)}}" class="btn btn-danger">Delete</a>
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
                        <div class="card-header">Add Slider</div>
                        <div class="card-body">
                            <form method="post" action="{{route('add.slider')}}"  enctype="multipart/form-data"
                            >
                                @csrf
                                <div class="mb-3">
                                    <label for="title" class="form-label">Slider Title</label>
                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" aria-describedby="emailHelp">
                                    @error('title')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="description" aria-describedby="emailHelp">
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
                                <button type="submit" class="btn btn-primary">Add slider</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
