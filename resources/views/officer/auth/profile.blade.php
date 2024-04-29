@extends('officer.layout.master')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="card">
            <h5 class="card-header">Profile</h5>
            <div class="card-body">
                <form class="row">
                    <div class="form-group col-md-4">
                        <label class="">Name</label>
                        <input type="text" class="form-control" name="name" />
                    </div>
                    <div class="form-group col-md-4">
                        <label class="">Email</label>
                        <input type="email" class="form-control" name="email" />
                    </div>
                    <div class="form-group col-md-4">
                        <label class="">image</label>
                        <input type="file" class="form-control" name="image" />
                    </div>
                    <div class="form-group col-md-12">
                        <br />
                    </div>
                    <div class="form-group offset-md-10 col-md-2 col-sm-12">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
