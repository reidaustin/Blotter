@extends('user.layout.master')
@section('content')
@section('commander', 'active')
@section('title', 'Commander')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.store.commander') }}" method="post" class="row">
                        @csrf
                        <div class="fomr-group col-md-6">
                            <label>Tour Commander</label>
                            <input type="text" class="form-control" name="name" />
                            <span class="text-danger">{{ $errors->first('name') }}</span>

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
