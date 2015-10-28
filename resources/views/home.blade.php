@extends('layouts.unify')

@section('title', 'Dashboard')

@section('css')
@stop

@section('content')
    <h2 class="headline">Dashboard</h2>
    <div class="row">
        <div class="col-md-12">

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
                        <tr>
                            <td>1</td>
                            <td>Mark</td>
                            <td class="hidden-sm">Otto</td>
                            <td>July 17, 2015 2:45 PM</td>
                            <td><button class="btn btn-success btn-xs"><i class="fa fa-check"></i> Done</button></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop


@section('javascript')
    <script type="text/javascript" src="/js/app/modules/dashboard.js"></script>
@stop