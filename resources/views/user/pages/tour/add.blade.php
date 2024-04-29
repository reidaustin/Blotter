@extends('user.layout.master')
@section('content')
@section('tour', 'active')
@section('title', 'Tour')
@php
    $month = date('m');
    $day = date('d');
    $year = date('Y');
    $today = $day . '-' . $month . '-' . $year;
@endphp
<div class="container-xxl flex-grow-1 container-p-y">
    <style>
        .form-control {
            margin-bottom: 2rem !important;
        }

        .form-check {
            margin-bottom: 2rem !important;
        }
    </style>
    <div class="row">
        <div class="card">
            <h5 class="card-header">Tour</h5>
            <div class="card-body">
                <form action="{{ route('store.tour') }}" method="post" class="row">
                    @csrf

                    <div class="form-group col-md-4">
                        <label class="">Date</label>
                        <input type="text" name="tour_date" class="form-control" value="{{$today}}" readonly />
                        <span class="text-danger">{{ $errors->first('tour_date') }}</span>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="">Tour</label>
                        <select name="tour_name" class="form-control">
                            <option value="12-8">12-8</option>
                            <option value="8-4">8-4</option>
                            <option value="4-12">4-12</option>
                        </select>
                        <span class="text-danger">{{ $errors->first('tour_name') }}</span>
                    </div>

                    <div class="form-group col-md-4">
                        <label class="">Tour Commander</label>
                        <select name="tour_commander_id" class="form-control">
                            {{-- <option value="">Select Tour Commander</option> --}}
                            @foreach ($commanders as $commander)
                                <option value="{{ $commander->id }}">{{ $commander->name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="">Supervisor</label>
                        <select name="supervisor_id" class="form-control">
                            {{-- <option value="">Select Supervisor</option> --}}
                            @foreach ($supervisors as $supervisor)
                                <option value="{{ $supervisor->id }}">{{ $supervisor->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="">Weather</label>
                        <select name="weather" class="form-control">
                            <option value="Sunny/Clear">Sunny/Clear</option>
                            <option value="Cloudy">Cloudy</option>
                            <option value="Rain">Rain</option>
                            <option value="Snow">Snow</option>
                            <option value="Sleet/Freezing Rain">Sleet/Freezing Rain</option>
                            <option value="Hail">Hail</option>
                            <option value="Storm">Storm</option>
                            <option value="Clear">Clear</option>
                            <option value="Noreaster">Noreaster</option>
                            <option value="Fog/Drizzle">Fog/Drizzle</option>
                            <option value="Showers">Showers</option>
                            <option value="Fog">Fog</option>
                            <option value="Fair">Fair</option>
                            <option value="Flurries">Flurries</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="">Road Condition</label>
                        <select name="road_condition" class="form-control">
                            <option value="Dry">Dry</option>
                            <option value="Wet">Wet</option>
                            <option value="Slushy/Snow">Slushy/Snow</option>
                            <option value="Icy">Icy</option>
                            <option value="Flood">Flood</option>
                            <option value="Pot Holes">Pot Holes</option>
                        </select>
                    </div>
                    <div class="clonediv">
                        <div class="productdiv" id="productdiv">
                            <div class="row">
                                {{-- patrolman --}}
                                <div class="form-group col-md-3">
                                    <label class="">Patrolman <span>1</span></label>
                                    <select name="officer_id[]" class="form-control">
                                        @foreach ($officers as $officer)
                                            <option value="{{ $officer->id }}">{{ $officer->full_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- radio --}}
                                <div class="form-group col-md-3">
                                    <label class="">Radio <span>1</span></label>
                                    <input type="text" name="radio[]" class="form-control" />
                                </div>
                                {{-- post --}}
                                <div class="form-group col-md-3">
                                    <label class="">Post <span>1</span></label>
                                    <input type="text" name="post[]" class="form-control" />
                                </div>
                                <div class="form-group col-md-1 mt-3">
                                    <a class="btn btn-primary mt-2 add-btn text-white" id="add">+</a>
                                </div>
                                <div class="form-group col-md-1 mt-3">
                                    <a class="btn btn-danger mt-2 del-btn text-white" id="remove">-</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <h5>Please Check if Accounted for!</h5>
                    </div>
                    <div class="form-check col-md-3">
                        <input class="form-check-input" type="checkbox" name="fob_1" value="Fob 1"
                            id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                            FOB-LL
                        </label>
                    </div>
                    <div class="form-check col-md-3">
                        <input class="form-check-input" type="checkbox" name="fob_2" value="Fob 2"
                            id="defaultCheck2">
                        <label class="form-check-label" for="defaultCheck2">
                            FOB-CM
                        </label>
                    </div>
                    <div class="form-check col-md-3">
                        <input class="form-check-input" type="checkbox" name="fob_3" value="Fob 3"
                            id="defaultCheck3">
                        <label class="form-check-label" for="defaultCheck3">
                            FOB-MRI
                        </label>
                    </div>
                    <div class="form-check col-md-3">
                        <input class="form-check-input" type="checkbox" name="fob_4"
                            value="Fob 4" id="defaultCheck4">
                        <label class="form-check-label" for="defaultCheck4">
                            FOB-ER
                        </label>
                    </div>

                    <div class="form-check col-md-3">
                        <input class="form-check-input" type="checkbox" name="ring_1" value="Part time key ring 1"
                            id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                            Part time key ring 1
                        </label>
                    </div>
                    <div class="form-check col-md-3">
                        <input class="form-check-input" type="checkbox" name="ring_2" value="Part time key ring 2"
                            id="defaultCheck2">
                        <label class="form-check-label" for="defaultCheck2">
                            Part time key ring 2
                        </label>
                    </div>
                    <div class="form-check col-md-3">
                        <input class="form-check-input" type="checkbox" name="ring_3" value="Part time key ring 3"
                            id="defaultCheck3">
                        <label class="form-check-label" for="defaultCheck3">
                            Part time key ring 3
                        </label>
                    </div>
                    <div class="form-check col-md-3">
                        <input class="form-check-input" type="checkbox" name="ring_4"
                            value="Part time key ring 4" id="defaultCheck4">
                        <label class="form-check-label" for="defaultCheck4">
                            Part time key ring 4
                        </label>
                    </div>
                    <div class="form-group col-md-12">
                        <h5>Please Select Vehicle being used during tour</h5>
                    </div>
                    <div class="form-group col-md-3">
                        <label class="">Vehicle 1</label>
                        <select name="vehicle_1" class="form-control">
                            <option value="none">None</option>
                            <option value="Car#1">Car#1</option>
                            <option value="Car#2">Car#2</option>
                            <option value="Car#3">Car#3</option>
                            <option value="Car#4">Car#4</option>
                            <option value="Blk. Expl">Blk. Expl</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label class="">Vehicle 2</label>
                        <select name="vehicle_2" class="form-control">
                            <option value="none">None</option>
                            <option value="Car#1">Car#1</option>
                            <option value="Car#2">Car#2</option>
                            <option value="Car#3">Car#3</option>
                            <option value="Car#4">Car#4</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label class="">Vehicle 3</label>
                        <select name="vehicle_3" class="form-control">
                            <option value="none">None</option>
                            <option value="Car#1">Car#1</option>
                            <option value="Car#2">Car#2</option>
                            <option value="Car#3">Car#3</option>
                            <option value="Car#4">Car#4</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label class="">Vehicle 4</label>
                        <select name="vehicle_4" class="form-control">
                            <option value="none">None</option>
                            <option value="Car#1">Car#1</option>
                            <option value="Car#2">Car#2</option>
                            <option value="Car#3">Car#3</option>
                            <option value="Car#4">Car#4</option>
                        </select>
                    </div>
                    {{-- <div class="form-group col-md-4">
                        <label class="">Vehicle 5</label>
                        <select name="vehicle_5" class="form-control">
                            <option value="Car#1">Car#1</option>
                            <option value="Car#2">Car#2</option>
                            <option value="Car#3">Car#3</option>
                            <option value="Car#4">Car#4</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="">Vehicle 6</label>
                        <select name="vehicle_6" class="form-control">
                            <option value="Car#1">Car#1</option>
                            <option value="Car#2">Car#2</option>
                            <option value="Car#3">Car#3</option>
                            <option value="Car#4">Car#4</option>
                        </select>
                    </div> --}}

                    <div class="form-group col-md-12">
                        <label class="">Comment</label>
                        <textarea rows="10" cols="140" name="comment"></textarea>
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
@push('script')
<script>
    $(document).ready(function() {
        var today = new Date().toISOString().split('T')[0];
        $("#minDate").attr('min', today);
    });

    $(document).ready(function() {
        $('.del-btn').hide();
    });
    $(document).on('click', '.add-btn', function() {
        if ($('.productdiv').length > 19) {
            alert('Limit Reach Only 20 is Allowed')
        } else {
            var clone = $('.productdiv').last().clone();
            $(clone).find("input").val("").end();
            $(clone).find("text").val("").end();
            $(clone).find("textarea").val("").end();
            var mainDiv = $('#productdiv div.row');
            var lengthDiv = parseInt(mainDiv.length) + parseInt(1);
            $(clone).find("label span").text(lengthDiv);
            $('.clonediv').append(clone);
            $('.del-btn').show();
        }
    });
    $(document).on('click', '.del-btn', function() {
        if ($('.productdiv').length > 1) {
            $(this).parents('.productdiv').remove();
            if ($('.productdiv').length == 1) {
                $('.del-btn').hide();
            }
        } else {
            $(this).hide();
        }

    });
</script>
@endpush
