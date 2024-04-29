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
                    Total Incidients
                </div>
                <div class="col-md-3">
                </div>
                <div class="col-md-4">
                    <!-- Button trigger modal -->
                    {{-- <button class=" btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModaldate1">
                        Tour & Incidient
                    </button>

                    <button class=" btn btn-primary">
                        Total Incidient:
                    </button> --}}


                    {{-- <input type="text" id="abc" name='plant_id'> --}}



                </div>
                <div class="col-md-2">
                    {{-- <a class="btn btn-primary" href="{{ route('admin.tour.export') }}">Export</a> --}}


                </div>

            </h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover w-100" id="table">
                    <thead>
                        <tr>
                            <th>S:no</th>
                            <th>Tour Name</th>
                            <th>MDS</th>
                            <th>ESC FL-FL</th>
                            <th>MED
                            </th>
                            <th> REST
                            </th>
                            <th> VIS ISS
                            </th>
                            <th> SP
                            </th>
                            <th> ASSAULT
                            </th>
                            <th>MTA
                            </th>
                            <th> VIS-INJ
                            </th>
                            <th>ARREST
                            </th>
                            <th> HELI
                            </th>
                            <th>CODE RED
                            </th>
                            <th> ELOPE
                            </th>
                            <th> ELEV
                            </th>
                            <th>DISCH PT
                            </th>
                            <th> EV IN
                            </th>
                            <th>EV OUT
                            </th>
                            <th> STAT
                            </th>
                            <th> OTP RUN
                            </th>
                            <th> SICK
                            </th>
                            <th>AID LE
                            </th>
                            <th> BERT
                            </th>
                            <th> DISTURB
                            </th>
                            <th>DETOX
                            </th>
                            <th> INJ
                            </th>
                            <th> DOORs
                            </th>
                            <th>10th Fl
                            </th>



                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php
                            $total_mds_count = 0;
                            $total_esc_count = 0;
                            $total_med_count = 0;
                            $total_rest_count = 0;
                            $total_vis_count = 0;
                            $total_sp_count = 0;
                            $total_assault_count = 0;
                            $total_mta_count = 0;
                            $total_vis_inj_count = 0;
                            $total_arrest_count = 0;
                            $total_heli_count = 0;
                            $total_code_red_count = 0;
                            $total_elope_count = 0;
                            $total_elev_count = 0;
                            $total_disch_count = 0;
                            $total_ev_count = 0;
                            $total_evot_count = 0;
                            $total_stat_count = 0;
                            $total_otp_count = 0;
                            $total_sick_count = 0;
                            $total_aid_count = 0;
                            $total_bert_count = 0;
                            $total_distb_count = 0;
                            $total_detox_count = 0;
                            $total_inj_count = 0;
                            $total_door_count = 0;
                            $total_fl_count = 0;

                        @endphp
                        @foreach ($tours as $tour)
                            <tr id="tour_id{{ $tour->id }}">
                                {{-- <td>
                                    <input type="text" class="plant" name='id[]' data-id="{{ $tour->id }}" value="{{ $tour->id }}">
                                    <input type="hidden" id="abc" name="plant_id[]" value="">

                                </td> --}}
                                <td>{{ $tour->id }}</td>
                                <td>{{ $tour->tour_name }}</td>
                                <td>{{ $tour->mds_count }} @php
                                    $total_mds_count += $tour->mds_count;
                                @endphp</td>
                                <td>{{ $tour->esc_count }} @php
                                    $total_esc_count += $tour->esc_count;
                                @endphp</td>
                                <td>{{ $tour->med_count }} @php
                                    $total_med_count += $tour->med_count;
                                @endphp</td>
                                <td>{{ $tour->rest_count }}
                                    @php
                                        $total_rest_count += $tour->rest_count;
                                    @endphp
                                </td>
                                <td>{{ $tour->vis_count }} @php
                                    $total_vis_count += $tour->vis_count;
                                @endphp</td>
                                <td>{{ $tour->sp_count }} @php
                                    $total_sp_count += $tour->sp_count;
                                @endphp</td>
                                <td>{{ $tour->assault_count }} @php
                                    $total_assault_count += $tour->assault_count;
                                @endphp</td>
                                <td>{{ $tour->mta_count }} @php
                                    $total_mta_count += $tour->mta_count;
                                @endphp</td>
                                <td>{{ $tour->vis_inj_count }} @php
                                    $total_vis_inj_count += $tour->vis_inj_count;
                                @endphp</td>
                                <td>{{ $tour->arrest_count }} @php
                                    $total_arrest_count += $tour->arrest_count;
                                @endphp</td>
                                <td>{{ $tour->heli_count }} @php
                                    $total_heli_count += $tour->heli_count;
                                @endphp</td>
                                <td>{{ $tour->code_red_count }} @php
                                    $total_code_red_count += $tour->code_red_count;
                                @endphp</td>
                                <td>{{ $tour->elope_count }} @php
                                    $total_elope_count += $tour->elope_count;
                                @endphp</td>
                                <td>{{ $tour->elev_count }} @php
                                    $total_elev_count += $tour->elev_count;
                                @endphp</td>
                                <td>{{ $tour->disch_count }} @php
                                    $total_disch_count += $tour->disch_count;
                                @endphp</td>
                                <td>{{ $tour->ev_count }} @php
                                    $total_ev_count += $tour->ev_count;
                                @endphp</td>
                                <td>{{ $tour->evot_count }} @php
                                    $total_evot_count += $tour->evot_count;
                                @endphp</td>
                                <td>{{ $tour->stat_count }} @php
                                    $total_stat_count += $tour->stat_count;
                                @endphp</td>
                                <td>{{ $tour->otp_count }} @php
                                    $total_otp_count += $tour->otp_count;
                                @endphp</td>
                                <td>{{ $tour->sick_count }} @php
                                    $total_sick_count += $tour->sick_count;
                                @endphp</td>
                                <td>{{ $tour->aid_count }} @php
                                    $total_aid_count += $tour->aid_count;
                                @endphp</td>
                                <td>{{ $tour->bert_count }} @php
                                    $total_bert_count += $tour->bert_count;
                                @endphp</td>
                                <td>{{ $tour->distb_count }} @php
                                    $total_distb_count += $tour->distb_count;
                                @endphp</td>
                                <td>{{ $tour->detox_count }} @php
                                    $total_detox_count += $tour->detox_count;
                                @endphp</td>
                                <td>{{ $tour->inj_count }} @php
                                    $total_inj_count += $tour->inj_count;
                                @endphp</td>
                                <td>{{ $tour->door_count }} @php
                                    $total_door_count += $tour->door_count;
                                @endphp</td>
                                <td>{{ $tour->fl_count }} @php
                                    $total_fl_count += $tour->fl_count;
                                @endphp</td>
                            </tr>
                        @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                            <td></td>
                            <td>Total :</td>
                            <td>{{ $total_mds_count }}</td>
                            <td>{{ $total_esc_count }}</td>
                            <td>{{ $total_med_count }}</td>
                            <td>{{ $total_rest_count }}</td>
                            <td>{{ $total_vis_count }}</td>
                            <td>{{ $total_sp_count }}</td>
                            <td>{{ $total_assault_count }}</td>
                            <td>{{ $total_mta_count }}</td>
                            <td>{{ $total_vis_inj_count }}</td>
                            <td>{{ $total_arrest_count }}</td>
                            <td>{{ $total_heli_count }}</td>
                            <td>{{ $total_code_red_count }}</td>
                            <td>{{ $total_elope_count }}</td>
                            <td>{{ $total_elev_count }}</td>
                            <td>{{ $total_disch_count }}</td>
                            <td>{{ $total_ev_count }}</td>
                            <td>{{ $total_evot_count }}</td>
                            <td>{{ $total_stat_count }}</td>
                            <td>{{ $total_otp_count }}</td>
                            <td>{{ $total_sick_count }}</td>
                            <td>{{ $total_aid_count }}</td>
                            <td>{{ $total_bert_count }}</td>
                            <td>{{ $total_distb_count }}</td>
                            <td>{{ $total_detox_count }}</td>
                            <td>{{ $total_inj_count }}</td>
                            <td>{{ $total_door_count }}</td>
                            <td>{{ $total_fl_count }}</td>


                        </tr>
                    </tfoot>
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
                <h5 class="modal-title" id="exampleModalLabel">Select Tour</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action={{ route('admin.blotter.stat') }} method="post" class="row">
                    @csrf

                    <div class="form-group col-md-12">
                        <label>Tour</label>
                        <select class="form-control" name="tour_name">
                            <option>Select Tour</option>
                            @foreach ($tours as $tour)
                                <option value="{{ $tour->id }}">{{ $tour->tour_name }}</option>
                            @endforeach
                        </select>
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
            dom: 'Bfrtip',
            buttons: [
            // { extend: 'copyHtml5', footer: true },
            { extend: 'excelHtml5', footer: true },
            // { extend: 'csvHtml5', footer: true },
            // { extend: 'pdfHtml5', footer: true }
        ]
        });
    });
    $(document).ready(function() {






        $(".comment").on("click", function() {
            //var dataId = $(this).attr("data-id");
            var favorite = [];
            $.each($("input[name='id[]']:checked"), function() {
                favorite.push($(this).val());
            });
            //alert("My Plants ID are: " + favorite.join(", "));
            // $('.id[]').attr(favorite);
            console.log("favorite.toString()", favorite.toString())
            let ab = document.getElementById("abc");
            ab.value = favorite.toString()
            //$(".blotter").val(dataId);
        });
    });

    $(document).on("click", ".delete", function() {
        if (confirm('do you really want to delete this tour')) {
            id = $(this).data("id");
            $.ajax({
                url: 'delete/tour/' + id,
                type: 'GET',
                data: {
                    _token: $('input[name=_token]').val()

                },
                success: function(response) {
                    $('#tour_id' + id).remove();
                }

            })
        }
    })

    $(document).on("click", ".lock", function() {
        if (confirm('do you really want to lock this tour')) {
            id = $(this).data("id");
            $.ajax({
                url: 'locked/blotter/' + id,
                type: 'GET',
                data: {
                    _token: $('input[name=_token]').val()

                },
                success: function(response) {
                    //$('#tour_id'+id).remove();
                }

            })
        }
    })
</script>
@endpush
