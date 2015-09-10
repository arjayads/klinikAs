@extends('layouts.master')

@section('title', 'Patients')

@section('content')
    <div  ng-app="managePatient">
        <div ng-controller="mainCtrl">
            <h2>Manage Patients</h2>
        </div>
    </div>
@stop


@section('javascript')
    <script type="text/javascript" src="/js/app/modules/manage-patient.js"></script>

@stop