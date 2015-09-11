@extends('layouts.master')

@section('title', 'Patients')

@section('css')
    <link href="/css/ui-grid/ui-grid.min.css" rel="stylesheet" type="text/css">

    <style>
        .patient-list {
            width: 100%;
            height: 400px;
        }
    </style>
@stop

@section('content')
    <div  ng-app="managePatient">
        <div ng-controller="mainCtrl">
            <h2>Manage Patients</h2>
            <div ui-grid="gridOptions1" ui-grid-pagination class="patient-list"></div>
        </div>
    </div>
@stop


@section('javascript')
    <script type="text/javascript" src="/js/app/modules/manage-patient.js"></script>
    <script type="text/javascript" src="/js/ui-grid/ui-grid.min.js"></script>

@stop