<!DOCTYPE html>

<html lang="br">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<title>SMS Feirão</title>
	</head>

	<body>
		<nav class="navbar navbar-light bg-light">
				<a class="navbar-brand" href="#">
					<img src="img/bradesco.png" width="30" height="30" class="d-inline-block align-top" alt="">
					SMS Feirão
				</a>
		</nav>
		
			<table class="tableL" align="center" width="200px">
				<form action="valida_funcional.php" method="post">
				<tr>
					<td><input type="text" name="funcional" placeholder="funcional"></input></td>
					<td><input type="submit" value="Entrar"></input></td>
					<?php if (isset($_GET['login']) && $_GET['login'] == 'erro') { ?>
					 	<script>alert('funcional inválida!')</script>
					<?php } ?>
					<?php if (isset($_GET['login']) && $_GET['login'] == 'erro2') { ?>
					 	<script>alert('faça o login para acessar a página!')</script>
					<?php } ?>
				</tr>
				</form>
			</table>
				
	</body>
</html>