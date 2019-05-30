<?php
function to_work(){

	global $link;

		foreach ($_POST as $name => $work['id']) {

			$sql = "UPDATE plan SET progress = 1 WHERE id = '$name'";
			$result = mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));

	}
	
}