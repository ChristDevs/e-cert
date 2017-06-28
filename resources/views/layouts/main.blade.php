<!DOCTYPE html>
<html lang="en">
	<head>
		<title>{{config('app.name')}} - Dashboard</title>

		<!-- BEGIN META -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="keywords" content="your,keywords">
		<meta name="description" content="Short explanation about this website">
		<!-- END META -->

		<!-- BEGIN STYLESHEETS -->
		<link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
		<link type="text/css" rel="stylesheet" href="{{asset('css/app.css')}}" />
		<link type="text/css" rel="stylesheet" href="{{asset('assets/theme-default/font-awesome.min.css')}}" />
		<link type="text/css" rel="stylesheet" href="{{asset('assets/theme-default/material-design-iconic-font.min.css')}}" />
		<!-- END STYLESHEETS -->
		@stack('css')

		<!-- HTML5 shim and Respond.js')}} IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script type="text/javascript" src="{{asset('assets/libs/utils/html5shiv.js')}}?1403934957"></script>
		<script type="text/javascript" src="{{asset('assets/libs/utils/respond.min.js')}}?1403934956"></script>
		<![endif]-->
		 <script>
			window.Laravel = {!! json_encode([
				'csrfToken' => csrf_token(),
			]) !!};
		</script>
	</head>
	<body class="menubar-hoverable menubar-pin header-fixed ">

		<!-- BEGIN HEADER-->
		<header id="header" >
			<div class="headerbar">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="headerbar-left">
					<ul class="header-nav header-nav-options">
						<li class="header-nav-brand" >
							<div class="brand-holder">
								<a href="../../html/dashboards/dashboard.html">
									<span class="text-lg text-bold text-primary">{{config('app.name')}}</span>
								</a>
							</div>
						</li>
						<li>
							<a class="btn btn-icon-toggle menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
								<i class="fa fa-bars"></i>
							</a>
						</li>
					</ul>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="headerbar-right">
					<ul class="header-nav header-nav-options">
						<li>
							<!-- Search form -->
							<form class="navbar-search" role="search">
								<div class="form-group">
									<input type="text" class="form-control" name="headerSearch" placeholder="Enter your keyword">
								</div>
								<button type="submit" class="btn btn-icon-toggle ink-reaction"><i class="fa fa-search"></i></button>
							</form>
						</li>
						<li class="dropdown hidden-xs">
							<a href="javascript:void(0);" class="btn btn-icon-toggle btn-default" data-toggle="dropdown">
								<i class="fa fa-bell"></i><sup class="badge style-danger">{{Auth::user()->unreadNotifications()->count()}}</sup>
							</a>
							<ul class="dropdown-menu animation-expand">
								<li class="dropdown-header">Notifications</li>
								@foreach(Auth::user()->unreadNotifications->take(3)->all() as $notification)
								@php
									$notification = new class($notification) {
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

									}
								@endphp
								<li>
									<a class="alert alert-callout alert-{{$notification->data->alert}}" href="javascript:void(0);">
										<img class="pull-right img-circle dropdown-avatar" src="{{asset('assets/img/avatar1.jpg')}}" alt="" />
										<strong>{{$notification->data->type}} Certificate</strong><br/>
										<small>{{$notification->data->title}}</small>
									</a>
								</li>
								@endforeach
								<li class="dropdown-header">Options</li>
								<li><a href="{{url('notifications')}}">View all messages <span class="pull-right"><i class="fa fa-arrow-right"></i></span></a></li>
								<li><a href="{{url('notifications/mark-as-read')}}">Mark as read <span class="pull-right"><i class="fa fa-arrow-right"></i></span></a></li>
							</ul><!--end .dropdown-menu -->
						</li><!--end .dropdown -->
						<li class="dropdown hidden-xs">
							<a href="javascript:void(0);" class="btn btn-icon-toggle btn-default" data-toggle="dropdown">
								<i class="fa fa-area-chart"></i>
							</a>
							<ul class="dropdown-menu animation-expand">
								<li class="dropdown-header">Server load</li>
								<li class="dropdown-progress">
									<a href="javascript:void(0);">
										<div class="dropdown-label">
											<span class="text-light">Server load <strong>Today</strong></span>
											<strong class="pull-right">93%</strong>
										</div>
										<div class="progress"><div class="progress-bar progress-bar-danger" style="width: 93%"></div></div>
									</a>
								</li><!--end .dropdown-progress -->
								<li class="dropdown-progress">
									<a href="javascript:void(0);">
										<div class="dropdown-label">
											<span class="text-light">Server load <strong>Yesterday</strong></span>
											<strong class="pull-right">30%</strong>
										</div>
										<div class="progress"><div class="progress-bar progress-bar-success" style="width: 30%"></div></div>
									</a>
								</li><!--end .dropdown-progress -->
								<li class="dropdown-progress">
									<a href="javascript:void(0);">
										<div class="dropdown-label">
											<span class="text-light">Server load <strong>Lastweek</strong></span>
											<strong class="pull-right">74%</strong>
										</div>
										<div class="progress"><div class="progress-bar progress-bar-warning" style="width: 74%"></div></div>
									</a>
								</li><!--end .dropdown-progress -->
							</ul><!--end .dropdown-menu -->
						</li><!--end .dropdown -->
					</ul><!--end .header-nav-options -->
					<ul class="header-nav header-nav-profile">
						<li class="dropdown">
							<a href="javascript:void(0);" class="dropdown-toggle ink-reaction" data-toggle="dropdown">
								<img src="{{asset('assets/img/avatar1.jpg')}}?1403934956" alt="" />
								<span class="profile-info">
									{{Auth::user()->name}}
									<small>{{Auth::user()->email}}</small>
								</span>
							</a>
							<ul class="dropdown-menu animation-dock">
								<li><a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
										<i class="fa fa-fw fa-power-off text-danger"></i>
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form></li>
							</ul><!--end .dropdown-menu -->
						</li><!--end .dropdown -->
					</ul><!--end .header-nav-profile -->
				</div><!--end #header-navbar-collapse -->
			</div>
		</header>
		<!-- END HEADER-->

		<!-- BEGIN BASE-->
		<div id="base">

			<!-- BEGIN OFFCANVAS LEFT -->
			<div class="offcanvas">
			</div><!--end .offcanvas-->
			<!-- END OFFCANVAS LEFT -->

			<!-- BEGIN CONTENT-->
			<div id="content">
				<section id="app">
					@include('partials.messages')
					@yield('content')
				</section>
			</div><!--end #content-->
			<!-- END CONTENT -->
			@include('partials.mainnav')

		</div><!--end #base-->
		<!-- END BASE -->

		<!-- BEGIN JAVASCRIPT -->
		<script src="{{asset('js/app.js')}}"></script>
		<script src="{{asset('js/core.js')}}"></script>
		<script src="{{asset('assets/libs/spin.js/spin.min.js')}}"></script>
		<script src="{{asset('assets/libs/autosize/jquery.autosize.min.js')}}"></script>
		<script src="{{asset('assets/libs/moment/moment.min.js')}}"></script>
		@if(isset($charts))
		<script src="{{asset('assets/libs/flot/jquery.flot.min.js')}}"></script>
		<script src="{{asset('assets/libs/flot/jquery.flot.time.min.js')}}"></script>
		<script src="{{asset('assets/libs/flot/jquery.flot.resize.min.js')}}"></script>
		<script src="{{asset('assets/libs/flot/jquery.flot.orderBars.js')}}"></script>
		<script src="{{asset('assets/libs/flot/jquery.flot.pie.js')}}"></script>
		<script src="{{asset('assets/libs/flot/curvedLines.js')}}"></script>
		<script src="{{asset('assets/libs/jquery-knob/jquery.knob.min.js')}}"></script>
		<script src="{{asset('assets/libs/sparkline/jquery.sparkline.min.js')}}"></script>
		<script src="{{asset('assets/libs/d3/d3.min.js')}}"></script>
		<script src="{{asset('assets/libs/d3/d3.v3.js')}}"></script>
		<script src="{{asset('assets/libs/rickshaw/rickshaw.min.js')}}"></script>
		@endif
		<script src="{{asset('assets/libs/nanoscroller/jquery.nanoscroller.min.js')}}"></script>
		<div class="modal fade" id="ajaxModal" tabindex="-1" role="dialog" aria-hidden="true">
		</div>
		@stack('scripts')
		<!-- END JAVASCRIPT -->
		<script>
			$('.ajaxModal').on('click',  function(e){
				e.preventDefault();
				var modal = $('#ajaxModal');
				url = $(this).attr('href');
				modal.load(url, function(response){

				});
				modal.modal('show');
			});
		</script>


	</body>
</html>
