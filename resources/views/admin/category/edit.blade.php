<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Category
            <b style="float:right" >Total Users
                <span class="badge bg-danger"> </span>
            </b>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Edit Category</div>
                        <div class="card-body">
                            <form method="post" action="{{route('update.category', $category->id)}}">
                                @csrf

                                <div class="mb-3">
                                    <label for="Category_name" class="form-label">Category Name</label>
                                    <input type="text" name="Category_name" value="{{$category->category_name}}" class="form-control @error('Category_name') is-invalid @enderror" id="Category_name" aria-describedby="emailHelp">
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
    </x-app-layout>