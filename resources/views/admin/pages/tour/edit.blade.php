@extends('admin.layout.master')
@section('content')
@section('tour', 'active')
@section('title', 'Tour')
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
                <form action="{{ route('admin.update.tour') }}" method="post" class="row">
                    @csrf
                    <input type="hidden" name="id" value="{{ $tour->id }}">

                    <div class="form-group col-md-4">
                        <label class="">Date</label>
                        <input type="text" name="tour_date" class="form-control" value="{{ $tour->tour_date }}" readonly />
                        <span class="text-danger">{{ $errors->first('tour_date') }}</span>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="">Tour</label>
                        <select name="tour_name" class="form-control">
                            <option value="12-8" @if (!empty($tour) && $tour->tour_name == '12-8') selected @endif>12-8</option>
                            <option value="8-4" @if (!empty($tour) && $tour->tour_name == '8-4') selected @endif>8-4</option>
                            <option value="4-12" @if (!empty($tour) && $tour->tour_name == '4-12') selected @endif>4-12</option>
                        </select>
                        <span class="text-danger">{{ $errors->first('tour_name') }}</span>
                    </div>

                    <div class="form-group col-md-4">
                        <label class="">Tour Commander</label>
                        <select name="tour_commander_id" class="form-control">
                            <option value="">Select Tour Commander</option>
                            @foreach ($commanders as $commander)
                                <option value="{{ $commander->id }}" @if (!empty($tour) && $tour->tour_commander_id == $commander->id) selected @endif>
                                    {{ $commander->name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="">Supervisor</label>
                        <select name="supervisor_id" class="form-control">
                            <option value="">Select Supervisor</option>
                            @foreach ($supervisors as $supervisor)
                                <option value="{{ $supervisor->id }}" @if (!empty($tour) && $tour->supervisor_id == $supervisor->id) selected @endif>
                                    {{ $supervisor->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="">Weather</label>
                        <select name="weather" class="form-control">
                            <option value="Sunny/Clear" @if (!empty($tour) && $tour->weather == 'Sunny/Clear') selected @endif>
                                Sunny/Clear
                            </option>
                            <option value="Cloudy" @if (!empty($tour) && $tour->weather == 'Cloudy') selected @endif>Cloudy
                            </option>
                            <option value="Rain" @if (!empty($tour) && $tour->weather == 'Rain') selected @endif>Rain
                            </option>
                            <option value="Snow" @if (!empty($tour) && $tour->weather == 'Snow') selected @endif>Snow
                            </option>
                            <option value="Sleet/Freezing Rain" @if (!empty($tour) && $tour->weather == 'Sleet/Freezing Rain') selected @endif>
                                Sleet/Freezing Rain</option>
                            <option value="Hail" @if (!empty($tour) && $tour->weather == 'Hail') selected @endif>Hail
                            </option>
                            <option value="Storm" @if (!empty($tour) && $tour->weather == 'Storm') selected @endif>Storm
                            </option>
                            <option value="Clear" @if (!empty($tour) && $tour->weather == 'Clear') selected @endif>Clear
                            </option>
                            <option value="Noreaster" @if (!empty($tour) && $tour->weather == 'Noreaster') selected @endif>
                                Noreaster
                            </option>
                            <option value="Fog/Drizzle" @if (!empty($tour) && $tour->weather == 'Fog/Drizzle') selected @endif>
                                Fog/Drizzle
                            </option>
                            <option value="Showers" @if (!empty($tour) && $tour->weather == 'Showers') selected @endif>Showers
                            </option>
                            <option value="Fog" @if (!empty($tour) && $tour->weather == 'Fog') selected @endif>Fog
                            </option>
                            <option value="Fair" @if (!empty($tour) && $tour->weather == 'Fair') selected @endif>Fair
                            </option>
                            <option value="Flurries" @if (!empty($tour) && $tour->weather == 'Flurries') selected @endif>
                                Flurries
                            </option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="">Road Condition</label>
                        <select name="road_condition" class="form-control">
                            <option value="Dry" @if (!empty($tour) && $tour->road_condition == 'Dry') selected @endif>Dry
                            </option>
                            <option value="Wet" @if (!empty($tour) && $tour->road_condition == 'Wet') selected @endif>Wet
                            </option>
                            <option value="Slushy/Snow" @if (!empty($tour) && $tour->road_condition == 'Slushy/Snow') selected @endif>
                                Slushy/Snow
                            </option>
                            <option value="Icy" @if (!empty($tour) && $tour->road_condition == 'Icy') selected @endif>Icy
                            </option>
                            <option value="Flood" @if (!empty($tour) && $tour->road_condition == 'Flood') selected @endif>Flood
                            </option>
                            <option value="Pot Holes" @if (!empty($tour) && $tour->road_condition == 'Pot Holes') selected @endif>Pot
                                Holes
                            </option>
                        </select>
                    </div>
                    <div class="clonediv">
                        @foreach ($tour_officers as $tour_officer)
                        @foreach ($tour->tour_radio as $radi)
                        @endforeach

                        @foreach ($tour->tour_post as $pos)
                        @endforeach


                        <div class="productdiv" id="productdiv">
                            <div class="row">
                               <div class="form-group col-md-3">
                                        <label class="">Patrolman <span>1</span></label>
                                        <select name="officer_id[]" class="form-control">
                                            @foreach ($officers as $officer)
                                                <option value="{{ $officer->id }}" @if (!empty($tour_officer) && $tour_officer->full_name == $officer->full_name) selected @endif>
                                                    {{ $officer->full_name }}
                                                </option>
                                            @endforeach
                                        </select>

                                </div>
                                <div class="form-group col-md-3">
                                        <label class="">Radio <span>1</span></label>
                                        <input type="text" name="radio[]" class="form-control"
                                            value="{{ $radi->radio }}" />

                                </div>
                                <div class="form-group col-md-3">
                                        <label class="">Post <span>1</span></label>
                                        <input type="text" name="post[]" class="form-control"
                                            value="{{ $pos->post }}" />

                                </div>
                                <div class="form-group col-md-1 mt-3">
                                    <a class="btn btn-primary mt-2 add-btn" id="add"><i
                                            class="fa-solid fa-plus text-white"></i></a>
                                </div>
                                <div class="form-group col-md-1 mt-3">
                                    <a class="btn btn-danger mt-2 del-btn" id="remove"><i
                                            class="fa-solid fa-minus text-white"></i></a>
                                </div>
                            </div>

                        </div>
                        @endforeach



                    </div>
                    <div class="form-group col-md-12">
                        <h5>Please Check if Accounted for!</h5>
                    </div>
                    <div class="form-check col-md-3">
                        <input class="form-check-input" type="checkbox" name="fob_1" value="Fob 1"
                            id="defaultCheck1" @if (!empty($tour) && $tour->fob_1 == 'Fob 1') checked @endif>
                        <label class="form-check-label" for="defaultCheck1">
                            FOB-LL
                        </label>
                    </div>
                    <div class="form-check col-md-3">
                        <input class="form-check-input" type="checkbox" name="fob_2" value="Fob 2"
                            id="defaultCheck2" @if (!empty($tour) && $tour->fob_2 == 'Fob 2') checked @endif>
                        <label class="form-check-label" for="defaultCheck2">
                            FOB-CM
                        </label>
                    </div>
                    <div class="form-check col-md-3">
                        <input class="form-check-input" type="checkbox" name="fob_3" value="Fob 3"
                            id="defaultCheck3" @if (!empty($tour) && $tour->fob_3 == 'Fob 3') checked @endif>
                        <label class="form-check-label" for="defaultCheck3">
                            FOB-MRI
                        </label>
                    </div>
                    <div class="form-check col-md-3">
                        <input class="form-check-input" type="checkbox" name="fob_4"
                            value="Fob 4" id="defaultCheck4"
                            @if (!empty($tour) && $tour->fob_4 == 'Fob 4') checked @endif>
                        <label class="form-check-label" for="defaultCheck4">
                            FOB-ER
                        </label>
                    </div>

                    <div class="form-check col-md-3">
                        <input class="form-check-input" type="checkbox" name="ring_1" value="Part time key ring 1"
                            id="defaultCheck1" @if (!empty($tour) && $tour->ring_1 == 'Part time key ring 1') checked @endif>
                        <label class="form-check-label" for="defaultCheck1">
                            Part time key ring 1
                        </label>
                    </div>
                    <div class="form-check col-md-3">
                        <input class="form-check-input" type="checkbox" name="ring_2" value="Part time key ring 2"
                            id="defaultCheck2" @if (!empty($tour) && $tour->ring_2 == 'Part time key ring 2') checked @endif>
                        <label class="form-check-label" for="defaultCheck2">
                            Part time key ring 2
                        </label>
                    </div>
                    <div class="form-check col-md-3">
                        <input class="form-check-input" type="checkbox" name="ring_3" value="Part time key ring 3"
                            id="defaultCheck3" @if (!empty($tour) && $tour->ring_3 == 'Part time key ring 3') checked @endif>
                        <label class="form-check-label" for="defaultCheck3">
                            Part time key ring 3
                        </label>
                    </div>
                    <div class="form-check col-md-3">
                        <input class="form-check-input" type="checkbox" name="ring_4"
                            value="Part time key ring 4" id="defaultCheck4"
                            @if (!empty($tour) && $tour->ring_4 == 'Part time key ring 4') checked @endif>
                        <label class="form-check-label" for="defaultCheck4">
                            Part time key ring 4
                        </label>
                    </div>
                    <div class="form-group col-md-12">
                        <h5>Please Select Vehicle being used during tour</h5>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="">Vehicle 1</label>
                        <select name="vehicle_1" class="form-control">
                            <option value="none" @if (!empty($tour) && $tour->vehicle_1 == 'none') selected @endif>None
                            </option>
                            <option value="Car#1" @if (!empty($tour) && $tour->vehicle_1 == 'Car#1') selected @endif>Car#1
                            </option>
                            <option value="Car#2" @if (!empty($tour) && $tour->vehicle_1 == 'Car#2') selected @endif>Car#2
                            </option>
                            <option value="Car#3" @if (!empty($tour) && $tour->vehicle_1 == 'Car#3') selected @endif>Car#3
                            </option>
                            <option value="Car#4" @if (!empty($tour) && $tour->vehicle_1 == 'Car#4') selected @endif>Car#4
                            </option>
                            <option value="Blk. Expl" @if (!empty($tour) && $tour->vehicle_1 == 'Blk. Expl') selected @endif>Blk.
                                Expl
                            </option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="">Vehicle 2</label>
                        <select name="vehicle_2" class="form-control">
                            <option value="none" @if (!empty($tour) && $tour->vehicle_2 == 'none') selected @endif>None
                            </option>
                            <option value="Car#1" @if (!empty($tour) && $tour->vehicle_2 == 'Car#1') selected @endif>Car#1
                            </option>
                            <option value="Car#2" @if (!empty($tour) && $tour->vehicle_2 == 'Car#2') selected @endif>Car#2
                            </option>
                            <option value="Car#3" @if (!empty($tour) && $tour->vehicle_2 == 'Car#3') selected @endif>Car#3
                            </option>
                            <option value="Car#4" @if (!empty($tour) && $tour->vehicle_2 == 'Car#4') selected @endif>Car#4
                            </option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="">Vehicle 3</label>
                        <select name="vehicle_3" class="form-control">
                            <option value="none" @if (!empty($tour) && $tour->vehicle_3 == 'none') selected @endif>None
                            </option>
                            <option value="Car#1" @if (!empty($tour) && $tour->vehicle_3 == 'Car#1') selected @endif>Car#1
                            </option>
                            <option value="Car#2" @if (!empty($tour) && $tour->vehicle_3 == 'Car#2') selected @endif>Car#2
                            </option>
                            <option value="Car#3" @if (!empty($tour) && $tour->vehicle_3 == 'Car#3') selected @endif>Car#3
                            </option>
                            <option value="Car#4" @if (!empty($tour) && $tour->vehicle_3 == 'Car#4') selected @endif>Car#4
                            </option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="">Vehicle 4</label>
                        <select name="vehicle_4" class="form-control">
                            <option value="none" @if (!empty($tour) && $tour->vehicle_4 == 'none') selected @endif>None
                            </option>
                            <option value="Car#1" @if (!empty($tour) && $tour->vehicle_4 == 'Car#1') selected @endif>Car#1
                            </option>
                            <option value="Car#2" @if (!empty($tour) && $tour->vehicle_4 == 'Car#2') selected @endif>Car#2
                            </option>
                            <option value="Car#3" @if (!empty($tour) && $tour->vehicle_4 == 'Car#3') selected @endif>Car#3
                            </option>
                            <option value="Car#4" @if (!empty($tour) && $tour->vehicle_4 == 'Car#4') selected @endif>Car#4
                            </option>
                        </select>
                    </div>
                    {{-- <div class="form-group col-md-4">
                        <label class="">Vehicle 5</label>
                        <select name="vehicle_5" class="form-control">
                            <option value="Car#1" @if (!empty($tour) && $tour->vehicle_5 == 'Car#1') selected @endif>Car#1
                            </option>
                            <option value="Car#2" @if (!empty($tour) && $tour->vehicle_5 == 'Car#2') selected @endif>Car#2
                            </option>
                            <option value="Car#3" @if (!empty($tour) && $tour->vehicle_5 == 'Car#3') selected @endif>Car#3
                            </option>
                            <option value="Car#4" @if (!empty($tour) && $tour->vehicle_5 == 'Car#4') selected @endif>Car#4
                            </option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="">Vehicle 6</label>
                        <select name="vehicle_6" class="form-control">
                            <option value="Car#1" @if (!empty($tour) && $tour->vehicle_6 == 'Car#1') selected @endif>Car#1
                            </option>
                            <option value="Car#2" @if (!empty($tour) && $tour->vehicle_6 == 'Car#2') selected @endif>Car#2
                            </option>
                            <option value="Car#3" @if (!empty($tour) && $tour->vehicle_6 == 'Car#3') selected @endif>Car#3
                            </option>
                            <option value="Car#4" @if (!empty($tour) && $tour->vehicle_6 == 'Car#4') selected @endif>Car#4
                            </option>
                        </select>
                    </div> --}}
                    <div class="form-group col-md-12">
                        <label class="">Comment</label>
                        <textarea rows="10" cols="140" name="comment">
                            {{ $tour->comment }}
                        </textarea>
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
        $('.del-btn').hide();
    });
    $(document).on('click', '.add-btn', function() {
        if ($('.productdiv').length > 19) {
            alert('Limit Reach Only 20 is Allowed')
        } else {
            var clone = $('.productdiv').last().clone();
            console.log(clone ,"haris bana gaya chiodo bakra")
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
    $(document).ready(function() {
        var today = new Date().toISOString().split('T')[0];
        $("#minDate").attr('min', today);
    });
</script>
@endpush
