			<!-- BEGIN MENUBAR-->
			<div id="menubar" class="menubar-inverse ">
				<div class="menubar-fixed-panel">
					<div>
						<a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
							<i class="fa fa-bars"></i>
						</a>
					</div>
					<div class="expanded">
						<a href="{{url('home')}}">
							<span class="text-lg text-bold text-primary ">{{config('app.name')}}</span>
						</a>
					</div>
				</div>
				<div class="menubar-scroll-panel">

					<!-- BEGIN MAIN MENU -->
					<ul id="main-menu" class="gui-controls">

						<!-- BEGIN DASHBOARD -->
						<li>
							<a href="{{url('home')}}" class="{{isActive('home')}}">
								<div class="gui-icon"><i class="md md-home"></i></div>
								<span class="title">Dashboard</span>
							</a>
						</li><!--end /menu-li -->
						<!-- END DASHBOARD -->

						
						<!-- BEGIN DASHBOARD -->
						<li>
							<a href="{{route('people.index')}}"  class="{{isActive('people*')}}">
								<div class="gui-icon"><i class="md md-face-unlock"></i></div>
								<span class="title">People</span>
							</a>
						</li><!--end /menu-li -->
						<!-- END DASHBOARD -->
						<!-- BEGIN EMAIL -->
						<li class="gui-folder">
							<a>
								<div class="gui-icon"><i class="md md-watch"></i></div>
								<span class="title">Birth Certificates</span>
							</a>
							<!--start submenu -->
							<ul>
								<li><a href="{{route('birth.create')}}"  class="{{isActive('birth/create')}}"><span class="title">Apply </span></a></li>
								<li><a href="{{route('birth.index')}}" class="{{isActive('birth')}}" ><span class="title">View Applicatons</span></a></li>
							<!--	
							<li><a href="../../html/mail/reply.html" ><span class="title">Reply</span></a></li>
								<li><a href="../../html/mail/message.html" ><span class="title">View message</span></a></li>
								-->
							</ul><!--end /submenu -->
						</li><!--end /menu-li -->
						<!-- END EMAIL -->
						<!-- BEGIN EMAIL -->
						<li class="gui-folder">
							<a>
								<div class="gui-icon"><i class="md md-verified-user"></i></div>
								<span class="title">Marriage Certificates</span>
							</a>
							<!--start submenu -->
							<ul>
								<li><a href="" ><span class="title">Apply </span></a></li>
								<li><a href="../../html/mail/compose.html" ><span class="title">View Applicatons</span></a></li>
							<!--	
							<li><a href="../../html/mail/reply.html" ><span class="title">Reply</span></a></li>
								<li><a href="../../html/mail/message.html" ><span class="title">View message</span></a></li>
								-->
							</ul><!--end /submenu -->
						</li><!--end /menu-li -->
						<!-- END EMAIL -->
						<!-- BEGIN Death Certificates -->
						<li class="gui-folder">
							<a>
								<div class="gui-icon"><i class="md md-settings-power"></i></div>
								<span class="title">Death Certificates</span>
							</a>
							<!--start submenu -->
							<ul>
								<li><a href="" ><span class="title">Apply </span></a></li>
								<li><a href="../../html/mail/compose.html" ><span class="title">View Applicatons</span></a></li>
							<!--	
							<li><a href="../../html/mail/reply.html" ><span class="title">Reply</span></a></li>
								<li><a href="../../html/mail/message.html" ><span class="title">View message</span></a></li>
								-->
							</ul><!--end /submenu -->
						</li><!--end /menu-li -->
						<!-- END EMAIL -->

						<!-- BEGIN Messages -->
						<li>
							<a href="../../html/layouts/builder.html" >
								<div class="gui-icon"><i class="md md-forum"></i></div>
								<span class="title">Messages</span>
							</a>
						</li><!--end /menu-li -->
						<!-- END Messages -->
						<!-- BEGIN Users -->
						<li>
							<a href="../../html/layouts/builder.html" >
								<div class="gui-icon"><i class="md md-account-child"></i></div>
								<span class="title">Users</span>
							</a>
						</li><!--end /menu-li -->
						<!-- END Users -->
						<!-- BEGIN Settings -->
						<li>
							<a href="../../html/layouts/builder.html" >
								<div class="gui-icon"><i class="md md-settings"></i></div>
								<span class="title">Settings</span>
							</a>
						</li><!--end /menu-li -->
						<!-- END Settings -->

					</ul><!--end .main-menu -->
					<!-- END MAIN MENU -->

					<div class="menubar-foot-panel">
						<small class="no-linebreak hidden-folded">
							<span class="opacity-75">Copyright &copy; {{date('Y')}}</span> <strong>Eddah Murrey</strong>
						</small>
					</div>
				</div><!--end .menubar-scroll-panel-->
			</div><!--end #menubar-->
			<!-- END MENUBAR -->