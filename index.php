<?php
	header( 'Content-Type: text/html; charset=utf-8' );
	require_once 'connection.php';

	$link = mysqli_connect($host, $user, $password, $database);
	if (!$link) {
		echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
		exit;
	}

	mysqli_set_charset($link, "utf8");

	if(isset($_POST['add'])) {
      
		// экранирования символов для mysql
		$add = htmlentities(mysqli_real_escape_string($link, $_POST['add']));

		// создание строки запроса
		$query ="INSERT INTO plan VALUES(NULL, '$add', 0)";

		// выполняем запрос
		$add_result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
	}

	// закрываем подключение
	mysqli_close($link);
?>

<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

		<title>Проект</title>
	</head>
	<body>
		
		<div class="container">
		<div class="row">
			<div class="col-sm">
				<div class="row">
					Запланировано
				</div>
				<div class="container">	
					<?php	
						require_once 'connection.php';
						$link = mysqli_connect($host, $user, $password, $database);
						if (!$link) {
							echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
							exit;
						}

						mysqli_set_charset($link, "utf8");

						$plan_select = "SELECT id, content, progress FROM plan";
						$plan_result = mysqli_query($link, $plan_select);
						$row = mysqli_fetch_array($plan_result);
						
						do
							{
								echo "<div class=row>{$row [content]}</div>";
								echo "<button type='submit' name='to_work_btn' class='btn btn-success'>Взять в работу</button>";
								echo "<div class=row>{$row [id]}</div>";
								echo "<div class=row>{$row [progress]}</div>";
								
						}
						while($row = mysqli_fetch_array($plan_result));
						var_dump($for_id);
						$to_work = "UPDATE plan SET progress = 1 WHERE id = {$row [id]}";  
						$to_work_btn = mysqli_query($link, $to_work);

						


						// закрываем подключение
						mysqli_close($link);
					?>
							
				</div>

				<!-- Button trigger modal -->
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
					Добавить задачу
				</button>

				<!-- Modal -->
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form method="POST">
									<div class="form-group">
										<input class="form-control form-control-lg" type="text" name="add">
									</div>
									<button type="submit" class="btn btn-primary">Сохранить</button>
								</form>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
							</div>
						</div>
					</div>
				</div>


			</div>
			<div class="col-sm">
				<div class="row">
					В работе
				</div>
				<div class="container">	
					<div class="row"><?php echo "$content";?></div>



				</div>				
			</div>
			<div class="col-sm">
				<div class="row">
					Выполнено
				</div>
			<div class="container">	
					



				</div>

			</div>
		</div>
		</div>








		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>
</html>