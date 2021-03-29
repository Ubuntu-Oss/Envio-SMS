<!DOCTYPE html>

<html lang="br">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<title>SMS Feirão</title>
	</head>

	<body>
		<nav class="navbar navbar-light bg-white border-bottom">
				<a class="navbar-brand" href="#">
					<img src="img/bradesco.png" width="30" height="30" class="d-inline-block align-top" alt="">
					SMS Feirão
				</a>
		</nav>
		<div class="container mt-2">
			<div class="card bg-light" style="margin: 0 auto; width: 250px">
				<div class="card-body pt-3 pb-0">
					<form action="valida_funcional.php" method="post">
						<div class="form-group">
							<input class="form-control" type="text" name="funcional" placeholder="funcional">
						</div>
						<?php if (isset($_GET['login']) && $_GET['login'] == 'erro') { ?>
						 	<div class="text-danger"> 
						 		funcional inválida
						 	</div>

						<?php } ?>
						<?php if (isset($_GET['login']) && $_GET['login'] == 'erro2') { ?>
						 	<div class="text-danger">
						 		faça o login para acessar
						 	</div>
						<?php } ?>
						<div class="form-group">
							<input class="btn btn-danger btn-block" type="submit" value="Entrar">
						</div>
					</form>
				</div>
			</div>
		</div>				
	</body>
</html>