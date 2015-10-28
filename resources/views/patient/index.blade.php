@extends('layouts.unify')

@section('title', 'Patients')

@section('css')
    <link href="/css/ui-grid/ui-grid.min.css" rel="stylesheet" type="text/css">

    <style>
        .patient-list {
            width: 100%;
            height: 520px;
        }
    </style>
@stop

@section('content')
    <div  ng-app="managePatient">
        <div ng-controller="mainCtrl">
            <h2 class="headline">Manage Patients</h2>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-7 col-lg-6">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-search"></i></span>
                        <input class="form-control" type="text" placeholder="Search here..." ng-model="query">
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-5 col-lg-6">
                    <a href="/patient/add" class="btn btn-primary pull-right">Add</a>
                </div>
            </div>
            <div class="hoz-space"></div>
            <div ui-grid="gridOptions1" ui-grid-pagination class="patient-list"></div>
        </div>
    </div>
@stop


@section('javascript')
    <script type="text/javascript" src="/js/app/directives/form-error.js"></script>
    <script type="text/javascript" src="/js/app/modules/manage-patient.js"></script>
    <script type="text/javascript" src="/js/ui-grid/ui-grid.min.js"></script>

@stop