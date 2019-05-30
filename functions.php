<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

function add_work() {

	global $link;

	if (isset($_POST['add_work'])) {

		$work_text = htmlentities(mysqli_real_escape_string($link, $_POST['work_text']));
		
		// создание строки запроса
	    $sql ="INSERT INTO plan VALUES (NULL, '$work_text', 0)";
		
		// выполняем запрос
		$result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
	}
}


function to_work(){

	global $link;

		foreach ($_POST as $name => $work['id']) {
			
			$getsql = "SELECT progress FROM plan WHERE id = '$name'";
			$resultsql = mysqli_query($link, $getsql) or die( mysqli_error($link));

			$row = mysqli_fetch_assoc($resultsql);
			$prgrs = $row['progress'];

			if ($prgrs = 0) {
				
				$sql = "UPDATE plan SET progress = progress + 1 WHERE id = '$name'";
				$result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
			}
			else {
				$sql = "UPDATE plan SET progress = progress - 1 WHERE id = '$name'";
				$result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
			}
	}

	
}

function works(){

	global $link;

	$sql = "SELECT * FROM plan WHERE progress = 0";

	$result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));

	$works = mysqli_fetch_all($result, MYSQLI_ASSOC);

	return $works;					
}

function in_works(){

	global $link;

	$sql = "SELECT * FROM plan WHERE progress = 1";

	$result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));

	$in_works = mysqli_fetch_all($result, MYSQLI_ASSOC);

	return $in_works;					
}

function to_done(){

	global $link;

		foreach ($_POST as $name => $in_work['id']) {

			$getsql = "SELECT progress FROM plan WHERE id = '$name'";
			$resultsql = mysqli_query($link, $getsql) or die( mysqli_error($link));

			$row = mysqli_fetch_assoc($resultsql);
			$prgrs = $row['progress'];

			if ($prgrs = 1) {
				
				$sql = "UPDATE plan SET progress = progress + 2 WHERE id = '$name'";
				$result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
			}
	}
}

function dones(){

	global $link;

	$sql = "SELECT * FROM plan WHERE progress = 2";

	$result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));

	$dones = mysqli_fetch_all($result, MYSQLI_ASSOC);

	return $dones;						
}



