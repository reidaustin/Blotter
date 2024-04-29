@extends('admin.layout.master')
@section('content')
@section('user', 'active')
@section('title', 'User')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.update.user') }}" method="post" class="row">
                        @csrf
                        <input type="hidden" name="id" value={{ $user->id }}>

                        <div class="fomr-group col-md-4">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="{{$user->name}}" />
                            <span class="text-danger">{{ $errors->first('name') }}</span>

                        </div>
                       
                        <div class="fomr-group col-md-4">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="{{$user->email}}" />
                            <span class="text-danger">{{ $errors->first('email') }}</span>

                        </div>
                       
                        <div class="fomr-group col-md-6">
                            <br />
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection