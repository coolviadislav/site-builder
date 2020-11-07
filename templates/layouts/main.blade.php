<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		
		<title>{{ $page['SEO_TITLE'] }}</title>
	</head>
	<body>
		<ul>
			@foreach($menu as $item)
				<li>
					<a href="{{ $item['LINK'] }}">{{ $item['NAME'] }}</a>
				</li>	
			@endforeach
		</ul>

		<h1>{{ $page['SEO_H1'] }}</h1>

		@yield('content')
	</body>
</html>