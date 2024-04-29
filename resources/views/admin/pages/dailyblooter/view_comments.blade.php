@extends('admin.layout.master')
@section('content')
@section('blotter', 'active')
@section('title', 'Blotters')
<div class="container-xxl flex-grow-1 container-p-y">
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="row">
        <div class="card">
            <h5 class="card-header row">
                <div class="col-md-3">
                    Daily Blotter Comments
                </div>
                <div class="col-md-3">
                    {{-- Tour : {{ $tour->tour_name }} --}}
                </div>
                <div class="col-md-4">
                    <!-- Button trigger modal -->
                    {{-- <form action="{{ route('admin.blotter.pdf') }}" method="post" target="_blank">
                        @csrf
                        <input type="hidden" name="tour_id" value="{{ $tour->id }}">
                        <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Print
                        </button>
                    </form> --}}
                </div>
                {{-- <div class="col-md-2">
                    <a class="btn btn-primary" href="{{ route('admin.add.blotter', ['id' => $tour->id]) }}">Add
                        Blotter</a>
                </div> --}}
            </h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover w-100" id="table">
                    <thead>
                        <tr>
                            <th>S:no</th>
                            <th>Comment</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach($blotter_comments->comments as $blotter_comment)
                            <tr>
                                <td>{{$blotter_comment->id}}</td>

                                <td>{{$blotter_comment->comment}}</td>
                            </tr>
                        @endforeach
            </div>
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

        $(".comment").on("click", function(){
        var dataId = $(this).attr("data-id");
        $(".blotter").val(dataId);
        //alert("The data-id of clicked item is: " + dataId);
    });

    $(".view_comment").on("click", function(){
        var dataId = $(this).attr("data-id");
        $(".blotter").val(dataId);
        //alert("The data-id of clicked item is: " + dataId);
    });
    });
</script>
@endpush
