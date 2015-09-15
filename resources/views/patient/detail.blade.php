@extends('layouts.master')

@section('title', 'Patient Detail')

@section('content')
    <div ng-app="managePatient">
        <div ng-controller="detailCtrl">
            <div class="row">
                <div class="col-md-8">
                    <h2>Patient detail</h2>
                </div>
                <div class="col-md-4">
                    <a href="/patient/{{$patient->id}}/edit" class="btn btn-primary  pull-right" style="margin-top: 20px;">Edit</a>
                </div>
            </div>

            <div class="hoz-space"></div>
            <div class="row detail">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-3">
                            <label>First Name</label>
                        </div>
                        <div class="col-md-9">
                            <span>{{ $patient->firstName }}</span>
                        </div>
                    </div>

                    <div class="hoz-space"></div>
                    <div class="row">
                        <div class="col-md-3">
                            <label>Middle Name</label>
                        </div>
                        <div class="col-md-9">
                            <span>{{ $patient->middleName }}</span>
                        </div>
                    </div>

                    <div class="hoz-space"></div>
                    <div class="row">
                        <div class="col-md-3">
                            <label>Last Name</label>
                        </div>
                        <div class="col-md-9">
                            <span>{{ $patient->lastName }}</span>
                        </div>
                    </div>

                    <div class="hoz-space"></div>
                    <div class="row">
                        <div class="col-md-3">
                            <label>Date of Birth</label>
                        </div>
                        <div class="col-md-9">
                            <span>{{ $patient->birthDate }}</span>
                        </div>
                    </div>

                    <div class="hoz-space"></div>
                    <div class="row">
                        <div class="col-md-3">
                            <label>Sex</label>
                        </div>
                        <div class="col-md-9">
                            <span>{{ $patient->sex }}</span>
                        </div>
                    </div>

                    <div class="hoz-space"></div>
                    <div class="row">
                        <div class="col-md-3">
                            <label>Marital Status</label>
                        </div>
                        <div class="col-md-9">
                            <span>{{ $patient->maritalStatus }}</span>
                        </div>
                    </div>

                    <div class="hoz-space"></div>
                    <div class="row">
                        <div class="col-md-3">
                            <label>Date Added</label>
                        </div>
                        <div class="col-md-9">
                            <span>{{ $patient->createdAt }}</span>
                        </div>
                    </div>

                    <div class="hoz-space"></div>
                    <div class="row">
                        <div class="col-md-3">
                            <label>Last Updated</label>
                        </div>
                        <div class="col-md-9">
                            <span>{{ $patient->updatedAt }}</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-3">
                            <label>Addess</label>
                        </div>
                        <div class="col-md-9">
                            <span>{{ $patient->address }}</span>
                        </div>
                    </div>

                    <div class="hoz-space"></div>
                    <div class="row">
                        <div class="col-md-3">
                            <label>Telephone</label>
                        </div>
                        <div class="col-md-9">
                            <span>{{ $patient->telephone }}</span>
                        </div>
                    </div>

                    <div class="hoz-space"></div>
                    <div class="row">
                        <div class="col-md-3">
                            <label>Mobile Number</label>
                        </div>
                        <div class="col-md-9">
                            <span>{{ $patient->mobileNumber }}</span>
                        </div>
                    </div>

                    <div class="hoz-space"></div>
                    <div class="row">
                        <div class="col-md-3">
                            <label>Email</label>
                        </div>
                        <div class="col-md-9">
                            <span>{{ $patient->email }}</span>
                        </div>
                    </div>

                    <div class="hoz-space"></div>
                    <div class="row">
                        <div class="col-md-3">
                            <label>Remark</label>
                        </div>
                        <div class="col-md-9">
                            <span>{{ $patient->remark }}</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@stop


@section('javascript')
    <script type="text/javascript" src="/js/app/directives/form-error.js"></script>
    <script type="text/javascript" src="/js/app/modules/manage-patient.js"></script>
    <script type="text/javascript" src="/js/ui-grid/ui-grid.min.js"></script>

@stop