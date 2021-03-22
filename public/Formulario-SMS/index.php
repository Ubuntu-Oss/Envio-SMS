<!DOCTYPE html>

<html lang="br">
<meta charset="UTF-8">

	<head>
		<title>Formulário Feirão</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
					<td><input type="password" name="funcional" placeholder="funcional"></input></td>
					<td><input type="submit" value="Entrar"></input></td>
					<td><input type="button"  value="Registrar"><td>
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