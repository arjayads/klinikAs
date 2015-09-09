@extends('layouts.master')

@section('title', 'Home')

@section('content')
    <div  ng-app="home">
        <div ng-controller="mainCtrl">
            <h2 ng-cloak><% message %></h2>
        </div>
    </div>
@stop


@section('javascript')
<script type="text/javascript" src="/js/app/modules/home.js"></script>

@stop