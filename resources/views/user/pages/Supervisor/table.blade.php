@extends('user.layout.master')
@section('content')
@section('supervisor', 'active')
@section('title', 'Supervisors')
<div class="container-xxl flex-grow-1 container-p-y">
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="row">
        <div class="card">
            <h5 class="card-header row">
                <div class="col-md-10">
                    Supervisor
                </div>
                <div class="col-md-2">
                    <a class="btn btn-primary" href="{{ route('admin.add.supervisor') }}">Add Supervisor</a>
                </div>
            </h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover" id="table">
                    <thead>
                        <tr>
                            <th>S:no</th>
                            <th>Supervisor</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($supervisors as $supervisor)
                            <tr>
                                <td>{{ $supervisor->id }}</td>
                                <td>{{ $supervisor->name }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a class="btn btn-primary"
                                                href="{{ route('admin.edit.supervisor', ['id' => $supervisor->id]) }}">
                                                Edit Supervisor
                                            </a>
                                        </div>
                                        <div class="col-md-6">
                                            <a class="btn btn-danger"
                                                href="{{ route('admin.delete.supervisor', ['id' => $supervisor->id]) }}">
                                                Delete Supervisor
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
        $('#table').DataTable();
    });
</script>
@endpush
