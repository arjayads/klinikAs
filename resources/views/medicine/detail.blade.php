@extends('layouts.unify')

@section('title', 'Medicine Detail')

@section('content')
    <div ng-app="manageMedicine">
        <div ng-controller="detailCtrl">
            <div class="row">
                <div class="col-md-8">
                    <h2>Medicine detail</h2>
                </div>
                <div class="col-md-4">
                    <a href="/medicine/{{$medicine->id}}/edit" class="btn btn-primary  pull-right" style="margin-top: 20px;">Edit</a>
                </div>
            </div>

            <div class="hoz-space"></div>
            <div class="row detail">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-3">
                            <label>Generic Name</label>
                        </div>
                        <div class="col-md-9">
                            <span>{{ $medicine->genericName }}</span>
                        </div>
                    </div>

                    <div class="hoz-space"></div>
                    <div class="row">
                        <div class="col-md-3">
                            <label>Commercial Name</label>
                        </div>
                        <div class="col-md-9">
                            <span>{{ $medicine->commercialName }}</span>
                        </div>
                    </div>

                    <div class="hoz-space"></div>
                    <div class="row">
                        <div class="col-md-3">
                            <label>Brand</label>
                        </div>
                        <div class="col-md-9">
                            <span>{{ $medicine->brand }}</span>
                        </div>
                    </div>

                    <div class="hoz-space"></div>
                    <div class="row">
                        <div class="col-md-3">
                            <label>Unit</label>
                        </div>
                        <div class="col-md-9">
                            <span>{{ $medicine->unitMeasure }}</span>
                        </div>
                    </div>

                    <div class="hoz-space"></div>
                    <div class="row">
                        <div class="col-md-3">
                            <label>Instructions</label>
                        </div>
                        <div class="col-md-9">
                            <p>{{ $medicine->defaultInstructions }}</p>
                        </div>
                    </div>

                    <div class="hoz-space"></div>
                    <div class="row">
                        <div class="col-md-3">
                            <label>Date Added</label>
                        </div>
                        <div class="col-md-9">
                            <span>{{ $medicine->createdAt }}</span>
                        </div>
                    </div>

                    <div class="hoz-space"></div>
                    <div class="row">
                        <div class="col-md-3">
                            <label>Last Updated</label>
                        </div>
                        <div class="col-md-9">
                            <span>{{ $medicine->updatedAt }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop


@section('javascript')
    <script type="text/javascript" src="/js/app/directives/form-error.js"></script>
    <script type="text/javascript" src="/js/app/modules/manage-medicine.js"></script>
    <script type="text/javascript" src="/js/ui-grid/ui-grid.min.js"></script>

@stop