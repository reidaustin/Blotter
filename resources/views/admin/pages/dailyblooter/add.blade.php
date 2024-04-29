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
            <form action="{{ route('admin.store.blotter') }}" method="post" class="row">
                @csrf
                <input type="hidden" name="tour_id" value="{{ $tour->id }}">
                <input type="hidden" name="tour_date" value="{{ $tour->tour_date }}">
                <input type="hidden" name="" value="{{ $entry_number }}">
                @if ($tour->tour_name == '12-8')
                    <input type="hidden" name="serial_numbers">
                @endif

                @if ($tour->tour_name == '8-4')
                    <input type="hidden" name="serial_numbers_2">
                @endif

                @if ($tour->tour_name == '4-12')
                    <input type="hidden" name="serial_numbers_3">
                @endif




                <div class="card">
                    <div class="card-body row">
                        <div class="form-group col-md-12">
                            <h5>Incident</h5>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="">Entry Number</label>
                            {{-- @php
                                for ($i = 1; $i <= 10; $i++) {
                                    //echo $i . ' ';
                                }
                                $numbers = [];
                                for ($i = 1; $i <= 100; $i++) {
                                    $numbers[] = $i;
                                }
                            @endphp --}}
                                <input type="number" name="entry_number" class="form-control"
                                />


                            <span class="text-danger">{{ $errors->first('entry_number') }}</span>

                        </div>
                        <div class="form-group col-md-4">
                            <label class="">Time</label>
                            <input type="time" name="time" class="form-control" />
                            <span class="text-danger">{{ $errors->first('time') }}</span>

                        </div>
                        <div class="form-group col-md-4 ">
                            <label class="">Officers:</label>
                            <select class="js-example-basic-multiple form-control"
                                multiple="multiple"name="officer_id[]">
                                {{-- <option value="">Select Officer</option> --}}
                                @foreach ($officers as $officer)
                                    <option value="{{ $officer->full_name }}">{{ $officer->full_name }}</option>
                                @endforeach
                            </select>

                            {{-- <span class="text-danger">{{ $errors->first('officer') }}</span> --}}

                        </div>

                        <div class="form-group col-md-4">
                            <label class="">Incident Type</label>
                            <select name="incident_type_id" id="" class="form-control">
                                {{-- <option value="">Select Incident Type</option> --}}
                                @foreach ($incidents as $incident)
                                    <option value="{{ $incident->id }}">{{ $incident->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="">Job Final </label>
                            <select name="job_final_id" id="" class="form-control">
                                {{-- <option value="">Select Job Final</option> --}}
                                @foreach ($jobs as $job)
                                    <option value="{{ $job->id }}">{{ $job->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- <div class="form-group col-md-4">
                            <label class="">Crimes</label>
                            <select name="crime_id" id="" class="form-control">
                                <option value="">Select Crime</option>
                                @foreach ($crimes as $crime)
                                    <option value="{{ $crime->id }}">{{ $crime->name }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                        <div class="form-group col-md-4">
                            <label class="">Requests</label>
                            <select name="person_request_id" id="" class="form-control">
                                {{-- <option value="">Select Request</option> --}}
                                @foreach ($persons as $person)
                                    <option value="{{ $person->id }}">{{ $person->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="">Medical Requests</label>
                            <select name="medical_request_id" id="" class="form-control">
                                {{-- <option value="">Select Medical Request</option> --}}
                                @foreach ($medicals as $medical)
                                    <option value="{{ $medical->id }}">{{ $medical->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="">Codes/Alarms</label>
                            <select name="code_alarm_id" id="" class="form-control">
                                {{-- <option value="">Select Codes/Alarms</option> --}}
                                @foreach ($codes as $code)
                                    <option value="{{ $code->id }}">{{ $code->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="">Other</label>
                            <select name="other_id" id="" class="form-control">
                                {{-- <option value="">Select Other</option> --}}
                                @foreach ($others as $other)
                                    <option value="{{ $other->id }}">{{ $other->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="">Building</label>
                            <select name="building_id" id="" class="form-control">
                                {{-- <option value="">Select Building</option> --}}
                                @foreach ($buildings as $building)
                                    <option value="{{ $building->id }}">{{ $building->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="">Parking Lot</label>
                            <select name="parking_lot_id" id="" class="form-control">
                                {{-- <option value="">Select Parking Lot</option> --}}
                                @foreach ($parkings as $parking)
                                    <option value="{{ $parking->id }}">{{ $parking->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="">Area</label>
                            <select name="area_id" id="" class="form-control">
                                {{-- <option value="">Select Area</option> --}}
                                @foreach ($areas as $area)
                                    <option value="{{ $area->id }}">{{ $area->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="">Comments</label>
                            <textarea type="text" name="comment" class="form-control">
                             </textarea>
                            <span class="text-danger">{{ $errors->first('comment') }}</span>

                        </div>
                        <div class="form-group offset-md-10 col-md-2 col-sm-12">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </div>
                </div>
        </div>
        </form>
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
