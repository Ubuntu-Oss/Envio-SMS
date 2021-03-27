<?php

session_start();

if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM'){
	header('location: index.php?login=erro2');
}

?>

<!DOCTYPE html>
<html lang="br">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<script type="text/javascript" src="valida_campos.js"></script>
		<title>SMS Feirão</title>
	</head>

	<body>
		<nav class="navbar navbar-expand-sm navbar-light bg-light">
			<a class="navbar-brand" href="#">
				<img src="img/bradesco.png" width="30" height="30" class="d-inline-block align-top" alt="">
				SMS Feirão
			</a>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" href="formulario.php">Formulário</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="solicitacoes.php">Solicitações</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="">Contato</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="logoff.php">Sair</a>
				</li>
			</ul>	
		</nav>
		<div class="mt-1 mb-4"><h2 align="center"> Formulário de solicitação </h2></div>
		<div>
			<table class="tableF" width="200px" align="center">
				<form name="frm" action="solicitacao_controller.php?acao=inserir" method="post">
					<tr>
						<td><?php echo ($_SESSION['nome']); ?><hr style="border-color:black"></td>
						<td><?php echo ($_SESSION['email']);?><hr style="border-color:black"></td>
					</tr>
					<tr>
						<td><input type="text" id="NomeEvento" name="NomeEvento" placeholder="Nome do evento" maxlength="26"></td>
						<td><input type="text" id="LocalEvento" name="LocalEvento" placeholder="Local do evento" maxlength="32"></td>
					</tr>
					<tr>
						<td>Data do disparo SMS</td>
						<td><input type="date" id="DataDisparo" name="DataDisparo"></td>
					</tr>
					<tr>
						<td>Data inicial do evento</td>
						<td><input type="date" id="DataEventoI" name="DataEventoI"></td>
					</tr>
					<tr>
						<td>Data final do evento</td>
						<td><input type="date" id="DataEventoF" name="DataEventoF"></td>
					</tr>
					<tr>
						<td>Código da filial.<br>Separar números com (,)</td>
						<td><input type="text" id="CodigoFilial" name="CodigoFilial" placeholder="Ex. 123,4321,456" maxlength="15"></td>
					</tr>
					<tr>
						<td>Meses quitados</td>
					<td>
						<input type="number" name="MesesQ" id="MesesQ" min="1" max="24">
					</td>
					</tr>
					<tr>
						<td>Meses a quitar</td>
					<td>
						<input type="number" name="MesesAq" id="MesesAq" min="1" max="24">
					</td>
					</tr>
					<tr>
					<td>Celulares adicionais.<br>Separar números com (,)</td>
					<td><input type="text" id="CelularesAdicionais" name="CelularesAdicionais" placeholder="Ex. 11912345678,21912345678" maxlength="200"></td>
					</tr>
					<tr>
					<td><br><input type="button" value="solicitar" onclick="validarCampos()"></td>
					<td><br><input type="reset" value="Limpar"><td>
					</tr>
				</iform>
			</table>
		</div>
		<?php if (isset($_GET['inclusao']) && $_GET['inclusao'] == 1)
				print"<script>alert('solicitação realizada!')</script>"
		 ?>

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
   		<script src="js/bootstrap.min.js"></script>	
	</body>
</html>