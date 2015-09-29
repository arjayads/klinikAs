@extends('layouts.master')

@section('title', isset($patientId) ? 'Edit' : "New")

@section('content')
    <div ng-app="managePatient">
        <div ng-controller="editCtrl">
            <div>
                <h2 ng-cloak><% title %></h2>
            </div>

            <div class="hoz-space"></div>

            <form ng-submit="processForm()">
                <input type="hidden" ng-cloak ng-model="patientId" ng-init="patientId = {{$patientId ?: 'undefined'}}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="first_name">First Name </label>
                            </div>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input required="" placeholder="Enter first name" type="text" id="first_name"
                                           name="firstName" class="form-control"
                                           ng-model="patient.firstName">
                                </div>
                                <form-error err_field="errors.firstName"></form-error>
                            </div>
                        </div>

                        <div class="hoz-space"></div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="middle_name">Middle Name</label>
                            </div>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input placeholder="Enter middle name" type="text" id="middle_name"
                                           name="middleName"
                                           class="form-control"
                                           ng-model="patient.middleName">
                                </div>
                            </div>
                        </div>

                        <div class="hoz-space"></div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="last_name">Last Name</label>
                            </div>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input required="" placeholder="Enter last name" type="text" id="last_name"
                                           name="lastName" class="form-control"
                                           ng-model="patient.lastName">
                                </div>
                                <form-error err_field="errors.lastName"></form-error>
                            </div>
                        </div>

                        <div class="hoz-space"></div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="dob">Date of Birth</label>
                            </div>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input required="" ng-model="patient.birthDate" class="datepicker"
                                           type="text"  placeholder="Enter date of birth"
                                           class="input-sm form-control" id="dob">
                                </div>
                                <form-error err_field="errors.birthDate"></form-error>
                            </div>
                        </div>

                        <div class="hoz-space"></div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="sex">Sex</label>
                            </div>
                            <div class="col-md-5"  style="padding-right: 7px">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-magnet"></i></span>
                                    <select required="" id="sex" class="form-control" ng-model="patient.sex">
                                        <option value="">Select sex</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                <form-error err_field="errors.sex"></form-error>
                            </div>
                        </div>

                        <div class="hoz-space"></div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="occupation">Occupation</label>
                            </div>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-suitcase"></i></span>
                                    <input ng-model="patient.occupation"
                                           type="text"  placeholder="Enter occupation"
                                           class="input-sm form-control" id="occupation">
                                </div>
                                <form-error err_field="errors.occupation"></form-error>
                            </div>
                        </div>

                        <div class="hoz-space"></div>

                        <div class="row">
                            <div class="col-md-3">
                                <label for="contactNumber">Contact Number</label>
                            </div>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                    <input placeholder="Enter contact number" type="text" id="contactNumber"
                                           name="contactNumber" class="form-control"
                                           ng-model="patient.contactNumber">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">

                        <div class="row">
                            <div class="col-md-3">
                                <label for="fatherName">Father's Name</label>
                            </div>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user-md"></i></span>
                                    <input placeholder="Enter father's name" type="text" id="fatherName"
                                       name="fatherName" class="form-control"
                                       ng-model="patient.fatherName">
                                </div>
                                <form-error err_field="errors.fatherName"></form-error>
                            </div>
                        </div>

                        <div class="hoz-space"></div>
                        <div class="row">
                            <div class="col-md-3">
                                <label style="padding-top: 0" for="fatherOccupation">Father's Occupation</label>
                            </div>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-suitcase"></i></span>
                                    <input placeholder="Enter father's occupation" type="text" id="fatherOccupation"
                                           name="fatherOccupation" class="form-control"
                                           ng-model="patient.fatherOccupation">
                                </div>
                                <form-error err_field="errors.fatherOccupation"></form-error>
                            </div>
                        </div>

                        <div class="hoz-space"></div>

                        <div class="row">
                            <div class="col-md-3">
                                <label for="motherName">Mother's Name</label>
                            </div>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user-md"></i></span>
                                    <input placeholder="Enter mother's name" type="text" id="motherName"
                                           name="motherName" class="form-control"
                                           ng-model="patient.motherName">
                                </div>
                                <form-error err_field="errors.motherName"></form-error>
                            </div>
                        </div>

                        <div class="hoz-space"></div>
                        <div class="row">
                            <div class="col-md-3">
                                <label style="padding-top: 0" for="motherOccupation">Mother's Occupation</label>
                            </div>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-suitcase"></i></span>
                                    <input placeholder="Enter mother's occupation" type="text" id="motherOccupation"
                                           name="motherOccupation" class="form-control"
                                           ng-model="patient.motherOccupation">
                                </div>
                                <form-error err_field="errors.motherOccupation"></form-error>
                            </div>
                        </div>

                        <div class="hoz-space"></div>

                        <div class="row">
                            <div class="col-md-3">
                                <label for="address">Address</label>
                            </div>
                            <div class="col-md-9">
                                <textarea placeholder="Enter address" id="address" name="address" class="form-control" ng-model="patient.address"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hoz-space"></div>
                <div class="hoz-space"></div>
                <div class="hoz-space"></div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <fieldset ng-disabled="submitting">
                            <button ng-cloak ng-mousedown="submit = true" type="submit" class="btn btn-primary"><span class="fa fa-save"></span> <%caption%></button>
                        </fieldset>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop


@section('javascript')
    <script type="text/javascript" src="/js/app/directives/form-error.js"></script>
    <script type="text/javascript" src="/js/app/modules/manage-patient.js"></script>
    <script type="text/javascript" src="/js/ui-grid/ui-grid.min.js"></script>

    <script>
        $(function () {
            $('.datepicker').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true,
                format: "mm/dd/yyyy"
            });

            setDatePickerVal(new Date());
        })


    </script>
@stop