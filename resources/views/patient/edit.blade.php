@extends('layouts.master')

@section('title', 'Patient Detail')

@section('content')
    <div ng-app="managePatient">
        <div ng-controller="editCtrl">
            <div>
                <h2>Edit Patient</h2>
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
                            <div class="col-md-9">
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
                                <label for="mstatus">Marital Status</label>
                            </div>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-magnet"></i></span>
                                    <select required="" id="mstatus" class="form-control" ng-model="patient.maritalStatus">
                                        <option value="">Select status</option>
                                        <option value="Married">Married</option>
                                        <option value="Single">Single</option>
                                    </select>
                                </div>
                                <form-error err_field="errors.maritalStatus"></form-error>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="address">Addess</label>
                            </div>
                            <div class="col-md-9">
                                <textarea placeholder="Enter address" id="address" name="address" class="form-control" ng-model="patient.address"></textarea>
                            </div>
                        </div>

                        <div class="hoz-space"></div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="telephone">Telephone</label>
                            </div>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                    <input placeholder="Enter telephone number" type="text" id="telephone"
                                           name="telephone" class="form-control"
                                           ng-model="patient.telephone">
                                </div>
                            </div>
                        </div>

                        <div class="hoz-space"></div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="mobile">Mobile Number</label>
                            </div>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                    <input placeholder="Enter mobile number" type="text" id="mobile"
                                       name="mobileNumber" class="form-control"
                                       ng-model="patient.mobileNumber">
                                </div>
                            </div>
                        </div>

                        <div class="hoz-space"></div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="email">Email</label>
                            </div>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input placeholder="Enter email" type="text" id="email"
                                           name="email" class="form-control"
                                           ng-model="patient.email">
                                </div>
                                <form-error err_field="errors.email"></form-error>
                            </div>
                        </div>

                        <div class="hoz-space"></div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="remark">Remark</label>
                            </div>
                            <div class="col-md-9">
                                <textarea placeholder="Write remark" id="remark" name="remark" class="form-control" ng-model="patient.remark"></textarea>
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
        })


    </script>
@stop