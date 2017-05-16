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
													<li class="active"><a href="#notes">NOTES</a></li>
													<li><a href="#activity">ACTIVITY</a></li>
													<li><a href="#details">DETAILS</a></li>
												</ul>
												<div class="tab-content">

													<!-- BEGIN CONTACTS NOTES -->
													<div class="tab-pane active" id="notes">
														<div class="list-results list-results-underlined">
															<div class="col-xs-12">
																<p class="clearfix">
																	<span class="fa fa-fw fa-file-o fa-2x pull-left"></span>
																	<span class="pull-left">
																		<span class="text-bold">Saturday, Oktober 18, 2014</span><br/>
																		<span class="opacity-50">Note by Daniel Johnson.</span>
																	</span>
																</p>
																<div>
																	<em>"It looks like he wanted our help and there is an opening here."</em>
																</div>
															</div><!--end .col -->
															<div class="col-xs-12">
																<p class="clearfix">
																	<span class="fa fa-fw fa-envelope-o fa-2x pull-left"></span>
																	<span class="pull-left">
																		<span class="text-bold">Tuesday, Juli 08, 2011</span><br/>
																		<span class="opacity-50">Email via Ann Laurens.</span><br/>
																		<span class="opacity-50">Subject: Can we meet tomorrow and come to a decision?</span>
																	</span>
																</p>
																<div>
																	<p>
																		Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
																	</p>
																	<p>
																		Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
																	</p>
																	<p>
																		Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra..
																	</p>
																</div>
															</div><!--end .col -->
															<div class="col-xs-12">
																<p class="clearfix">
																	<span class="fa fa-fw fa-file-o fa-2x pull-left"></span>
																	<span class="pull-left">
																		<span class="text-bold">Wednesday, May 28, 2014</span><br/>
																		<span class="opacity-50">Note by Daniel Johnson.</span>
																	</span>
																</p>
																<div>
																	<em>There should be a meeting scheduled soon.</em>
																</div>
															</div><!--end .col -->
														</div><!--end .list-results -->
													</div><!--end #notes -->
													<!-- END CONTACTS NOTES -->

													<!-- BEGIN CONTACTS ACTIVITY -->
													<div class="tab-pane" id="activity">
														<form class="form" id="formFilter" accept-charset="utf-8" method="post">
															<br/>
															<div class="text-center">
																<label class="checkbox-inline checkbox-styled checkbox-default">
																	<input type="checkbox" value="option1" checked><span>System alerts</span>
																</label>
																<label class="checkbox-inline checkbox-styled checkbox-primary">
																	<input type="checkbox" value="option2" checked><span>Social activity</span>
																</label>
																<label class="checkbox-inline checkbox-styled checkbox-default-dark">
																	<input type="checkbox" value="option3" checked><span>Event</span>
																</label>
															</div>
															<br/>
														</form>
														<hr class="no-margin"/>
														<ul class="timeline collapse-md">
															<li class="timeline-inverted">
																<div class="timeline-circ"></div>
																<div class="timeline-entry">
																	<div class="card style-default-light">
																		<div class="card-body small-padding">
																			<img class="img-circle img-responsive pull-left width-1" src="../../../assets/img/avatar9.jpg?1404026744" alt="" />
																			<span class="text-medium">Received a <a class="text-primary" href="../../../html/mail/inbox.html">message</a> from <span class="text-primary">Ann Lauren</span></span><br/>
																			<span class="opacity-50">
																				Saturday, Oktober 18, 2014
																			</span>
																		</div>
																	</div>
																</div>
															</li>
															<li>
																<div class="timeline-circ"></div>
																<div class="timeline-entry">
																	<div class="card style-default-light">
																		<div class="card-body small-padding">
																			<img class="img-circle img-responsive pull-left width-1" src="../../../assets/img/avatar7.jpg?1404026721" alt="" />
																			<span class="text-medium">User login at <span class="text-primary">8:15 pm</span></span><br/>
																			<span class="opacity-50">
																				Saturday, August 2, 2014
																			</span>
																		</div>
																	</div>
																</div>
															</li>
															<li class="timeline-inverted">
																<div class="timeline-circ style-default-dark"></div>
																<div class="timeline-entry">
																	<div class="card style-default-dark">
																		<div class="card-body small-padding">
																			<img class="img-circle img-responsive pull-left width-1" src="../../../assets/img/avatar7.jpg?1404026721" alt="" />
																			<span class="text-medium">Meeting in the <span class="text-primary">conference room</span></span><br/>
																			<span class="opacity-50">
																				Saturday, Juli 29, 2014
																			</span>
																		</div>
																	</div>
																</div>
															</li>
															<li>
																<div class="timeline-circ circ-xl style-accent"><span class="glyphicon glyphicon-upload"></span></div>
																<div class="timeline-entry">
																	<div class="card style-primary">
																		<div class="card-body small-padding">
																			<p><img class="img-circle img-responsive pull-left width-1" src="../../../assets/img/avatar5.jpg?1404026513" alt="" />
																			<span class="text-medium">Contacted <a class="text-primary-dark" href="../../../html/mail/inbox.html">Mabel Logan</a></span><br/>
																			<span class="opacity-50">
																				Saturday, Juli 23, 2014
																			</span>
																		</p>
																		<em>
																			Can you send me the latest updates? Then I can see the new colors for the themes.
																		</em>
																	</div>
																</div>
															</div>
														</li>
														<li class="timeline-inverted">
															<div class="timeline-circ circ-lg"><span class="glyphicon glyphicon-plus-sign"></span></div>
															<div class="timeline-entry">
																<div class="card style-default-light">
																	<div class="card-body small-padding">
																		<img class="img-circle img-responsive pull-left width-1" src="../../../assets/img/avatar7.jpg?1404026721" alt="" />
																		<span class="text-medium">User registered on website</span><br/>
																		<span class="opacity-50">
																			Saturday, March 2, 2014
																		</span>
																	</div>
																</div>
															</div>
														</li>
													</ul><!--end .timeline -->
												</div><!--end #activity -->
												<!-- END CONTACTS ACTIVITY -->

												<!-- BEGIN CONTACTS DETAILS -->
												<div class="tab-pane" id="details">
													<h3 class="opacity-50">Summary</h3>
													<article class="text-columns-2">
														<img class="img-circle size-3 pull-left" src="../../../assets/img/avatar7.jpg?1404026721" alt="" />
														<h5 class="text-primary">A young professional</h5>
														<p>
															Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
														</p>
														<h5 class="text-primary">Wanted by</h5>
														<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
														<p>Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula.</p>
														<h5 class="text-primary">And finally</h5>
														<p> Donec lobortis risus a elit. Donec fermentum. Pellentesque malesuada nulla a mi. Duis sapien sem, aliquet nec, commodo eget, consequat quis, neque. Aliquam faucibus, elit ut dictum aliquet, felis nisl adipiscing sapien, sed malesuada diam lacus eget erat. Cras mollis scelerisque nunc. Nullam arcu. Aliquam consequat. Curabitur augue lorem, dapibus quis, laoreet et, pretium ac, nisi. Aenean magna nisl, mollis quis, molestie eu, feugiat in, orci. In hac habitasse platea dictumst.</p>
													</article>
													<br/>
													<h3 class="opacity-50">Experience</h3>
													<ul class="timeline collapse-lg timeline-hairline no-shadow">
														<li class="timeline-inverted">
															<div class="timeline-circ style-accent"></div>
															<div class="timeline-entry">
																<div class="card style-default-bright">
																	<div class="card-body small-padding">
																		<small class="text-uppercase text-primary pull-right">January, 2014 - Present</small>
																		<p>
																			<span class="text-lg text-medium">Manager director</span><br/>
																			<span class="text-lg text-light">Web Design Studios</span>
																		</p>
																		<p>
																			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vehicula, magna et bibendum malesuada, purus augue suscipit dolor, vitae fringilla dui nibh non lectus. Curabitur in pellentesque tortor. Nunc posuere vestibulum augue, quis posuere orci blandit vitae. Suspendisse dignissim elit dui, ac dictum felis interdum nec.
																		</p>
																	</div>
																</div>
															</div>
														</li>
														<li>
															<div class="timeline-circ style-accent"></div>
															<div class="timeline-entry">
																<div class="card style-default-bright">
																	<div class="card-body small-padding">
																		<small class="text-uppercase text-primary pull-right">Juli, 2008 - January, 2014</small>
																		<p>
																			<span class="text-lg text-medium">Commercial manager</span><br/>
																			<span class="text-lg text-light">Creation Inc.</span>
																		</p>
																		<p>
																			Nunc vehicula, magna et bibendum malesuada, purus augue suscipit dolor, vitae fringilla dui nibh non lectus. Curabitur in pellentesque tortor. Nunc posuere vestibulum augue, quis posuere orci blandit vitae. Suspendisse dignissim elit dui, ac dictum felis interdum nec.
																		</p>
																	</div>
																</div>
															</div>
														</li>
														<li>
															<div class="timeline-circ style-accent"></div>
															<div class="timeline-entry">
																<div class="card style-default-bright">
																	<div class="card-body small-padding">
																		<small class="text-uppercase text-primary pull-right">March, 2002 - Juli, 2008</small>
																		<p>
																			<span class="text-lg text-medium">Commercial assistant</span><br/>
																			<span class="text-lg text-light">Designers Corp.</span>
																		</p>
																		<p>
																			Suspendisse dignissim elit dui, ac dictum felis interdum nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vehicula, magna et bibendum malesuada, purus augue suscipit dolor, vitae fringilla dui nibh non lectus. Curabitur in pellentesque tortor. Nunc posuere vestibulum augue, quis posuere orci blandit vitae.
																		</p>
																	</div>
																</div>
															</div>
														</li>
													</ul><!--end .timeline -->
													<br/>
													<h3 class="opacity-50">Skills</h3>
													<div class="row">
														<div class="col-md-12 col-lg-8">
															<dl>
																<dt>Communication</dt>
																<dd><div class="progress progress-hairline"><div class="progress-bar progress-bar-accent" style="width: 95%"></div></div></dd>
																<dt>Problem solving</dt>
																<dd><div class="progress progress-hairline"><div class="progress-bar progress-bar-accent" style="width: 85%"></div></div></dd>
																<dt>Team Player</dt>
																<dd><div class="progress progress-hairline"><div class="progress-bar progress-bar-accent" style="width: 69%"></div></div></dd>
																<dt>Planning and organizing</dt>
																<dd><div class="progress progress-hairline"><div class="progress-bar progress-bar-accent" style="width: 60%"></div></div></dd>
																<dt>Systems knowledge</dt>
																<dd><div class="progress progress-hairline"><div class="progress-bar progress-bar-accent" style="width: 55%"></div></div></dd>
															</dl>
														</div><!--end .col -->
													</div><!--end .row -->
													<br/>
													<h3 class="opacity-50">Ratings</h3>
													<blockquote>
														<div class="star-rating pull-left">
															<span class="glyphicon text-primary glyphicon-star"></span><span class="glyphicon text-primary glyphicon-star"></span><span class="glyphicon text-primary glyphicon-star"></span><span class="glyphicon text-primary glyphicon-star"></span><span class="glyphicon text-primary glyphicon-star"></span>
														</div>
														<p>
															&nbsp;&nbsp;
															Don't forget to rate this theme.
														</p>
														<footer>Kimberly Aston</footer>
													</blockquote>
													<blockquote>
														<div class="star-rating pull-left">
															<span class="glyphicon text-primary glyphicon-star"></span><span class="glyphicon text-primary glyphicon-star"></span><span class="glyphicon text-primary glyphicon-star"></span><span class="glyphicon text-primary glyphicon-star"></span><span class="glyphicon glyphicon-star opacity-25"></span>
														</div>
														<p>
															&nbsp;&nbsp;
															A very talented manager who likes to talk to people.
														</p>
														<footer>Ann Laurens</footer>
													</blockquote>
													<blockquote>
														<div class="star-rating pull-left">
															<span class="glyphicon text-primary glyphicon-star"></span><span class="glyphicon text-primary glyphicon-star"></span><span class="glyphicon text-primary glyphicon-star"></span><span class="glyphicon glyphicon-star opacity-25"></span><span class="glyphicon glyphicon-star opacity-25"></span>
														</div>
														<p>
															&nbsp;&nbsp;
															Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.
														</p>
														<footer>Buck Rogers</footer>
													</blockquote>
												</div><!--end #details -->
												<!-- END CONTACTS DETAILS -->

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
												<dt><span class="fa fa-fw fa-graduation-cap fa-lg opacity-50"></span></dt>
												<dd>
													<span class="opacity-50">Career</span><br/>
													<span class="text-medium">Manager director, Commercial manager, Commercial assistant</span>
												</dd>
												<dt><span class="fa fa-fw fa-gift fa-lg opacity-50"></span></dt>
												<dd>
													<span class="opacity-50">Birthday</span><br/>
													<span class="text-medium">{{$person->dob->format('d F')}}</span>
												</dd>
											</dl><!--end .dl-horizontal -->
											<br/>
											<h4>Contact info</h4>
											<br/>
											<dl class="dl-horizontal dl-icon">
												<dt><span class="fa fa-fw fa-mobile fa-lg opacity-50"></span></dt>
												<dd>
													<span class="opacity-50">Phone</span><br/>
													<span class="text-medium">233-332-342</span> &nbsp;<span class="opacity-50">work</span><br/>
													<span class="text-medium">766-766-4532</span> &nbsp;<span class="opacity-50">mobile</span>
												</dd>
												<dt><span class="fa fa-fw fa-envelope-square fa-lg opacity-50"></span></dt>
												<dd>
													<span class="opacity-50">Email</span><br/>
													<a class="text-medium" href="../../../html/mail/compose.html">philip@Ericsson.com</a>
												</dd>
												<dt><span class="fa fa-fw fa-location-arrow fa-lg opacity-50"></span></dt>
												<dd>
													<span class="opacity-50">Address</span><br/>
													<span class="text-medium">
														Damrak 7<br/>
														Amsterdam, 1012 LG<br/>
														Netherlands
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