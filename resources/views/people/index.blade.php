 @extends('layouts.main')
    @section('content')
        <div class="section-body">
						<div class="card">

							<!-- BEGIN SEARCH HEADER -->
							<div class="card-head style-primary">
								
							</div><!--end .card-head -->
							<!-- END SEARCH HEADER -->

							<!-- BEGIN SEARCH RESULTS -->
							<div class="card-body">
								<div class="row">

									<div class="col-sm-12">
										<div class="list-results">
											@foreach($people as $person)
												<div class="col-xs-12 col-lg-6 hbox-xs">
													<div class="hbox-column width-2">
														<img class="img-circle img-responsive pull-left" src="{{asset('assets/img/avatar1.jpg')}}" alt="" />
													</div><!--end .hbox-column -->
													<div class="hbox-column v-top">
														<div class="clearfix">
															<div class="col-lg-12 margin-bottom-lg">
																<a class="text-lg text-medium" href="{{route('people.show', $person->id)}}">{{$person->fullname}}</a>
															</div>
														</div>
														<div class="clearfix opacity-75">
															<div class="col-md-7">
																<span class="glyphicon glyphicon-phone text-sm"></span> &nbsp; {{$person->dob->format('l d F Y')}}
															</div>
															<div class="col-md-5">
																<span class="glyphicon glyphicon-envelope text-sm"></span> &nbsp;{{ucfirst($person->gender)}}
															</div>
														</div>
														<div class="clearfix">
															<div class="col-lg-12">
																<span class="opacity-75"><span class="glyphicon glyphicon-map-marker text-sm"></span> &nbsp;{{ucwords($person->residence)}}</span>
															</div>
														</div>
														<div class="stick-top-right small-padding dropdown">
															<a href="#" class="dropdown-toggle btn btn-icon-toggle ink-reaction"  data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
															<ul class="dropdown-menu">
																<li><a data-toggle="modal" href="#"  data-target='#person-{{$person->id}}'><i class="fa fa-trash"></i> &nbsp; Delete</a></li>
																<li><a href="{{route('people.show', $person->id)}}">
																<i class="md md-send"></i> &nbsp; View
																</a></li>
															</ul>
														</div>
													</div><!--end .hbox-column -->
												</div><!--end .hbox-xs -->
												<div class="modal fade" id="person-{{$person->id}}" tabindex="-1" role="dialog" aria-labelledby="person-{{$person->id}}" aria-hidden="true">
													<div class="modal-dialog">
														<div class="modal-content">
															<div class="modal-header style-primary">
																<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
																<h4 class="modal-title" id="simpleModalLabel">REMOVE PERSON</h4>
															</div>
															<div class="modal-body">
																<p>Do you really want to remove <strong>{{$person->fullname}}</strong>?</p>
															</div>
															<div class="modal-footer">
																<form action="{{route('people.destroy', $person->id)}}" method="post">
																	{!! csrf_field()."\n". method_field('delete') !!}
																	<button type="button" class="btn btn-default" data-dismiss="modal">No Go Back</button>
																	<button type="submit" class="btn btn-danger">Yes Delete</button>
																</form>
															</div>
														</div><!-- /.modal-content -->
													</div><!-- /.modal-dialog -->
												</div><!-- /.modal -->

												
											@endforeach
										</div><!--end .list-results -->

										<!-- BEGIN SEARCH RESULTS LIST -->

										<!-- BEGIN SEARCH RESULTS PAGING -->
										<div class="text-center">
											
										</div><!--end .text-center -->

										<!-- BEGIN SEARCH RESULTS PAGING -->
									</div><!--end .col -->
								</div><!--end .row -->
							</div><!--end .card-body -->
							<!-- END SEARCH RESULTS -->

						</div><!--end .card -->
					</div><!--end .section-body -->
					<a class="md-btn md-fab md-fab-bottom-right btn-success ink-reaction" style="position:fixed !important; background-color: #009688;" href="{{route('people.create')}}"><i class="md md-create fa-lg" style="margin-top:10px !important; color:#fff;"></i></a>
    @endsection