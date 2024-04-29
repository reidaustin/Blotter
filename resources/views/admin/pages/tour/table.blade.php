@extends('admin.layout.master')
@section('content')
@section('tour', 'active')
@section('title', 'Tours')

<div class="container-xxl flex-grow-1 container-p-y">
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="row">
        <div class="card">
            <h5 class="card-header row">
                <div class="col-md-3">
                    Tour
                </div>
                 <div class="col-md-3">
                </div>
                <div class="col-md-4">
                    <!-- Button trigger modal -->
                    <button class=" btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModaldate1">
                        Incidents Filter
                    </button>

                    <button class=" btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModaldate">
                        Statistics
                    </button>




                    {{-- <input type="text" id="abc" name='plant_id'> --}}



                </div>
                <div class="col-md-2">
                    <a class="btn btn-primary" href="{{ route('admin.add.tour') }}">Add Tour</a>
                </div>

            </h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover w-100" id="table">
                    <thead>
                        <tr>
                            <th>S:no</th>
                            <th>Date</th>
                            <th>Tour</th>
                            <th>Tour Commander</th>
                            <th>Supervisor</th>
                            <th>Weather</th>
                            <th>User Name</th>
                            <th>Blotters</th>
                            {{-- <th>Filter</th> --}}
                            {{-- <th>Statistics</th> --}}

                            {{-- <th>Road Condition</th>
                            <th>Patrolman</th>
                            <th>Radio</th>
                            <th>Post</th> --}}
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($tours as $tour)
                            <tr id="tour_id{{ $tour->id }}">
                                {{-- <td>
                                    <input type="text" class="plant" name='id[]' data-id="{{ $tour->id }}" value="{{ $tour->id }}">
                                    <input type="hidden" id="abc" name="plant_id[]" value="">

                                </td> --}}
                                <td>{{ $tour->id }}</td>
                                <td>
                                    {{ \Carbon\Carbon::parse($tour->tour_date)->format('m/d/Y') }}

                                </td>
                                <td>
                                    <a
                                        href="{{ route('admin.blotter', ['id' => $tour->id]) }}">{{ $tour->tour_name }}</a>
                                </td>
                                <td>{{ $tour->tour_commander->name }}</td>
                                <td>{{ $tour->supervisor->name }}</td>
                                <td>{{ $tour->weather }}</td>
                                @if($tour->user_name)
                                <td>{{ $tour->user_name }}</td>

                                @else
                                <td>Admin</td>
                                @endif
                                <td>{{$tour->blotter_count}}</td>
                                {{-- <td>
                                    <a class="btn btn-primary"
                                        href="{{ route('admin.edit.tour', ['id' => $tour->id]) }}">
                                        Filter
                                    </a>
                                </td> --}}


                                {{-- <td>
                                    <button data-id="{{ $tour->id }}" class="comment btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModaldate">
                                        Statistics
                                    </button>
                                </td> --}}

                                {{-- <td>{{ $tour->road_condition }}</td>
                                <td>{{ $tour->officer->full_name }}</td>
                                <td>{{ $tour->radio }}</td>
                                <td>{{ $tour->post }}</td> --}}

                                <td>
                                    @if($tour->status=='unlocked')
                                    <a class="btn btn-primary"
                                        href="{{ route('admin.edit.tour', ['id' => $tour->id]) }}">Edit Tour</a> |

                                    <button class="btn btn-danger delete" data-id="{{$tour->id}}">
                                        Delete Tour
                                    </button>

                                        <form action="{{ route('admin.locked.blotter') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $tour->id }}">
                                            <button class="btn btn-danger lock" data-id="{{$tour->id}}">Lock</button>
                                        </form>
                                        @endif

                                        @if($tour->status=='locked')

                                        <button
                                        type="submit" class="btn btn-danger" disabled>Locked</button>
                                        @endif




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

<!-- Modal Date-->
<div class="modal fade" id="exampleModaldate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Select Date</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action={{ route('admin.blotter.stat') }} method="post" class="row">
                    @csrf
                    {{-- <input type="text" name="tour_id" class="blotter"> --}}
                    {{-- <input type="text" id="abc" name='plant_id'> --}}


                    <div class="form-group col-md-12">
                        <label>From</label>
                        <input type="date" name="from" class="form-control" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Till</label>

                        <input type="date" name="till" class="form-control" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>

        </div>
    </div>
</div>
<!-- Tour Modal Date-->
<div class="modal fade" id="exampleModaldate1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Select Range</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action={{ route('admin.own.inci') }} method="post" class="row">
                    @csrf

                    {{-- <div class="form-group col-md-12">
                        <label>Tour</label>
                        <select class="form-control" name="tour_name">
                            <option>Select Tour</option>
                            @foreach($tours as $tour)
                                <option value="{{$tour->id}}">{{$tour->tour_name}}</option>
                            @endforeach
                        </select>
                    </div> --}}

                    <div class="form-group col-md-12">
                        <label>From</label>
                        <input type="date" name="from" class="form-control" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Till</label>

                        <input type="date" name="till" class="form-control" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>

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
            //var dataId = $(this).attr("data-id");
            var favorite = [];
            $.each($("input[name='id[]']:checked"), function(){
                favorite.push($(this).val());
            });
            //alert("My Plants ID are: " + favorite.join(", "));
            // $('.id[]').attr(favorite);
            console.log("favorite.toString()",favorite.toString())
            let ab = document.getElementById("abc");
            ab.value = favorite.toString()
            //$(".blotter").val(dataId);
        });
    });

    $(document).on("click",".delete",function(){
        if(confirm('do you really want to delete this tour'))
        {
          id=$(this).data("id");
            $.ajax({
                url:'delete/tour/'+id,
                type:'GET',
                data:{
                    _token:$('input[name=_token]').val()

                },
                success:function(response)
                {
                    $('#tour_id'+id).remove();
                }

            })
        }
      })

      $(document).on("click",".lock",function(){
        if(confirm('do you really want to lock this tour'))
        {
          id=$(this).data("id");
            $.ajax({
                url:'locked/blotter/'+id,
                type:'GET',
                data:{
                    _token:$('input[name=_token]').val()

                },
                success:function(response)
                {
                    //$('#tour_id'+id).remove();
                }

            })
        }
      })
</script>
@endpush
