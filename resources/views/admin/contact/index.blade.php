@extends('admin.admin_master')
@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">
                <a href="{{route('add.contact')}}" type="submit" class="btn btn-primary">Add Contact</a>
                <div class="col-md-12">
                    @if(session('success'))
                        <div class="alert alert-primary alert-dismissible" role="alert" id="liveAlert">
                            <strong>{{session('success')}}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">All Contact Data</div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Address</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contacts as $contact)
                                <tr>
                                    <th scope="row">{{$contact->id}}</th>
                                    <th scope="row">{{$contact->address}}</th>
                                    <th scope="row">{{$contact->email}}</th>
                                    <th scope="row">{{$contact->phone}}</th>

                                    <td>
                                        <a href="{{--{{route('edit.products', $product->id)}}--}}" class="btn btn-info">Edit</a>
                                        <a href="{{route('destroy.contact', $contact->id)}}" class="btn btn-danger">Delete</a>
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
