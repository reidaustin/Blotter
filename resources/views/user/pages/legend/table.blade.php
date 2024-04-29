@extends('user.layout.master')
@section('content')
@section('legend', 'active')
@section('title', 'Legend')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="card">
                <h5 class="card-header row">
                    <div class="col-md-10">
                        Legend
                    </div>
                </h5>
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover w-100">
                        <thead>
                            <tr>
                                <th>Legend</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <tr>
                                <td>Legend For Blotter Stats</td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <button class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#view">View</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            {{-- <tr>
                                <td>Legend For Blotter Stats</td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <button class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#view2">View</button>
                                        </div>
                                    </div>
                                </td>
                            </tr> --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="view" tabindex="-1" aria-labelledby="views" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="views">Legend For Blotter Stats</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="{{ asset('./assets/img/1.jpg') }}" class="w-100 h-100" />
                    <hr/>
                    <img src="{{ asset('./assets/img/2.jpg') }}" class="w-100 h-100" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="modal fade" id="view2" tabindex="-1" aria-labelledby="views2" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="views2">Legend For Blotter Stats</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="{{ asset('./assets/img/2.jpg') }}" class="w-100 h-100" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
