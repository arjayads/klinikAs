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
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-2">
                        <p style="font-size: 19px;">Queue new patient</p>
                    </div>
                    <div class="col-md-4">
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
                    <div class="col-md-6" ng-hide="queue.length == 0">
                        <button  ng-click="resetQ()" class="btn-u btn-md pull-right">Reset</button>
                    </div>
                </div>
            </div>
            <div class="col-md-12 padding-top-5">
                <div class="panel panel-red margin-bottom-40">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-3">
                                <h3 class="panel-title"><i class="fa fa-user"></i> Current Queue</h3>
                            </div>
                            <div class="col-md-3 pull-right">
                                <input type="text" class="form-control"  placeholder="Filter list..." ng-model="qFilter">
                            </div>
                        </div>
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
                            <tr ng-cloak="" ng-hide="queue.length > 0">
                                <td colspan="5" style="text-align: center"><h4>No patients queued!</h4></td>
                            </tr>
                            <tr ng-cloak="" ng-repeat="q in queue | filter: qFilter">
                                <td><%$index+1%></td>
                                <td><%q.firstName%></td>
                                <td><%q.lastName%></td>
                                <td><%dateToMills(q.date) | date:'medium' %></td>
                                <td><button ng-click="removeFromQ(q.id, $index)" class="btn btn-success btn-xs"><i class="fa fa-check"></i> Done</button></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <div class="modal fade"
                 id="confirmResetModal"
                 tabindex="-1" role="dialog"
                 aria-labelledby="myLargeModalLabel"
                 aria-hidden="true">

                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Confirm</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row text-center">
                                <h3>You are about to reset patient queue.<br/>
                                    Do you want to continue?
                                </h3>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" ng-click="cancelResetQ()">Cancel</button>
                            <button ng-click="okResetQ()" type="button" class="btn btn-success">Okay</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade"
                 id="confirmDoneModal"
                 tabindex="-1" role="dialog"
                 aria-labelledby="myLargeModalLabel"
                 aria-hidden="true">

                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Confirm</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row text-center">
                                <h3>You are about to remove patient from queue.<br/>
                                    Do you want to continue?
                                </h3>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" ng-click="cancelDeQ()">Cancel</button>
                            <button ng-click="okDeQ()" type="button" class="btn btn-success">Okay</button>
                        </div>
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