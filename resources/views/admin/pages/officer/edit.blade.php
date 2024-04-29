@extends('admin.layout.master')
@section('content')
@section('officer', 'active')
@section('title', 'Officer')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.update.officer') }}" method="post" class="row">
                        @csrf
                        <input type="hidden" name="id" value=" {{$officer->id}} ">
                        <div class="fomr-group col-md-6">
                            <label>Full Name</label>
                            <input type="text" class="form-control" name="full_name" value=" {{$officer->full_name}} " />
                            <span class="text-danger">{{ $errors->first('full_name') }}</span>

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
