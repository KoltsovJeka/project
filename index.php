<?php
	require_once 'connection.php';
	require_once 'functions.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/../css/main.css">

    <title>Проект</title>
  </head>
  <body>
	<div class="container m-cont">
		<div class="row">
			<div class="col-sm">
				<div class="row">
					<h3>Запланировано</h3>
				</div>
				<?php
					$to_done = to_done();
					$to_work = to_work();
					$works = works();
				?>
				
				<?php foreach ($works as $work): ?>

				<div class="row cards">
					<div class="card text-white bg-primary" style="width: 18rem;">
						<div class="card-body">
							<p class="card-text"><?=$work['content']?></p>
							<form method="POST">
								<input type="submit" name="<?=$work['id']?>" class="btn btn-dark" value="Взять в работу">
							</form>
						</div>
					</div>
					
				</div>
				<?php endforeach; ?>

				<!-- Button trigger modal -->
				<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
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
								<?php
									$add_work = add_work();
								?>
								<form method="POST">
									<div class="form-group">
										<input class="form-control form-control-lg" type="text" name="work_text">
									</div>
									<input type="submit" name="add_work" class="btn btn-success" value="Сохранить">
								</form>
								
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
							</div>
						</div>
					</div>
				</div>
				<div class="row">

				</div>
			</div>
			<div class="col-sm">
				<div class="row">
					<h3>В работе</h3>
				</div>
				<?php
					$in_works = in_works();
				?>
				<?php foreach ($in_works as $in_work): ?>
					
				<div class="row cards">
					<div class="card text-white bg-warning" style="width: 18rem;">
						<div class="card-body">
							<p class="card-text"><?=$in_work['content']?></p>
							<form  method="POST">
								<input type="submit" name="<?=$in_work['id']?>" class="btn btn-success" value="Выполнено">
							</form>
						</div>
					</div>
					
				</div>
				<?php endforeach; ?>
			</div>
			<div class="col-sm">
				<div class="row">
					<h3>Выполнено</h3>
				</div>

				<?php
					$dones = dones();
				?>
				<?php foreach ($dones as $done): ?>

				<div class="row cards">
					<div class="card text-white bg-success" style="width: 18rem;">
						<div class="card-body">
							<p class="card-text"><?=$done['content']?></p>
							<form method="POST">
								<input type="submit" name="<?=$done['id']?>" class="btn btn-danger" value="Удалить">
							</form>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
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