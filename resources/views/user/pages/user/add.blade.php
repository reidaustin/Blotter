@extends('user.layout.master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <form class="row">
                        <div class="fomr-group col-md-4">
                            <label>First Name</label>
                            <input type="text" class="form-control" name="name" />
                        </div>
                        <div class="fomr-group col-md-4">
                            <label>Last Name</label>
                            <input type="text" class="form-control" name="name" />
                        </div>
                        <div class="fomr-group col-md-4">
                            <label>Email</label>
                            <input type="email" class="form-control" name="name" />
                        </div>
                        <div class="fomr-group col-md-4">
                            <label>Password</label>
                            <input type="password" class="form-control" name="name" />
                        </div>
                        <div class="fomr-group col-md-6">
                            <br />
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
