@extends('layouts.main')

@section('content')
<div class="container">
    <div class="section-body">
                            <div class="row">

                            <!-- BEGIN ALERT - REVENUE -->
                            <div class="col-md-3 col-sm-6">
                                <div class="card">
                                    <div class="card-body no-padding">
                                        <div class="alert alert-callout alert-info no-margin">
                                            <h1 class="pull-right text-info"><i class="md md-history"></i></h1>
                                            <strong class="text-xl">{{$pending->count()}}</strong><br/>
                                            <span class="opacity-50">Pending Certificates</span>
                                            <div class="stick-bottom-left-right">
                                                <div class="progress progress-hairline no-margin">
                                                    <div class="progress-bar progress-bar-info" style="width:100%"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--end .card-body -->
                                </div><!--end .card -->
                            </div><!--end .col -->
                            <!-- END ALERT - REVENUE -->

                            <!-- BEGIN ALERT - VISITS -->
                            <div class="col-md-3 col-sm-6">
                                <div class="card">
                                    <div class="card-body no-padding">
                                        <div class="alert alert-callout alert-warning no-margin">
                                        <h1 class="pull-right text-primary"><i class="md md-alarm-on"></i></h1>
                                            <strong class="text-xl">{{$processed->count()}}</strong><br/>
                                            <span class="opacity-50">Processed Certificates</span>
                                            <div class="stick-bottom-left-right">
                                                <div class="progress progress-hairline no-margin">
                                                    <div class="progress-bar progress-bar-primary" style="width:100%"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--end .card-body -->
                                </div><!--end .card -->
                            </div><!--end .col -->
                            <!-- END ALERT - VISITS -->

                            <!-- BEGIN ALERT - BOUNCE RATES -->
                            <div class="col-md-3 col-sm-6">
                                <div class="card">
                                    <div class="card-body no-padding">
                                        <div class="alert alert-callout alert-danger no-margin">
                                        <h1 class="pull-right text-danger"><i class="md md-error"></i></h1>
                                            <strong class="text-xl">{{$revoked->count()}}</strong><br/>
                                            <span class="opacity-50">Revoked Certificates</span>
                                            <div class="stick-bottom-left-right">
                                                <div class="progress progress-hairline no-margin">
                                                    <div class="progress-bar progress-bar-danger" style="width:100%"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--end .card-body -->
                                </div><!--end .card -->
                            </div><!--end .col -->
                            <!-- END ALERT - BOUNCE RATES -->

                            <!-- BEGIN ALERT - TIME ON SITE -->
                            <div class="col-md-3 col-sm-6">
                                <div class="card">
                                    <div class="card-body no-padding">
                                        <div class="alert alert-callout alert-success no-margin">
                                            <h1 class="pull-right text-success"><i class="md md-done-all"></i></h1>
                                            <strong class="text-xl">{{$approved->count()}}</strong><br/>
                                            <span class="opacity-50">Approved Certificates</span>
                                            <div class="stick-bottom-left-right">
                                                <div class="progress progress-hairline no-margin">
                                                    <div class="progress-bar progress-bar-success" style="width:100%"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--end .card-body -->
                                </div><!--end .card -->
                            </div><!--end .col -->
                            <!-- END ALERT - TIME ON SITE -->

                        </div><!--end .row -->
                    </div>
                    <!-- BEGIN SITE ACTIVITY -->
                            <div class="col-md-12">
                                <div class="card ">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="card-head">
                                                <header>Recent Applications</header>
                                            </div><!--end .card-head -->
                                            <div class="card-body height-8">
                                                <div id="flot-visitors-legend" class="flot-legend-horizontal stick-top-right no-y-padding">
                                                    @foreach($pending as $cert)

                                                    @endforeach
                                                </div>
                                                <div id="flot-visitors" class="flot height-7" data-title="Activity entry" data-color="#7dd8d2,#0aa89e"></div>
                                            </div><!--end .card-body -->
                                        </div><!--end .col -->
                                        <div class="col-md-4">
                                            <div class="card-head">
                                                <header>Overview</header>
                                            </div>
                                            <div class="card-body height-8">
                                                <strong>{{$certs->where('type', 'birth')->count()}}</strong> Birth Certificates
                                                <span class="pull-right text-success text-sm">0,18% <i class="md md-trending-up"></i></span>
                                                <div class="progress progress-hairline">
                                                    <div class="progress-bar progress-bar-primary-dark" style="width:43%"></div>
                                                </div>
                                                {{$certs->where('type', 'marriage')->count()}} Marriage Certificates
                                                <span class="pull-right text-success text-sm">0,68% <i class="md md-trending-up"></i></span>
                                                <div class="progress progress-hairline">
                                                    <div class="progress-bar progress-bar-primary-dark" style="width:11%"></div>
                                                </div>
                                                {{$certs->where('type', 'death')->count()}} Death Certificates
                                                <span class="pull-right text-danger text-sm">21,08% <i class="md md-trending-down"></i></span>
                                                <div class="progress progress-hairline">
                                                    <div class="progress-bar progress-bar-danger" style="width:93%"></div>
                                                </div>
                                                32,301 Users
                                                <span class="pull-right text-success text-sm">0,18% <i class="md md-trending-up"></i></span>
                                                <div class="progress progress-hairline">
                                                    <div class="progress-bar progress-bar-primary-dark" style="width:63%"></div>
                                                </div>
                                            </div><!--end .card-body -->
                                        </div><!--end .col -->
                                    </div><!--end .row -->
                                </div><!--end .card -->
                            </div><!--end .col -->
                            <!-- END SITE ACTIVITY -->
</div>
@endsection

