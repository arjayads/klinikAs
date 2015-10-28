@extends('layouts.unify')

@section('title', 'Dashboard')

@section('css')
    <link href="/css/autocomplete/angucomplete-alt.css" rel="stylesheet">
    <style>
        .angucomplete-dropdown {
            width: 100% !important;
            margin-top: -1px !important;
            overflow-y: auto;
            max-height: 200px;
        }
    </style>
@stop

@section('content')
    <div ng-app="dashboard">
        <h2 class="headline">Dashboard</h2>
        <div class="row" ng-controller="queueCtrl">
            <div class="col-md-12">
                <div class="col-md-1 no-padding">
                    <h4>Filter List</h4>
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control"  placeholder="Type here..." ng-model="qFilter">
                </div>
                <div class="col-md-3">
                    <h4 class="pull-right">Queue new patient</h4>
                </div>
                <div class="col-md-4 no-padding pull-right">
                        <div angucomplete-alt
                             id="qPatient"
                             placeholder="Search patient..."
                             pause="500"
                             selected-object="selectedPatient"
                             remote-url="/patient/find"
                             remote-url-request-formatter="remoteUrlRequestFn"
                             title-field="firstName,lastName"
                             input-class="form-control form-control-small"
                             minlength="2"
                             match-class="highlight">
                        </div>
                </div>
            </div>
            <div class="col-md-12 padding-top-5">
                <div class="panel panel-red margin-bottom-40">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-user"></i> Current Queue</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th>First Name</th>
                                <th class="hidden-sm">Last Name</th>
                                <th width="20%">Date Set</th>
                                <th width="10%"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr ng-cloak="" ng-repeat="q in queue | filter: qFilter">
                                <td><%$index+1%></td>
                                <td><%q.firstName%></td>
                                <td><%q.lastName%></td>
                                <td><%q.date%></td>
                                <td><button class="btn btn-success btn-xs"><i class="fa fa-check"></i> Done</button></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop


@section('javascript')
    <script type="text/javascript" src="/js/app/modules/dashboard.js"></script>
    <script type="text/javascript" src="/js/autocomplete/angucomplete-alt.min.js"></script>
@stop