@extends('layouts.main')

@section('content')
	<ul>
		@foreach($service as $item)
			<li>
				<a href="{{ $item['LINK'] }}">{{ $item['NAME'] }}</a>
			</li>	
		@endforeach
	</ul>	
@endsection