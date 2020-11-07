<?php
	$timestart = microtime(true);

	require('vendor/autoload.php');

	set_time_limit(0);

	define('DS', DIRECTORY_SEPARATOR);

	$config = include('config.php');

	$fileImports = $config['imports'];

	$pages = [];

	foreach ($fileImports as $link) {
		// Ссылка на файл импорта с страницами
		$lines = file($link);

		// Здесь мы парсим CSV файл
		$rows = [];
		foreach ($lines as $line) {
			$rows[] = str_getcsv($line);
		}
		// Удаляем техническую информацию о названии полей
		unset($rows[1]);

		// Восстановим ключи после удаления служебной строки
		$rows = array_values($rows);

		// Здесь подготовим и соберем данные для страниц
		for ($i=1; $i<count($rows); $i++) { 
			$item = [];
			foreach ($rows[0] as $key => $value) {
				$item[$value] = $rows[$i][$key];
			}
			$pages[ $item['URL'] ] = $item;
		}

		unset($lines);
		unset($rows);
	}

	// Создаем меню
	$menu = [];
	foreach ($pages as $page) {
		if($page['SHOW_IN_MENU'] === '1') {
			$menu[] = [
				'NAME' => $page['MENU_NAME'],
				'LINK' => $page['URL']
			];
		}
	}

	// Создаем ссылки на услуги
	$service = [];
	foreach ($pages as $page) {
		if($page['TEMPLATE'] === 'service') {
			$service[] = [
				'NAME' => $page['MENU_NAME'],
				'LINK' => $page['URL']
			];
		}
	}

	// Шаблонизатор
	$blade = new \Jenssegers\Blade\Blade('templates', 'cache');

	$baseDir = __DIR__ . DS . 'public';
	foreach ($pages as $page) {
		$path = $baseDir . str_replace("/", DS, $page['URL']);

		@mkdir($path);

		// Рендерим страницу
		$content = $blade->render($page['TEMPLATE'], [
			'page' => $page,
			'menu' => $menu,
			'service' => $service
		]);

		// Статус генерации страниц
		echo sprintf("Генерируем страницу: %s \n", $page['PAGE_NAME']);

		// Сохраняем сгенерированную страницу в index.html
		file_put_contents($path . 'index.html', $content);
	}

	// Создаем карту сайта
	$sitemap = '';
	$sitemap .= '<?xml version="1.0" encoding="UTF-8"?>';
	$sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
	foreach ($pages as $page) {
		$sitemap .= '<url>';
			$sitemap .= sprintf('<loc>%s%s</loc>', $config['url'], $page['URL']);
			$sitemap .= sprintf('<lastmod>%s</lastmod>', date('Y-n-j'));
			$sitemap .= '<changefreq>daily</changefreq>';
			$sitemap .= '<priority>1</priority>';
		$sitemap .= '</url>';
	}
	$sitemap .= '</urlset>';
	file_put_contents($baseDir . DS . 'sitemap.xml', $sitemap);
	
	$timeend = microtime(true);
	echo sprintf('Время работы скрипта: %s сек.', round($timeend - $timestart, 2));