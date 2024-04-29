@extends('user.layout.master')
@section('content')
@section('commander', 'active')
@section('title', 'Commanders')
<div class="container-xxl flex-grow-1 container-p-y">
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="row">
        <div class="card">
            <h5 class="card-header row">
                <div class="col-md-10">
                    Tour Commander
                </div>
                <div class="col-md-2">
                    <a class="btn btn-primary" href=" {{ route('admin.add.commander') }} ">Add Commander</a>
                </div>
            </h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover" id="table">
                    <thead>
                        <tr>
                            <th>S:no</th>
                            <th>Tour Commander</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($commanders as $commander)
                            <tr>
                                <td>{{ $commander->id }}</td>
                                <td>{{ $commander->name }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a class="btn btn-primary"
                                                href="{{ route('admin.edit.commander', ['id' => $commander->id]) }}">
                                                Edit Commander
                                            </a>
                                        </div>
                                        <div class="col-md-6">
                                            <a class="btn btn-danger"
                                                href="{{ route('admin.delete.commander', ['id' => $commander->id]) }}">
                                                Delete Commander
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
