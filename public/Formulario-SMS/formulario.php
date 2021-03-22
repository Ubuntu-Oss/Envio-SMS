<?php

session_start();

if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM'){
	header('location: index.php?login=erro2');
}

?>


<html lang="br">
<meta charset="UTF-8">

	<head>
		<title>Formulário Feirão</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script type="text/javascript" src="valida_campos.js"></script>
	</head>

	<body>
		<nav class="navbar navbar-light bg-light">
			<a class="navbar-brand" href="#">
				<img src="img/bradesco.png" width="30" height="30" class="d-inline-block align-top" alt="">
				SMS Feirão
			</a>
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="logoff.php">SAIR</a>
				</li>
			</ul>

		</nav>
		<div>
			<table class="tableF" width="200px" align="center">
				<h2 align="center"> Formulário de solicitação </h2>
				<br>
				<form name="frm" action="solicita.php" method="post">
					<tr>
						<td><?php echo ($_SESSION['nome']); ?><br><br></td>
						<td><?php echo ($_SESSION['email']);?><br><br></td>
					</tr>
					<tr>
						<td><input type="text" id="NomeEvento" name="NomeEvento" placeholder="Nome do evento" required=”true”></td>
						<td><input type="text" id="LocalEvento" name="LocalEvento" placeholder="Local do evento" required=”true”></td>
					</tr>
					<tr>
						<td>Data do disparo SMS</td>
						<td><input type="date" id="DataDisparo" name="DataDisparo" required=”true”></td>
					</tr>
					<tr>
						<td>Data inicial do evento</td>
						<td><input type="date" id="DataEventoI" name="DataEventoI" required=”true”></td>
					</tr>
					<tr>
						<td>Data final do evento</td>
						<td><input type="date" id="DataEventoF" name="DataEventoF" required=”true”></td>
					</tr>
					<tr>
						<td>Código da filial.<br>Separar números com (,)</td>
						<td><input type="text" id="CodigoFilial" name="CodigoFilial" placeholder="Ex. 123,321,456" required=”true”></td>
					</tr>
					<tr>
						<td>Meses quitados</td>
					<td>
						<input type="radio" name="MesesQ" value="06" required=”true”>
						6 meses
						<input type="radio" name="MesesQ" value="12" required=”true”>
						12 meses <br>
						<input type="radio" name="MesesQ" value="18" required=”true”>
						18 meses
						<input type="radio" name="MesesQ" value="24" required=”true”>
						24 meses
					</td>
					</tr>
					<tr>
						<td>Meses a quitar</td>
					<td>
						<input type="radio" name="MesesAq"  value="06" required=”true”>
						6 meses
						<input type="radio" name="MesesAq" value="12" required=”true”>
						12 meses <br>
						<input type="radio" name="MesesAq" value="18" required=”true”>
						18 meses 
						<input type="radio" name="MesesAq" value="24" required=”true”>
						24 meses 
					</td>
					</tr>
					<tr>
					<td>Celulares adicionais.<br>Separar números com (,)</td>
					<td><input type="text" id="CelularesAdicionais" name="CelularesAdicionais" placeholder="Ex. 11912345678,21912345678"></td>
					</tr>
					<tr>
					<td><br><input type="button" value="solicitar" onclick="validarCampos()"></td>
					<td><br><input type="reset" value="Limpar"><td>
					</tr>
				</iform>
			</table>
		</div>	
	</body>
</html>