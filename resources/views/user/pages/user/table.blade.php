@extends('user.layout.master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="card">
                <h5 class="card-header row">
                    <div class="col-md-10">
                        User
                    </div>
                    <div class="col-md-2">
                        <a class="btn btn-primary" href="/admin/user/add">Add User</a>
                    </div>
                </h5>
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover w-100" id="table">
                        <thead>
                            <tr>
                                <th>S:no</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <a href="/admin/user/edit" class="btn btn-primary">Edit User</a>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="/admin/user/delete" class="btn btn-primary">Delete User</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
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
