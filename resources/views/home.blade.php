@extends('layouts.main')

@section('content')
<div class="container">
    <div class="section-body">
                            <div class="row">

                            <!-- BEGIN ALERT - REVENUE -->
                            <div class="col-md-3 col-sm-6">
                                <div class="card">
                                    <div class="card-body no-padding">
                                        <div class="alert alert-callout alert-warning no-margin">
                                            <h1 class="pull-right text-warning"><i class="md md-history"></i></h1>
                                            <strong class="text-xl">{{$pending->count()}}</strong><br/>
                                            <span class="opacity-50">Pending Certificates</span>
                                            <div class="stick-bottom-left-right">
                                                <div class="progress progress-hairline no-margin">
                                                    <div class="progress-bar progress-bar-warning" style="width:100%"></div>
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
                                        <div class="alert alert-callout alert-info no-margin">
                                        <h1 class="pull-right text-info"><i class="md md-alarm-on"></i></h1>
                                            <strong class="text-xl">{{$processed->count()}}</strong><br/>
                                            <span class="opacity-50">Processed Certificates</span>
                                            <div class="stick-bottom-left-right">
                                                <div class="progress progress-hairline no-margin">
                                                    <div class="progress-bar progress-bar-info" style="width:100%"></div>
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
                            @php
                                $recent = $certs;
                                if (Auth::user()->hasRole('officcer')) {
                                    $recent = App\Entities\Certificate::where('status', 'processed')->orderBy('created_at', 'DESC')->get();
                                }
                                if (Auth::user()->hasRole('owner')) {
                                    $recent = App\Entities\Certificate::where('status', 'pending')->orderBy('created_at', 'DESC')->get();
                                }
                            @endphp
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
                                            <div class="card-body no-y-padding">
                                                <ul class="list divider-full-bleed">
                                                    @foreach($recent as $cert)
                                                    <li class="tile ink-reaction">
                                                        <div class="tile-text">
                                                            {{$cert->createdBy->name.', ['.ucfirst($cert->type).' Certificate]'}} &nbsp; &nbsp; {{$cert->updated_at->diffForHumans()}}
                                                            <small>
                                                            @if($cert->status == 'pending')
                                                                {{'Queued for processing'}}
                                                            @endif
                                                            @if($cert->status == 'processed')
                                                                {{'Processed! Awaiting final approval'}}
                                                            @endif
                                                            @if($cert->status == 'approved')
                                                                {{'Certificate is ready'}}
                                                            @endif
                                                            @if($cert->status == 'revoked')
                                                                {{'Certificate request revoked by Registrar'}}
                                                            @endif
                                                            @if($cert->status == 'declined')
                                                                {{'Certificate request declined view for more details '}}
                                                            @endif
                                                        </small>
                                                    </div>
                                                    @if($cert->approved)
                                                    <a class="btn btn-flat ink-reaction" href="{{route($cert->type.'.show', $cert->id)}}"><i class="md md-now-widgets"></i></a>
                                                    @endif
                                                    @if(! $cert->approved)
                                                    <a class="btn btn-flat ink-reaction" href="{{route($cert->type.'.application', $cert->id)}}"><i class="md md-question-answer"></i></a>
                                                    @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                            @if($recent->count() == 0)
                                            <div class="text-center">
                                                <i class="md md-forum" style="font-size: 120px"></i>
                                                <h3>There are no recent applications for certificates</h3>
                                            </div>
                                            @endif
                                        </div><!--end .card-body -->
                                        <div class="col-md-4">
                                            <div class="card-head">
                                                <header>Overview</header>
                                            </div>
                                            <div class="card-body height-8">
                                                <strong>{{$certs->where('type', 'birth')->count()}}</strong> Birth Certificates
                                                <span class="pull-right text-success text-sm"></span>
                                                <div class="progress progress-hairline">
                                                    <div class="progress-bar progress-bar-success" style="width:100%"></div>
                                                </div>
                                                {{$certs->where('type', 'marriage')->count()}} Marriage Certificates
                                                <span class="pull-right text-success text-sm"></span>
                                                <div class="progress progress-hairline">
                                                    <div class="progress-bar progress-bar-accent-dark" style="width:100%"></div>
                                                </div>
                                                {{$certs->where('type', 'death')->count()}} Death Certificates
                                                <span class="pull-right text-danger text-sm"></span>
                                                <div class="progress progress-hairline">
                                                    <div class="progress-bar progress-bar-danger" style="width:100%"></div>
                                                </div>
                                                @role('admin')
                                                {{App\User::count()}} Users
                                                <span class="pull-right text-success text-sm"></span>
                                                <div class="progress progress-hairline">
                                                    <div class="progress-bar progress-bar-primary-dark" style="width:100%"></div>
                                                </div>
                                                @endrole
                                            </div><!--end .card-body -->
                                        </div><!--end .col -->
                                    </div><!--end .row -->
                                </div><!--end .card -->
                            </div><!--end .col -->
                            <!-- END SITE ACTIVITY -->
</div>
@endsection

