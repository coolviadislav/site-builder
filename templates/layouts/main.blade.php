<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		
		<title>{{ $page['SEO_TITLE'] }}</title>

		<meta name="msapplication-TileColor" content="#da532c">
		<meta name="theme-color" content="#ffffff">
		<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
		<link rel="manifest" href="/site.webmanifest">

		<link rel="stylesheet" type="text/css" href="/vendor/bootstrap-4.5.3-dist/css/bootstrap.min.css">
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
			  	<a class="navbar-brand" href="/">Clean24x7.ru</a>
			  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			    		<span class="navbar-toggler-icon"></span>
			  	</button>

			  	<div class="collapse navbar-collapse" id="navbarSupportedContent">
				    <ul class="navbar-nav mr-auto">
				    	@foreach($menu as $item)
					      	<li class="nav-item">
					        	<a class="nav-link" href="{{ $item['LINK'] }}">
					        		{{ $item['NAME'] }}
					        	</a>
					      	</li>
				      	@endforeach
				    </ul>
			  	</div>
		  	</div>
		</nav>

		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>{{ $page['SEO_H1'] }}</h1>

					<nav aria-label="breadcrumb">
					  	<ol class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
					  		@foreach($page['BREADCRUMBS'] as $key => $item)
							    <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
							    	@if(count($page['BREADCRUMBS'])-1 === $key)
							    		<span itemprop="name">
						    				{{ $item['NAME'] }}
						    			</span>
							    	@else
							    		<a href="{{ $item['LINK'] }}" itemprop="item">
							    			<span itemprop="name">
							    				{{ $item['NAME'] }}
							    			</span>
							    		</a>
							    	@endif

							    	<meta itemprop="position" content="{{ $key+1 }}" />
							    </li>
						    @endforeach
					  	</ol>
					</nav>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-md-12">
					@yield('content')
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-md-12">
					@include('layouts.form')
				</div>
			</div>
		</div>
	</body>
</html>