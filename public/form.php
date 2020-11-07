<?php
	if (isset($_POST['name']) AND isset($_POST['phone'])) {
		$str = "";
		$str .= "Имя: " . $_POST['name'] . "\n";
		$str .= "Телефон: " . $_POST['phone'] . "\n";

		$config = include('../config.php');

		file_get_contents(
	        sprintf(
	            'https://api.telegram.org/%s/sendMessage?%s',
	            $config['telegram']['bot'],
	            http_build_query([
	                'chat_id' => $config['telegram']['chat_id'],
	                'text' => $str
	            ])
	        )
	    );

	    header('Location: /');
	}

