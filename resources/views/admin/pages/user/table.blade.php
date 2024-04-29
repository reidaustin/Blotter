@extends('admin.layout.master')
@section('content')
@section('user', 'active')
@section('title', 'Users')
    <div class="container-xxl flex-grow-1 container-p-y">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="row">
            <div class="card">
                <h5 class="card-header row">
                    <div class="col-md-10">
                        User
                    </div>
                    <div class="col-md-2">
                        <a class="btn btn-primary" href="{{ route('admin.add.user') }}">Add User</a>
                    </div>
                </h5>
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover w-100" id="table">
                        <thead>
                            <tr>
                                <th>S:no</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <a href="{{route('admin.edit.user',['id'=>$user->id])}}" class="btn btn-primary">Edit User</a>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="{{route('admin.delete.user',['id'=>$user->id])}}" class="btn btn-primary">Delete User</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                "scrollX": true

            });
        });
    </script>
@endpush
