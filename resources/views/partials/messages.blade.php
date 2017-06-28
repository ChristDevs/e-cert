@if($message = session('messages'))
	<div class="section-body">
		<div class="alert alert-callout alert-{{$message['type']}}">
			<h4 class="text-{{$message['type']}}">{{$message['title']}}</h4>
			<p>{{$message['message']}}</p>
		</div>
	</div>
@endif