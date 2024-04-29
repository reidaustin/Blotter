@extends('user.layout.master')
@section('content')
@section('officer', 'active')
@section('title', 'Officers')
<div class="container-xxl flex-grow-1 container-p-y">
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="row">
        <div class="card">
            <h5 class="card-header row">
                <div class="col-md-10">
                    Officer
                </div>
                <div class="col-md-2">
                    <a class="btn btn-primary" href="{{ route('admin.add.officer') }}">Add Officer</a>
                </div>
            </h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover w-100" id="table">
                    <thead>
                        <tr>
                            <th>S:no</th>
                            <th>Full Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($officers as $officer)
                            <tr>
                                <td>{{ $officer->id }}</td>
                                <td>{{ $officer->full_name }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a class="btn btn-primary"
                                                href="{{ route('admin.edit.officer', ['id' => $officer->id]) }}">
                                                Edit Officer
                                            </a>
                                        </div>
                                        <div class="col-md-6">
                                            <a class="btn btn-danger"
                                                href="{{ route('admin.delete.officer', ['id' => $officer->id]) }}">
                                                Delete Officer
                                            </a>
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
