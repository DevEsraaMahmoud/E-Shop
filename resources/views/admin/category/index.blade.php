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
                        <div class="card-header">All Category</div>
                        <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">User ID</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Created at</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <th scope="row">{{$category->id}}</th>
                            <th scope="row">{{$category->user->name}}</th>
                            <td>{{$category->category_name}}</td>
                            <td>{{$category->created_at->diffForHumans()}}</td>
                            <td>
                                <a href="{{route('edit.category', $category->id)}}" class="btn btn-info">Edit</a>
                                <a href="{{route('destroy.category', $category->id)}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                        {{$categories->links()}}
            </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Add Category</div>
                        <div class="card-body">
                        <form method="post" action="{{route('store.category')}}">
                            @csrf
                            <div class="mb-3">
                                <label for="Category_name" class="form-label">Category Name</label>
                                <input type="text" name="Category_name" class="form-control @error('Category_name') is-invalid @enderror" id="Category_name" aria-describedby="emailHelp">
                                @error('Category_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Add Category</button>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection