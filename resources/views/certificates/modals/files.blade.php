	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header style-primary">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
				<h4 class="modal-title" id="simpleModalLabel">Attached Files</h4>
			</div>
		    <div class="modal-body">
				<div class="row">
					<div class="card">
						<div class="card-body no-padding">
							<ul class="list divider-full-bleed">
								@foreach($cert->files as $key => $file)
								<li class="tile">
									<a class="tile-content ink-reaction" href="#2">
                                        <div class="tile-icon">
                                            
                                        </div>
                                        <div class="tile-text">File Attachment {{$key+1}}</div>
									</a>
									<a href="{{url('attachment/download', $file->name)}}" class="btn btn-flat ink-reaction">
									    <i class="fa fa-download"></i>
									</a>
								</li>
								@endforeach
							</ul>
						</div><!--end .card-body -->
					</div>
				</div>			
			</div>
			<div class="modal-footer">
		
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->