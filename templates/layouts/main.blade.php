<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<title>{{ $page['SEO_TITLE'] }}</title>

		<meta name="description" content="{{ $page['SEO_DESCRIPTION'] }}">

		<meta name="yandex-verification" content="acd13132eb092c18" />

		<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
		<link rel="manifest" href="/site.webmanifest">
		<meta name="msapplication-TileColor" content="#da532c">
		<meta name="theme-color" content="#ffffff">

		<link rel="stylesheet" type="text/css" href="/vendor/bootstrap-4.5.3-dist/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="/vendor/fontawesome-free-5.15.1-web/css/all.min.css">
		<link rel="stylesheet" type="text/css" href="/assets/css/main.css">

		<script src="/vendor/jquery-3.5.1.min.js"></script>
		<script src="/vendor/bootstrap-4.5.3-dist/js/bootstrap.min.js"></script>
		<script src="/assets/js/main.js"></script>
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar--cleanning">
			<div class="container">
			  	<a class="navbar-brand" href="/">
			  		<img class="navbar-brand__logo" src="/assets/img/logo.svg" alt="<?php echo $config['contact']['name']; ?>">
			  		Клининговая компания в Серпухове
			  	</a>

			  	<div class="navbar__devider mr-3"></div>

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

				<form class="form-inline nabar__telephone-wrapper">
			    	<a class="btn btn-outline-primary nabar__telephon" href="tel:{{ $config['contact']['phone'] }}">
			    		<i class="fas fa-phone"></i> 
			    		{{ $config['contact']['phone'] }}
			    	</a>
			  	</form>

			  	<div class="navbar__social-wrapper">
				  	<div class="collapse navbar-collapse" id="navbarSupportedContent">
					    <ul class="navbar-nav mr-auto">
					      	<li class="nav-item">
					        	<a class="nav-link" target="_blank" href="https://wa.me/{{ $config['contact']['phone'] }}">
					        		<img class="navbar__social-icon" src="/assets/img/whatsapp.png">
					        	</a>
					        </li>
					        <li class="nav-item">
					        	<a class="nav-link" target="_blank" href="viber://add?number={{ $config['contact']['phone'] }}">
					        		<img class="navbar__social-icon" src="/assets/img/viber.png">
					        	</a>
					        </li>
					        <li class="nav-item">
					        	<a class="nav-link" target="_blank" href="#">
					        		<img class="navbar__social-icon" src="/assets/img/telegram.png">
					        	</a>
					      	</li>
					    </ul>
				  	</div>
			  	</div>
		  	</div>
		</nav>

		@if($page['URL'] === '/')
			<div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="jumbotron">
                            <h1 class="display-4">
                                {{ $page['SEO_H1'] }}
                            </h1>
                            <p class="lead">
                            	Мы работаем по региону Серпухову и району круглосуточно.Делаем бесплатный выезд оценки обьекта, имеет большой штат проверенных исполнителей.
                            </p>

                            <a class="btn btn-primary btn-lg" role="button">Узнать стоимость</a>
                        </div>
                    </div>
                </div>
            </div>
		@endif

		<div class="content">
			@if($page['URL'] !== '/')
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
			@endif

			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="content">
							@yield('content')
						</div>
					</div>
				</div>
			</div>

			@include('layouts.form')
		</div>

		<div class="footer_wrapper">
			<div class="container">
				<div class="footer__inner">
					Все права защищены
				</div>
			</div>
		</div>


		<div class="modal fade" id="callback" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        ...
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="button" class="btn btn-primary">Save changes</button>
		      </div>
		    </div>
		  </div>
		</div>

		<!-- Yandex.Metrika counter -->
		<script type="text/javascript" >
		   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
		   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
		   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

		   ym(69133948, "init", {
		        clickmap:true,
		        trackLinks:true,
		        accurateTrackBounce:true,
		        webvisor:true
		   });
		</script>
		<noscript><div><img src="https://mc.yandex.ru/watch/69133948" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
		<!-- /Yandex.Metrika counter -->
	</body>
</html>