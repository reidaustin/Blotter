@extends('user.layout.master')
@section('content')
@section('supervisor', 'active')
@section('title', 'Supervisor')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.update.supervisor') }}" method="post" class="row">
                        @csrf
                        <input type="hidden" name="id" value="{{ $supervisor->id }}">
                        <div class="fomr-group col-md-6">
                            <label>Supervisor</label>
                            <input type="text" class="form-control" name="name" value="{{ $supervisor->name }}" />
                            <span class="text-danger">{{ $errors->first('name') }}</span>

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
