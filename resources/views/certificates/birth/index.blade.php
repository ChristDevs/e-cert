@extends('layouts.main')
    @section('content')
    <div class="section-body">
        <div class="card">
				<div class="card-body no-padding">
					<ul class="list">
                    @foreach($certs as $cert)
						<li class="tile">
							<a class="tile-content ink-reaction" href="{{route('people.show', $cert->person->id)}}">
                                <div class="tile-icon" >
									<img src="{{asset('assets/img/avatar1.jpg')}}" alt="">
								</div>
								<div class="tile-text">
									{{$cert->person->fullname.', ['.ucfirst($cert->type).' Certificate]'}}
									<small>
										@if($cert->status == 'pending')
										    {{! empty($cert->notes) ? $cert->notes : 'Queued for processing'}}
										@endif
										@if($cert->status == 'processed')
											{{! empty($cert->proccess_notes) ? $cert->proccess_notes : 'Awaiting final approval'}}
										@endif
										@if($cert->status == 'approved')
											{{! empty($cert->approval_notes) ? $cert->approval_notes : 'Processed'}}
										@endif
									</small>
								</div>
							</a>
							<a class="btn btn-flat ink-reaction dropdown dropdown-toggle" data-toggle="dropdown">
						        <i class="fa fa-ellipsis-v"></i>
							</a>
						    <ul class="dropdown-menu pull-right">
								<li><a href=""><i class="md md-now-widgets"></i> &nbsp; View</a></li>
							    <li><a href=""><i class="md md-spellcheck"></i> &nbsp; Process</a></li>
                                <li><a href=""><i class="md md-done-all"></i> &nbsp; Approve</a></li>
								@if($cert->files->count() > 0)
								<li><a href="{{route('cert.attachments')}}" classs="ajaxModal"><i class="md md-attachment"></i> &nbsp; Attached Documents</a></li>
								@endif
						    </ul>
						</li>
                        @endforeach
					</ul>
				</div><!--end .card-body -->
			</div>
    </div>
    @endsection
