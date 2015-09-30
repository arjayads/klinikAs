@extends('layouts.unify')

@section('title', isset($medicineId) ? 'Edit' : "New")

@section('content')
    <div ng-app="manageMedicine">
        <div ng-controller="editCtrl">
            <div>
                <h2 ng-cloak><% title %></h2>
            </div>

            <div class="hoz-space"></div>

            <form ng-submit="processForm()">
                <input type="hidden" ng-cloak ng-model="medicineId" ng-init="medicineId = {{$medicineId ?: 'undefined'}}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="genericName">Generic Name </label>
                            </div>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-building"></i></span>
                                    <input required="" placeholder="Enter generic name" type="text" id="genericName"
                                           name="genericName" class="form-control"
                                           ng-model="medicine.genericName">
                                </div>
                                <form-error err_field="errors.genericName"></form-error>
                            </div>
                        </div>

                        <div class="hoz-space"></div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="commercialName">Commercial Name</label>
                            </div>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-suitcase"></i></span>
                                    <input required=""  placeholder="Enter commercial name" type="text"
                                           id="commercialName"
                                           name="commercialName"
                                           class="form-control"
                                           ng-model="medicine.commercialName">
                                </div>
                                <form-error err_field="errors.commercialName"></form-error>
                            </div>
                        </div>

                        <div class="hoz-space"></div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="brand">Brand</label>
                            </div>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-building"></i></span>
                                    <input required="" placeholder="Enter brand" type="text" id="brand"
                                           name="brand" class="form-control"
                                           ng-model="medicine.brand">
                                </div>
                                <form-error err_field="errors.brand"></form-error>
                            </div>
                        </div>

                        <div class="hoz-space"></div>

                        <div class="row">
                            <div class="col-md-3">
                                <label for="unit">Unit</label>
                            </div>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-adjust"></i></span>
                                    <input ng-model="medicine.unitMeasure"
                                           type="text"  placeholder="Enter unit"
                                           class="input-sm form-control" id="unit">
                                </div>
                                <form-error err_field="errors.unitMeasure"></form-error>
                            </div>
                        </div>

                        <div class="hoz-space"></div>

                        <div class="row">
                            <div class="col-md-3">
                                <label for="instructions">Instructions</label>
                            </div>
                            <div class="col-md-9">
                                <textarea placeholder="Enter instructions"
                                          id="instructions"
                                          name="instructions"
                                          class="form-control"
                                          rows="6"
                                          ng-model="medicine.defaultInstructions"></textarea>
                            </div>
                        </div>
                        <div class="hoz-space"></div>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-9">
                                <fieldset ng-disabled="submitting">
                                    <button ng-cloak ng-mousedown="submit = true" type="submit" class="btn btn-primary">
                                        <span class="fa fa-save"></span>&nbsp;&nbsp;<%caption%></button>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop


@section('javascript')
    <script type="text/javascript" src="/js/app/directives/form-error.js"></script>
    <script type="text/javascript" src="/js/app/modules/manage-medicine.js"></script>
    <script type="text/javascript" src="/js/ui-grid/ui-grid.min.js"></script>
@stop