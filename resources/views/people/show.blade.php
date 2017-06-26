@extends('layouts.main')
    @section('content')
        <div class="section-body">
						<div class="card">

							<!-- BEGIN CONTACT DETAILS HEADER -->
							<div class="card-head style-primary">
								<div class="tools pull-left">
									<strong class="h4" style="font-weight:bold;"> &nbsp; &nbsp; PERSON PROFILE</strong>
								</div><!--end .tools -->
							</div><!--end .card-head -->
							<!-- END CONTACT DETAILS HEADER -->

							<!-- BEGIN CONTACT DETAILS -->
							<div class="card-tiles">
								<div class="hbox-md col-md-12">
									<div class="hbox-column col-md-9">
										<div class="row">

											<!-- BEGIN CONTACTS MAIN CONTENT -->
											<div class="col-sm-12">
												<div class="margin-bottom-xxl">
													<div class="pull-left width-3 clearfix hidden-xs">
														<img class="img-circle size-2" src="{{asset('assets/img/avatar1.jpg')}}" alt="" />
													</div>
													<h1 class="text-light no-margin">{{$person->fullname}}</h1>
													<h5>
														{{ucwords($person->residence)}}
													</h5>
													&nbsp;&nbsp;
												</div><!--end .margin-bottom-xxl -->
												<ul class="nav nav-tabs" data-toggle="tabs">
													<li class="active"><a href="#notes">Certificates</a></li>
												</ul>
												<div class="tab-content">

													<!-- BEGIN CONTACTS NOTES -->
													<div class="tab-pane active" id="notes">
														<div class="card">
															<div class="card-body no-padding">
																<ul class="list">
																@foreach($person->certificates as $cert)
																	<li class="tile">
																		<div class="tile-text">
																				{{$cert->person->fullname.', ['.ucfirst($cert->type).' Certificate]'}}
																				<small>
																					@if($cert->status == 'pending')
																					    {{'Queued for processing'}}
																					@endif
																					@if($cert->status == 'processed')
																						{{! 'Processed! Awaiting final approval'}}
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
																		</a>
																		<a class="btn btn-flat ink-reaction dropdown dropdown-toggle" data-toggle="dropdown">
																	        <i class="fa fa-ellipsis-v"></i>
																		</a>
																	    <ul class="dropdown-menu pull-right">
																	    @if($cert->approved)
																			<li><a href="{{route('birth.show', $cert->id)}}"><i class="md md-now-widgets"></i> &nbsp; View Certificate</a></li>
																		@endif
																		@if(! $cert->approved)
																			<li><a href="{{route('birth.application', $cert->id)}}"><i class="md md-question-answer"></i> &nbsp; View Application</a></li>
																		@endif
																		@role(['officer', 'owner'])
																		    <li><a href="{{ route('birth.edit', $cert->id) }}"><i class="md md-spellcheck"></i> &nbsp; Process</a></li>
																		@endrole
																			@if($cert->files->count() > 0)
																			<li><a href="{{route('cert.attachments', $cert->id)}}" class="ajaxModal"><i class="md md-attachment"></i> &nbsp; Attached Documents</a></li>
																			@endif
																	    </ul>
																	</li>
																@endforeach
																</ul>
															</div><!--end .card-body -->
														</div>
													</div><!--end #notes -->

											</div><!--end .tab-content -->
										</div><!--end .col -->
										<!-- END CONTACTS MAIN CONTENT -->

									</div><!--end .row -->
								</div><!--end .hbox-column -->

								<!-- BEGIN CONTACTS COMMON DETAILS -->
								<div class="hbox-column col-md-3 style-default-light">
									<div class="row">
										<div class="col-xs-12">
											<h4>Short info</h4>
											<br/>
											<dl class="dl-horizontal dl-icon">
												<dt><span class="md md-account-child fa-2x"></span></dt>
												<dd>
													<span class="opacity-50">Parents</span><br/>
													<span class="text-medium"><strong>Father : </strong> {{$person->name_of_father}}</span></br>
													<span class="text-medium"><strong>Mother : </strong> {{$person->name_of_mother}}t</span>
												</dd>
												<dt><span class="fa fa-fw fa-gift fa-lg opacity-50"></span></dt>
												<dd>
													<span class="opacity-50">Birthday</span><br/>
													<span class="text-medium">{{$person->dob}}</span>
												</dd>
											</dl><!--end .dl-horizontal -->
											<br/>
											<h4>Contact info</h4>
											<br/>
											<dl class="dl-horizontal dl-icon">
												<dt><span class="fa fa-fw fa-mobile fa-lg opacity-50"></span></dt>
												<dd>
													<span class="opacity-50">Phone</span><br/>
													<span class="text-medium">{{$person->phone}}</span> &nbsp;<span class="opacity-50">Primary</span><br/>
													<span class="text-medium">{{$person->mobile}}</span> &nbsp;<span class="opacity-50">Mobile</span>
												</dd>
												<dt><span class="fa fa-fw fa-envelope-square fa-lg opacity-50"></span></dt>
												<dd>
													<span class="opacity-50">Email</span><br/>
													<a class="text-medium" href="../../../html/mail/compose.html">{{$person->email}}</a>
												</dd>
												<dt><span class="fa fa-fw fa-location-arrow fa-lg opacity-50"></span></dt>
												<dd>
													<span class="opacity-50">Address</span><br/>
													<span class="text-medium">
														{{$person->street}}<br/>
														{{$person->city.', '.$person->zip}}<br/>
														Kenya
													</span>
												</dd>
												<dd class="full-width"><div id="map-canvas" class="border-white border-xl height-5"></div></dd>
											</dl><!--end .dl-horizontal -->
										</div><!--end .col -->
									</div><!--end .row -->
								</div><!--end .hbox-column -->
								<!-- END CONTACTS COMMON DETAILS -->

							</div><!--end .hbox-md -->
						</div><!--end .card-tiles -->
						<!-- END CONTACT DETAILS -->

					</div><!--end .card -->
				</div><!--end .section-body -->
    @endsection