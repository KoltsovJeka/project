<?php
	require_once 'connection.php';

	$link = mysqli_connect($host, $user, $password, $database);



	$plan_result = mysql_query(SELECT * FROM plan);
			while ($result = mysqli_fetch_array($plan_result)) {
    echo "{$result['Name']}: {$result['Price']} рублей<br>";
  }
?>