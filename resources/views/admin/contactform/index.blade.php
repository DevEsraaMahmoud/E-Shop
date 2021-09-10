@extends('admin.admin_master')
@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if(session('success'))
                        <div class="alert alert-primary alert-dismissible" role="alert" id="liveAlert">
                            <strong>{{session('success')}}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">All Messages</div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Subject</th>
                                <th scope="col">Message</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($messages as $message)
                                <tr>
                                    <th scope="row">{{$message->id}}</th>
                                    <th scope="row">{{$message->name}}</th>
                                    <th scope="row">{{$message->email}}</th>
                                    <th scope="row">{{$message->subject}}</th>
                                    <th scope="row">{{$message->message}}</th>

                                    <td>
                                        <a href="{{route('destroy.message', $message->id)}}" class="btn btn-danger">Delete</a>
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
