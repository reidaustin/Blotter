@extends('admin.layout.master')
@section('content')
@section('blotter', 'active')
@section('title', 'Blotters')
<div class="container-xxl flex-grow-1 container-p-y">
    <style>
        .form-control {
            margin-bottom: 2rem !important;
        }
    </style>
    <div class="row">
        <div class="card">
            <h5 class="card-header">Daily Blotter</h5>
            <div class="card-body">
                <form action="{{ route('admin.update.blotter') }}" method="post" class="row">
                    @csrf
                    <input type="hidden" name="id" value="{{ $blotter->id }}">

                    {{-- <div class="card">
                        <div class="card-body row">
                            <div class="form-group col-md-12">
                                <h5>Tour</h5>
                            </div>
                            <input type="hidden" name="id" value="{{ $blotter->id }}">
                            <div class="form-group col-md-4">
                                <label class="">Date</label>
                                <input type="date" name="date" class="form-control"
                                    value="{{ $blotter->date }}" />
                            </div>
                            <div class="form-group col-md-4">
                                <label class="">Tour</label>
                                <input type="text" name="tour" class="form-control" value="{{ $blotter->tour }}"
                                    readonly />

                            </div>
                            <div class="form-group col-md-4">
                                <label class="">Tour Commander</label>
                                <select name="tour_commander_id" class="form-control">
                                    <option value="">Select Tour Commander</option>
                                    @foreach ($commanders as $commander)
                                        <option value="{{ $commander->id }}"
                                            @if (!empty($blotter) && $blotter->tour_commander_id == $commander->id) selected @endif>{{ $commander->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <br />
                            </div>
                            <div class="form-group col-md-4">
                                <label class="">Supervisor</label>
                                <select name="supervisor_id" class="form-control">
                                    <option value="">Select Supervisor</option>

                                    @foreach ($supervisors as $supervisor)
                                        <option value="{{ $supervisor->id }}"
                                            @if (!empty($blotter) && $blotter->supervisor_id == $supervisor->id) selected @endif>{{ $supervisor->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="">Weather</label>
                                <select name="weather" class="form-control">
                                    <option value="Sunny/Clear" @if (!empty($blotter) && $blotter->weather == 'Sunny/Clear') selected @endif>
                                        Sunny/Clear
                                    </option>
                                    <option value="Cloudy" @if (!empty($blotter) && $blotter->weather == 'Cloudy') selected @endif>Cloudy
                                    </option>
                                    <option value="Rain" @if (!empty($blotter) && $blotter->weather == 'Rain') selected @endif>Rain
                                    </option>
                                    <option value="Snow" @if (!empty($blotter) && $blotter->weather == 'Snow') selected @endif>Snow
                                    </option>
                                    <option value="Sleet/Freezing Rain"
                                        @if (!empty($blotter) && $blotter->weather == 'Sleet/Freezing Rain') selected @endif>
                                        Sleet/Freezing Rain</option>
                                    <option value="Hail" @if (!empty($blotter) && $blotter->weather == 'Hail') selected @endif>Hail
                                    </option>
                                    <option value="Storm" @if (!empty($blotter) && $blotter->weather == 'Storm') selected @endif>Storm
                                    </option>
                                    <option value="Clear" @if (!empty($blotter) && $blotter->weather == 'Clear') selected @endif>Clear
                                    </option>
                                    <option value="Noreaster" @if (!empty($blotter) && $blotter->weather == 'Noreaster') selected @endif>
                                        Noreaster
                                    </option>
                                    <option value="Fog/Drizzle" @if (!empty($blotter) && $blotter->weather == 'Fog/Drizzle') selected @endif>
                                        Fog/Drizzle
                                    </option>
                                    <option value="Showers" @if (!empty($blotter) && $blotter->weather == 'Showers') selected @endif>Showers
                                    </option>
                                    <option value="Fog" @if (!empty($blotter) && $blotter->weather == 'Fog') selected @endif>Fog
                                    </option>
                                    <option value="Fair" @if (!empty($blotter) && $blotter->weather == 'Fair') selected @endif>Fair
                                    </option>
                                    <option value="Flurries" @if (!empty($blotter) && $blotter->weather == 'Flurries') selected @endif>
                                        Flurries
                                    </option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="">Road Condition</label>
                                <select name="road_condition" class="form-control">
                                    <option value="Dry" @if (!empty($blotter) && $blotter->road_condition == 'Dry') selected @endif>Dry
                                    </option>
                                    <option value="Wet" @if (!empty($blotter) && $blotter->road_condition == 'Wet') selected @endif>Wet
                                    </option>
                                    <option value="Slushy/Snow" @if (!empty($blotter) && $blotter->road_condition == 'Slushy/Snow') selected @endif>
                                        Slushy/Snow
                                    </option>
                                    <option value="Icy" @if (!empty($blotter) && $blotter->road_condition == 'Icy') selected @endif>Icy
                                    </option>
                                    <option value="Flood" @if (!empty($blotter) && $blotter->road_condition == 'Flood') selected @endif>Flood
                                    </option>
                                    <option value="Pot Holes" @if (!empty($blotter) && $blotter->road_condition == 'Pot Holes') selected @endif>Pot
                                        Holes
                                    </option>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <br />
                            </div>
                            <div class="form-group col-md-12">
                                <br />
                            </div>
                            <div class="form-group col-md-12">
                                <h5>Please Check if Accounted for!</h5>
                            </div>
                            <div class="form-group col-md-12">
                                <br />
                            </div>
                            <div class="form-check col-md-3">
                                <input class="form-check-input" type="checkbox" name="gate_cards" value="Gate Cards"
                                    id="defaultCheck1" @if (!empty($blotter) && $blotter->gate_cards == 'Gate Cards') checked @endif>
                                <label class="form-check-label" for="defaultCheck1">
                                    Gate Cards
                                </label>
                            </div>
                            <div class="form-check col-md-3">
                                <input class="form-check-input" type="checkbox" name="gas_cards" value="Gas Cards"
                                    id="defaultCheck2" @if (!empty($blotter) && $blotter->gas_cards == 'Gas Cards') checked @endif>
                                <label class="form-check-label" for="defaultCheck2">
                                    Gas Cards
                                </label>
                            </div>
                            <div class="form-check col-md-3">
                                <input class="form-check-input" type="checkbox" name="ct_key" value="CT-1 Key"
                                    id="defaultCheck3" @if (!empty($blotter) && $blotter->ct_key == 'CT-1 Key') checked @endif>
                                <label class="form-check-label" for="defaultCheck3">
                                    CT-1 Key
                                </label>
                            </div>
                            <div class="form-check col-md-3">
                                <input class="form-check-input" type="checkbox" name="supervisor_key"
                                    value="Supervisors Key" id="defaultCheck4"
                                    @if (!empty($blotter) && $blotter->supervisor_key == 'Supervisors Key') checked @endif>
                                <label class="form-check-label" for="defaultCheck4">
                                    Supervisors Key
                                </label>
                            </div>
                            <div class="form-group col-md-12">
                                <br />
                            </div>
                            <div class="form-group col-md-12">
                                <h5>Please Select Vehicle being used during tour</h5>
                            </div>
                            <div class="form-group col-md-12">
                                <br />
                            </div>
                            <div class="form-group col-md-4">
                                <label class="">Vehicle 1</label>
                                <select name="vehicle_1" class="form-control">
                                    <option value="Car#1" @if (!empty($blotter) && $blotter->vehicle_1 == 'Car#1') selected @endif>Car#1
                                    </option>
                                    <option value="Car#2" @if (!empty($blotter) && $blotter->vehicle_1 == 'Car#2') selected @endif>Car#2
                                    </option>
                                    <option value="Car#3" @if (!empty($blotter) && $blotter->vehicle_1 == 'Car#3') selected @endif>Car#3
                                    </option>
                                    <option value="Car#4" @if (!empty($blotter) && $blotter->vehicle_1 == 'Car#4') selected @endif>Car#4
                                    </option>
                                    <option value="Blk. Expl" @if (!empty($blotter) && $blotter->vehicle_1 == 'Blk. Expl') selected @endif>Blk.
                                        Expl
                                    </option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="">Vehicle 2</label>
                                <select name="vehicle_2" class="form-control">
                                    <option value="Car#1" @if (!empty($blotter) && $blotter->vehicle_2 == 'Car#1') selected @endif>Car#1
                                    </option>
                                    <option value="Car#2" @if (!empty($blotter) && $blotter->vehicle_2 == 'Car#2') selected @endif>Car#2
                                    </option>
                                    <option value="Car#3" @if (!empty($blotter) && $blotter->vehicle_2 == 'Car#3') selected @endif>Car#3
                                    </option>
                                    <option value="Car#4" @if (!empty($blotter) && $blotter->vehicle_2 == 'Car#4') selected @endif>Car#4
                                    </option>
                                </select>

                            </div>
                            <div class="form-group col-md-4">
                                <label class="">Vehicle 3</label>
                                <select name="vehicle_3" class="form-control">
                                    <option value="Car#1" @if (!empty($blotter) && $blotter->vehicle_3 == 'Car#1') selected @endif>Car#1
                                    </option>
                                    <option value="Car#2" @if (!empty($blotter) && $blotter->vehicle_3 == 'Car#2') selected @endif>Car#2
                                    </option>
                                    <option value="Car#3" @if (!empty($blotter) && $blotter->vehicle_3 == 'Car#3') selected @endif>Car#3
                                    </option>
                                    <option value="Car#4" @if (!empty($blotter) && $blotter->vehicle_3 == 'Car#4') selected @endif>Car#4
                                    </option>
                                </select>

                            </div>
                            <div class="form-group col-md-12">
                                <br />
                            </div>
                            <div class="form-group col-md-4">
                                <label class="">Vehicle 4</label>
                                <select name="vehicle_4" class="form-control">
                                    <option value="Car#1" @if (!empty($blotter) && $blotter->vehicle_4 == 'Car#1') selected @endif>Car#1
                                    </option>
                                    <option value="Car#2" @if (!empty($blotter) && $blotter->vehicle_4 == 'Car#2') selected @endif>Car#2
                                    </option>
                                    <option value="Car#3" @if (!empty($blotter) && $blotter->vehicle_4 == 'Car#3') selected @endif>Car#3
                                    </option>
                                    <option value="Car#4" @if (!empty($blotter) && $blotter->vehicle_4 == 'Car#4') selected @endif>Car#4
                                    </option>
                                </select>

                            </div>
                            <div class="form-group col-md-4">
                                <label class="">Vehicle 5</label>
                                <select name="vehicle_5" class="form-control">
                                    <option value="Car#1" @if (!empty($blotter) && $blotter->vehicle_5 == 'Car#1') selected @endif>Car#1
                                    </option>
                                    <option value="Car#2" @if (!empty($blotter) && $blotter->vehicle_5 == 'Car#2') selected @endif>Car#2
                                    </option>
                                    <option value="Car#3" @if (!empty($blotter) && $blotter->vehicle_5 == 'Car#3') selected @endif>Car#3
                                    </option>
                                    <option value="Car#4" @if (!empty($blotter) && $blotter->vehicle_5 == 'Car#4') selected @endif>Car#4
                                    </option>
                                </select>

                            </div>
                            <div class="form-group col-md-4">
                                <label class="">Vehicle 6</label>
                                <select name="vehicle_6" class="form-control">
                                    <option value="Car#1" @if (!empty($blotter) && $blotter->vehicle_6 == 'Car#1') selected @endif>Car#1
                                    </option>
                                    <option value="Car#2" @if (!empty($blotter) && $blotter->vehicle_6 == 'Car#2') selected @endif>Car#2
                                    </option>
                                    <option value="Car#3" @if (!empty($blotter) && $blotter->vehicle_6 == 'Car#3') selected @endif>Car#3
                                    </option>
                                    <option value="Car#4" @if (!empty($blotter) && $blotter->vehicle_6 == 'Car#4') selected @endif>Car#4
                                    </option>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <br />
                            </div>
                        </div>
                    </div>
            </div>
            <div class="form-group col-md-12">
                <br />
            </div>
            <div class="card">
                <div class="card-body row">
                    <div class="form-group col-md-12">
                        <h5>Incident</h5>
                    </div>
                    <div class="form-group col-md-12">
                        <br />
                    </div>
                    <div class="form-group col-md-4">
                        <label class="">Patrolman</label>
                        <input type="text" name="petrol_man" class="form-control"
                            value="{{ $blotter->petrol_man }}" />
                    </div>
                    <div class="form-group col-md-4">
                        <label class="">Radio</label>
                        <input type="text" name="radio" class="form-control" value="{{ $blotter->radio }}" />
                    </div>
                    <div class="form-group col-md-4">
                        <label class="">Post</label>
                        <input type="text" name="post" class="form-control" value="{{ $blotter->post }}" />
                    </div>
                    <div class="form-group col-md-12">
                        <br />
                    </div>
                    <div class="form-group col-md-3">
                        <label class="">Entry Number</label>
                        <input type="number" name="entry_number" class="form-control"
                            value="{{ $blotter->entry_number }}" />
                    </div>
                    <div class="form-group col-md-3">
                        <label class="">Time</label>
                        <input type="time" name="time" class="form-control" value="{{ $blotter->time }}" />
                    </div>
                    <div class="form-group col-md-3">
                        <label class="">Officers:</label>
                        <select name="officer_id" class="form-control">
                            <option value="">Select Officer</option>
                            @foreach ($officers as $officerr)
                                <option value="{{ $officerr->id }}"
                                    @if (!empty($blotter) && $blotter->officer_id == $officerr->id) selected @endif>
                                    {{ $officerr->full_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label class="">Incident Type</label>
                        <select name="incident_type_id" id="" class="form-control">
                            <option value="">Select Incident Type</option>
                            @foreach ($incidents as $incident)
                                <option value="{{ $incident->id }}"
                                    @if (!empty($blotter) && $blotter->incident_type_id == $incident->id) selected @endif>{{ $incident->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <br />
                    </div>
                    <div class="form-group col-md-12">
                        <br />
                    </div>
                    <div class="form-group col-md-4">
                        <label class="">Job Final </label>
                        <select name="job_final_id" id="" class="form-control">
                            <option value="">Select Job Final</option>
                            @foreach ($jobs as $job)
                                <option value="{{ $job->id }}"
                                    @if (!empty($blotter) && $blotter->job_final_id == $job->id) selected @endif>{{ $job->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="">Crimes</label>
                        <select name="crime_id" id="" class="form-control">
                            <option value="">Select Crime</option>
                            @foreach ($crimes as $crime)
                                <option value="{{ $crime->id }}"
                                    @if (!empty($blotter) && $blotter->crime_id == $crime->id) selected @endif>{{ $crime->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="">Requests</label>
                        <select name="person_request_id" id="" class="form-control">
                            <option value="">Select Request</option>
                            @foreach ($persons as $person)
                                <option value="{{ $person->id }}"
                                    @if (!empty($blotter) && $blotter->person_request_id == $person->id) selected @endif>{{ $person->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <br />
                    </div>
                    <div class="form-group col-md-4">
                        <label class="">Medical Requests</label>
                        <select name="medical_request_id" id="" class="form-control">
                            <option value="">Select Medical Request</option>
                            @foreach ($medicals as $medical)
                                <option value="{{ $medical->id }}"
                                    @if (!empty($blotter) && $blotter->medical_request_id == $medical->id) selected @endif>{{ $medical->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="">Codes/Alarms</label>
                        <select name="code_alarm_id" id="" class="form-control">
                            <option value="">Select Codes/Alarms</option>
                            @foreach ($codes as $code)
                                <option value="{{ $code->id }}"
                                    @if (!empty($blotter) && $blotter->code_alarm_id == $code->id) selected @endif>{{ $code->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="">Other</label>
                        <select name="other_id" id="" class="form-control">
                            <option value="">Select Other</option>
                            @foreach ($others as $other)
                                <option value="{{ $other->id }}"
                                    @if (!empty($blotter) && $blotter->other_id == $other->id) selected @endif>{{ $other->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <br />
                    </div>
                    <div class="form-group col-md-4">
                        <label class="">Building</label>
                        <select name="building_id" id="" class="form-control">
                            <option value="">Select Building</option>
                            @foreach ($buildings as $building)
                                <option value="{{ $building->id }}"
                                    @if (!empty($blotter) && $blotter->building_id == $building->id) selected @endif>{{ $building->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="">Parking Lot</label>
                        <select name="parking_lot_id" id="" class="form-control">
                            <option value="">Select Parking Lot</option>
                            @foreach ($parkings as $parking)
                                <option value="{{ $parking->id }}"
                                    @if (!empty($blotter) && $blotter->parking_lot_id == $parking->id) selected @endif>{{ $parking->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="">Area</label>
                        <select name="area_id" id="" class="form-control">
                            <option value="">Select Area</option>
                            @foreach ($areas as $area)
                                <option value="{{ $area->id }}"
                                    @if (!empty($blotter) && $blotter->area_id == $area->id) selected @endif>{{ $area->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <br />
                    </div>
                    <div class="form-group col-md-12">
                        <label class="">Comments</label>
                        <textarea type="text" name="comment" class="form-control" value="">
                            {{ $blotter->comment }}
                        </textarea>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-12">
                <br />
            </div>
            <div class="form-group offset-md-10 col-md-2 col-sm-12">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div> --}}
                    <div class="card">
                        <div class="card-body row">
                            <div class="form-group col-md-12">
                                <h5>Incident</h5>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="">Entry Number</label>
                                <input type="number" name="entry_number" class="form-control"
                                    value="{{ $blotter->entry_number }}" />
                                <span class="text-danger">{{ $errors->first('entry_number') }}</span>

                            </div>

                            <div class="form-group col-md-12">
                                <label class="">Officers:</label>
                                {{-- <select name="officer_id" class="form-control" multiple>
                                    <option value="">Select Officer</option>
                                   @foreach ($officers as $officer)
                                        <option value="{{ $officer->id }}"
                                            @if (!empty($tags) && $tags == $officer->id) selected @endif>{{ $officer->full_name }}
                                        </option>
                                    @endforeach
                                </select> --}}
                                    @php
                                        $tags = [];
                                        $tags = implode(',', json_decode($blotter->officer_id));
                                        //return $data;
                                    @endphp
                                    {{-- <input name="officer_id[]" id="basic" value="{{ $tags }}" class="form-control"> --}}
                                     <textarea type="text" name="officer_id[]" class="form-control"
                                    rows="4" cols="50">
                                        {{ $tags }}
                                    </textarea>
                                {{-- <option value="">Select Officer</option> --}}
                                
                              {{--  @foreach ($officers as $officer)
                                    <option value="{{ $officer->full_name }}"
                                    @if (!empty($tags) && $tags == $officer->full_name) selected @endif>{{ $officer->full_name }}</option>
                                @endforeach --}}
                            </select>
                                {{-- <span class="text-danger">{{ $errors->first('officer') }}</span> --}}

                            </div>
                            <div class="form-group col-md-4">
                                <label class="">Time</label>
                                <input type="time" name="time" class="form-control"
                                    value="{{ $blotter->time }}" />
                                <span class="text-danger">{{ $errors->first('time') }}</span>

                            </div>

                            <div class="form-group col-md-4">
                                <label class="">Incident Type</label>
                                <select name="incident_type_id" id="" class="form-control">
                                    <option value="">Select Incident Type</option>
                                    @foreach ($incidents as $incident)
                                        <option value="{{ $incident->id }}"
                                            @if (!empty($blotter) && $blotter->incident_type_id == $incident->id) selected @endif>{{ $incident->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="">Job Final </label>
                                <select name="job_final_id" id="" class="form-control">
                                    <option value="">Select Job Final</option>
                                    @foreach ($jobs as $job)
                                        <option value="{{ $job->id }}"
                                            @if (!empty($blotter) && $blotter->job_final_id == $job->id) selected @endif>{{ $job->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- <div class="form-group col-md-4">
                                <label class="">Crimes</label>
                                <select name="crime_id" id="" class="form-control">
                                    <option value="">Select Crime</option>
                                    @foreach ($crimes as $crime)
                                        <option value="{{ $crime->id }}"
                                            @if (!empty($blotter) && $blotter->crime_id == $crime->id) selected @endif>{{ $crime->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div> --}}
                            <div class="form-group col-md-4">
                                <label class="">Requests</label>
                                <select name="person_request_id" id="" class="form-control">
                                    <option value="">Select Request</option>
                                    @foreach ($persons as $person)
                                        <option value="{{ $person->id }}"
                                            @if (!empty($blotter) && $blotter->person_request_id == $person->id) selected @endif>{{ $person->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="">Medical Requests</label>
                                <select name="medical_request_id" id="" class="form-control">
                                    <option value="">Select Medical Request</option>
                                    @foreach ($medicals as $medical)
                                        <option value="{{ $medical->id }}"
                                            @if (!empty($blotter) && $blotter->medical_request_id == $medical->id) selected @endif>{{ $medical->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="">Codes/Alarms</label>
                                <select name="code_alarm_id" id="" class="form-control">
                                    <option value="">Select Codes/Alarms</option>
                                    @foreach ($codes as $code)
                                        <option value="{{ $code->id }}"
                                            @if (!empty($blotter) && $blotter->code_alarm_id == $code->id) selected @endif>{{ $code->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="">Other</label>
                                <select name="other_id" id="" class="form-control">
                                    <option value="">Select Other</option>
                                    @foreach ($others as $other)
                                        <option value="{{ $other->id }}"
                                            @if (!empty($blotter) && $blotter->other_id == $other->id) selected @endif>{{ $other->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="">Building</label>
                                <select name="building_id" id="" class="form-control">
                                    <option value="">Select Building</option>
                                    @foreach ($buildings as $building)
                                        <option value="{{ $building->id }}"
                                            @if (!empty($blotter) && $blotter->building_id == $building->id) selected @endif>{{ $building->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="">Parking Lot</label>
                                <select name="parking_lot_id" id="" class="form-control">
                                    <option value="">Select Parking Lot</option>
                                    @foreach ($parkings as $parking)
                                        <option value="{{ $parking->id }}"
                                            @if (!empty($blotter) && $blotter->parking_lot_id == $parking->id) selected @endif>{{ $parking->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="">Area</label>
                                <select name="area_id" id="" class="form-control">
                                    <option value="">Select Area</option>
                                    @foreach ($areas as $area)
                                        <option value="{{ $area->id }}"
                                            @if (!empty($blotter) && $blotter->area_id == $area->id) selected @endif>{{ $area->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="">Comments</label>
                                <textarea type="text" name="comment" class="form-control">
                                    {{ $blotter->comment }}
                                </textarea>
                                <span class="text-danger">{{ $errors->first('comment') }}</span>

                            </div>
                            <div class="form-group offset-md-10 col-md-2 col-sm-12">
                                <button class="btn btn-primary" type="submit">Update</button>
                            </div>
                        </div>
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
        $('.js-example-basic-multiple').select2();
    });
</script>
@endpush
