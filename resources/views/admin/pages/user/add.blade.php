@extends('admin.layout.master')
@section('content')
@section('user', 'active')
@section('title', 'User')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.store.user') }}" method="post" class="row">
                        @csrf
                        <div class="fomr-group col-md-4">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" />
                            <span class="text-danger">{{ $errors->first('name') }}</span>

                        </div>
                       
                        <div class="fomr-group col-md-4">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" />
                            <span class="text-danger">{{ $errors->first('email') }}</span>

                        </div>
                        <div class="fomr-group col-md-4">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" />
                            <span class="text-danger">{{ $errors->first('password') }}</span>

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
