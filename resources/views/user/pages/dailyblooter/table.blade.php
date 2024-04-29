@extends('user.layout.master')
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
                    Daily Blotter
                </div>
                <div class="col-md-3">
                    Tour : {{ $tour->tour_name }}
                    <br>
                    Date : {{ $tour->tour_date }}
                </div>
                <div class="col-md-4">
                    <!-- Button trigger modal -->
                    <form action="{{ route('blotter.pdf') }}" method="post" target="_blank">
                        @csrf
                        <input type="hidden" name="tour_id" value="{{ $tour->id }}">
                        <button type="submit" class="btn btn-primary">
                            Print
                        </button>
                    </form>
                </div>
                <div class="col-md-2">
                    @if ($tour->status == 'unlocked')
                        <a class="btn btn-primary" href="{{ route('add.blotter', ['id' => $tour->id]) }}">Add
                            Incident
                        </a>
                    @endif
                </div>
            </h5>
            <div class="table-responsive">
                <table class="table table-hover w-100" id="table">
                    <thead>
                        <tr>
                            {{-- <th>S:no</th> --}}
                            <th>Officer</th>
                            <th>Time</th>
                            <th>Comment</th>
                            {{-- <th>Officer</th> --}}
                            <th>Job Final</th>
                            {{-- <th>Crime</th> --}}
                            <th>PDF</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($blotters as $blotter)
                            @php
                                $data = [];
                                if (!empty($blotter)) {
                                    if (!empty($blotter->officer_id)) {
                                        $data = json_decode($blotter->officer_id);
                                    }
                                }
                            @endphp

                            @php
                                $tag = [];
                                $tag = json_decode($blotter->officer_id);
                                // echo $tag;
                            @endphp
                            <tr>
                                <td>{{implode(",", $tag) }}</td>
                                {{-- <td>{{ $blotter->entry_number }}</td> --}}
                                <td>{{ $blotter->time }}</td>
                                <td>
                                    <p style="width : 300px">{{ $blotter->comment }}</p>
                                </td>
                                {{-- <td>{{ $blotter->officers->full_name }}</td> --}}
                                <td>{{ $blotter->job->name }}</td>
                                {{-- <td>{{ $blotter->crime->name }}</td> --}}
                                <td>
                                    <a href="{{ route('single.pdf', ['id' => $blotter->id]) }}" class="btn btn-primary">
                                        Print
                                    </a>
                                </td>
                                <td>
                                    @if ($blotter->status == 'unlocked')
                                        <a href="{{ route('edit.blotter', ['id' => $blotter->id]) }}"
                                            class="btn btn-primary">Edit</a>
                                        {{--  <a href="{{ route('delete.blotter', ['id' => $blotter->id]) }}"
                                            class="btn btn-danger">Delete
                                        </a> |  --}}
                                        {{-- <form action="{{ route('admin.locked.blotter') }}" method="post"> @csrf
                                            <input type="hidden" name="id" value="{{ $blotter->id }}"> <button
                                                type="submit" class="btn btn-danger">Lock</button>
                                        </form> --}}
                                    @endif
                                    @if ($blotter->status == 'locked')
                                        <a href="{{ route('onlyview.blotter', ['id' => $blotter->id]) }}"
                                            class="btn btn-primary">View</a> |
                                        <button data-id="{{ $blotter->id }}" class="comment btn btn-primary"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal">Comment</button> |
                                        <a href="{{ route('view.comment', ['id' => $blotter->id]) }}"
                                            class="view_comment btn btn-primary" target="_blank">View Comment</a>
                                    @endif
                                </td>
                            </tr>
            </div>
            @endforeach
            </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Comments</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action={{ route('blotter.comment') }} method="post" class="row">
                    @csrf
                    <input type="hidden" name="blotter_id" class="blotter">
                    <label>Comment</label>

                    <div class="form-group col-md-12">
                        <textarea class="form-control" name="comment" placeholder="Please Add Comment" row="6"></textarea>
                    </div>

                    <label>Time Stamp</label>

                    <div class="form-group col-md-12">
                        <input type="time" class="form-control" name="time" placeholder="Please Add Time">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>

        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="view" tabindex="-1" aria-labelledby="views" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="views">Comments</h5>
                <input type="text" name="blotter_id" class="blotter">
                {{-- {{dd($blotter_comments)}} --}}

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul class="row">
                    @foreach ($blotter_comments as $blotter_comment)
                        @foreach ($blotter_comment->comments as $comm)
                            {{-- {{dd($blotter_comment->comments->comment)}} --}}
                            <li>{{ $comm->comment }}</li>
                        @endforeach
                    @endforeach

                </ul>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
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

        $(".comment").on("click", function() {
            var dataId = $(this).attr("data-id");
            $(".blotter").val(dataId);
            //alert("The data-id of clicked item is: " + dataId);
        });

        $(".view_comment").on("click", function() {
            var dataId = $(this).attr("data-id");
            $(".blotter").val(dataId);
            //alert("The data-id of clicked item is: " + dataId);
        });
    });
</script>
@endpush
