@extends('layouts.main')
    @section('content')
    <div class="section-body">
        <div class="card">
				<div class="card-body no-padding">
					<ul class="list">
                    @foreach($certs as $cert)
						<li class="tile">
							<a class="tile-content ink-reaction" href="#">
                                <div class="tile-icon" >
									<img src="{{asset('assets/img/avatar1.jpg')}}" alt="">
								</div>
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
								<li><a href="{{route('death.show', $cert->id)}}"><i class="md md-now-widgets"></i> &nbsp; View Certificate</a></li>
							@endif
							@if(! $cert->approved)
								<li><a href="{{route('death.application', $cert->id)}}"><i class="md md-question-answer"></i> &nbsp; View Application</a></li>
							@endif
							@role(['officer', 'owner'])
							    <li><a href="{{ route('death.edit', $cert->id) }}"><i class="md md-spellcheck"></i> &nbsp; Process</a></li>
							@endrole
						    </ul>
						</li>
                        @endforeach
					</ul>
				</div><!--end .card-body -->
			</div>
    </div>
    @endsection
