<?php
	header( 'Content-Type: text/html; charset=utf-8' );
	require_once 'connection.php';

	$link = mysqli_connect($host, $user, $password, $database);
	if (!$link) {
		echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
		exit;
	}

	mysqli_set_charset($link, "utf8");

	if(isset($_POST['content'])) {
      
		// экранирования символов для mysql
		$content = htmlentities(mysqli_real_escape_string($link, $_POST['content']));

		// создание строки запроса
		$query ="INSERT INTO plan VALUES(NULL, '$content', 0)";

		// выполняем запрос
		$add_result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
	}

	// закрываем подключение
	mysqli_close($link);
