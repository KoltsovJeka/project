<?php

function to_done(){

	global $link;
	
	foreach ($_POST as $name => $in_work['id']) {

		if (isset($_name)) {
		$sql = "UPDATE plan SET progress = 2 WHERE id = '$name'";
		$result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
		}


	}
}