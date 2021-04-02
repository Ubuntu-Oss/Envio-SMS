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
		<nav class="navbar navbar-expand-sm navbar-light bg-white border-bottom">
			<a class="navbar-brand" href="#">
				<img src="img/bradesco.png" width="30" height="30" class="d-inline-block align-top" alt="">
				SMS Feirão
			</a>
			<button class="navbar-toggler" data-toggle="collapse" data-target="#naveg">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="naveg">
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
			</div>	
		</nav>
		<?php if (isset($_GET['inclusao']) && $_GET['inclusao'] == 1){?>
			<div class="bg-success pt-2 mb-2 text-white d-flex justify-content-center">
				<h5> Solicitação realizada! </h5>
			</div>
		<?php } ?>
		<div class="mt-2 mb-3 d-flex justify-content-center">
			<h2> Formulário de solicitação </h2>
		</div>
		<div class="card bg-light" style="width: 350px; margin: 0 auto">
			<div class="card-header bg-danger py-2 text-white d-flex justify-content-center">
				<h5> <?= ($_SESSION['nome'])?> </h5>	
			</div>
			<div class="card-body">
				<form name="frm" action="solicitacao_controller.php?acao=inserir" method="post">
					<div class="form-group">
						<input class="form-control"type="text" id="NomeEvento" name="NomeEvento" placeholder="Nome do evento" maxlength="26">
					</div>
					<div class="form-group">
						<input class="form-control"type="text" id="LocalEvento" name="LocalEvento" placeholder="Local do evento" maxlength="32">
					</div>
					<div class="form-group">
						<label for="DataDisparo">Data do disparo SMS</label>
						<input class="form-control"type="date" id="DataDisparo" name="DataDisparo">
					</div>
					<div class="form-group">
						<label for="DataEventoI"> Data inicial do evento</label>
						<input class="form-control" type="date" id="DataEventoI" name="DataEventoI">
					</div>
					<div class="form-group">
						<label for="DataEventoF">Data final do evento</label>
						<input class="form-control" type="date" id="DataEventoF" name="DataEventoF">
					</div>
					<div class="form-group">
						<label for=CodigoFilial>Códigos das Filiais</label>
						<input class="form-control" type="text" id="CodigoFilial" name="CodigoFilial" placeholder="Ex. 123,4321,456" maxlength="15">
						<small>separar números com (,)</small>
					</div>
					<div class="form-group d-inline-block mr-4 ml-3">
						<label for="MesesQ">Meses quitados</label>
						<input class="form-control" type="number" name="MesesQ" id="MesesQ" min="1" max="24">
					</div>
					<div class="form-group d-inline-block ml-4">
						<label for="MesesQ">Meses a quitar</label>
						<input class="form-control" type="number" name="MesesAq" id="MesesAq" min="1" max="24">
					</div>
					<div class="form-group">
						<label for="CelularesAdicionais">Celulares adicionais</label>
						<input class="form-control" type="textarea" id="CelularesAdicionais" name="CelularesAdicionais" placeholder="Ex. 11912345678,21912345678,13912345678" maxlength="200">
						<small>separar números com (,)</small>
					</div>
					<div class="form-group">
						<input class="btn btn-block btn-danger"type="button" value="solicitar" onclick="validarCampos()"></td>
					</div>
				</form>
			</div>
		</div>
		<?php if(isset($_GET['perm_erro']) && $_GET['perm_erro'] == '1' ){ ?>
			<script>alert('área restrita ao CRM');</script>
		<?php } ?>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
   		<script src="js/bootstrap.min.js"></script>	
	</body>
</html>