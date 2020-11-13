@extends('layouts.main')

@section('content')
	<img src="{{ $page['MAIN_PICTURE'] }}" alt="{{ $page['SEO_H1'] }}" class="service-main-picture">

	@foreach(explode("\n", $page['SEO_MAIN_TEXT']) as $text)
		<p>{!! $text !!}</p>
	@endforeach

	<div class="subtitle">
		{{ $page['WHAT_DO_TITLE'] }}
	</div>

	<ul class="what-do-list">
		@foreach(explode("\n", $page['WHAT_DO_LIST']) as $item)
			<li>{!! $item !!}</li>
		@endforeach
	</ul>
	
	<div class="subtitle">
		{{ $page['PRICES_TITLE'] }}
	</div>

	<div class="table-responsive-sm">
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Услуга</th>
                    <th scope="col" style="width: 150px;">Цена</th>
                    <th scope="col" style="width: 110px;"></th>
                </tr>
            </thead>
            <tbody>
            	@foreach(explode("\n", $page['PIRCES']) as $row)
					<tr>
	                    <td>{{ trim(explode('|', $row)[0]) }}</td>
	                    <td>{{ trim(explode('|', $row)[1]) }}</td>
	                    <td>
	                        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#callback" data-modal-title="{{ trim(explode('|', $row)[0]) }}" data-form-btn="Заказать">Заказать</button>
	                    </td>
	                </tr>
                @endforeach
			</tbody>
        </table>
    </div>	

	<div class="subtitle">
		Фото после до и после уборки квартир
	</div>

	<div class="row">
		@foreach($page['PICTURES'] as $picture)
			<div class="col-md-3">
				<a data-fancybox="gallery" data-caption="{{ $picture['CAPTION'] }}" href="{{ $picture['SRC'] }}">
					<img src="{{ $picture['SRC'] }}" class="service-picture" alt="{{ $picture['ALT'] }}">
				</a>
			</div>
		@endforeach
	</div>
@endsection