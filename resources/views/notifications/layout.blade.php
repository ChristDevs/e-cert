@extends('layouts.main')
	@section('content')
							<!-- BEGIN INBOX -->
				<div class="has-actions style-default-bright">
					<div class="section-body">
						<div class="row">
							<div class="col-sm-10 col-md-11 col-lg-12">
								<div class="text-divider visible-xs"><span>Email list</span></div>
								<div class="row">
									@php
												$callback = function($alert) {
													return new class($alert) {
														public $notification;


														public function __construct($notification)
														{
															$this->data = new class($notification){
																public function __construct($notification)
																{
																	$this->data = (object) $notification->data;
																}
																public function __get($val)
																{
																	return $this->data->{$val} ?? null;
																}

															};
															$this->notification = $notification;
														}
														public function __get($val)
														{
															return $this->notification->{$val};
														}
													};
												};
											@endphp
									<!-- BEGIN INBOX EMAIL LIST -->
									<div class="col-md-5 col-lg-4 height-6 scroll-sm">
										<div class="list-group list-email list-gray">
											@foreach(Auth::user()->notifications as $alert)
											@php
												$alert = $callback($alert);
											@endphp
											<a href="{{ route('notifications.show', $alert->id) }}" class="list-group-item {{isset($notification) && $notification->id == $alert->id ? 'focus' : ''}}">
											@if($alert->read_at == null)
												<div class="stick-top-left small-padding"><i class="fa fa-dot-circle-o text-info"></i></div>
											@endif
												<h5>{{ucwords($alert->data->type)}} Certificate</h5>
												<h4>{{ucwords($alert->data->title)}}</h4>
												<div class="stick-top-right small-padding text-default-light text-sm">{{$alert->created_at->diffForHumans()}}</div>
											</a>
											@endforeach
										</div><!--end .list-group -->
									</div><!--end .col -->
									<!-- END INBOX EMAIL LIST -->

									<!-- BEGIN EMAIL CONTENT -->
									<div class="col-md-6 col-lg-7">
										@if(isset($notification))
										@php
											$notification = $callback($notification);
										@endphp
										<div class="text-divider hidden-md hidden-lg"><span>Alert</span></div>
										<h2 class="small-y-padding">{{$notification->data->title}}</h2>
										<div class="btn-group stick-top-right">
											<a href="{{ route('notifications.delete', $notification->id) }}" class="btn btn-icon-toggle btn-default"><i class="md md-delete"></i></a>
										</div>
										<span class="pull-right text-default-light">{{$notification->created_at->diffForHumans()}}</span>
										<strong>{{ucfirst($notification->data->type)}} Certificate</strong>
										<hr/>
										<p>{{$notification->data->message}}</p>
										@endif
									</div><!--end .col -->
									<!-- END EMAIL CONTENT -->

								</div><!--end .row -->
							</div><!--end .col -->
						</div><!--end .row -->
					</div><!--end .section-body -->
					<!-- END INBOX -->
				</div>
	@endsection