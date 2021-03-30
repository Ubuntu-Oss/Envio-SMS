<?php

session_start();

if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM'){
	header('location: index.php?login=erro2');
}

if ($_SESSION['permissao'] == 'nao'){
	header('location: formulario.php?perm_erro=1');
}

$acao = 'recuperar';
require "solicitacao_controller.php";

?>

<!DOCTYPE html>
<html lang="br">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="css/bootstrap.min.css">
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

		<?php if(isset($_GET['execucao']) && $_GET['execucao'] == 1){ ?>
			<div class="bg-success text-white pt-2 mb-2 d-flex justify-content-center">
				<h5>Base separada!</h5>
			</div>
		<?php } ?>

		<?php if(isset($_GET['erro']) && $_GET['erro'] == 1){ ?>
			<div class="bg-danger text-white pt-2 mb-2 d-flex justify-content-center">
				<h5>Erro: base já separada!</h5>
			</div>
		<?php } ?>

		<div class="mt-1 mb-0 d-flex justify-content-center">
			<h2> Solicitações </h2>
		</div>
		<div class="container bg-light ml-0" style="width:250px">
				<form name="frm2" action="base_controller.php" method="post">
					<div class="form-group d-inline-block ml-1 mt-3">
						<input class="form-control" type="number" name="Id" min="1" max="999999">
					</div>
					<div class="form-group d-inline-block">
						<input class="btn btn-danger" type="submit" value="Executar">
					</div>
				</form>
		</div>
		<div class="px-2">
			<table class="table-striped table-bordered table-responsive" style="font-size: 12px;">
				<thead class="table-dark">
					<tr>
						<th style="text-align:center; width:2%">ID </th>
						<th style="text-align:center; width:2%">Feito</th>
						<th style="text-align:center; width:7%">Solicitante</th>
						<th style="text-align:center; width:10%">Nome do evento</th>
						<th style="text-align:center; width:10%">Local do evento</th>
						<th style="text-align:center; width:5%">Disparo do SMS</th>
						<th style="text-align:center; width:5%">Início do evento</th>
						<th style="text-align:center; width:5%">Fim do evento</th>
						<th style="text-align:center; width:3%">Filial(is)</th>
						<th style="text-align:center; width:5%">CQ (meses)</th>
						<th style="text-align:center; width:5%">CAQ (meses)</th>
						<th style="text-align:center; width:11.5%">Celular(es) adicional(is)</th>
						<th style="text-align:center; width:22%">Fraseologia</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($solicitacoes as $indice => $solicitacao){ ?>
						<tr>
							<td style="width: 2%"><?= $solicitacao->id_solicitacao ?></td>
							<td style="width: 2%"><?= $solicitacao->feito ?></td>
							<td style="width: 7%"><?= $solicitacao->nome_funcionario ?></td>
							<td style="width: 10%"><?= $solicitacao->nome_evento ?></td>
							<td style="width: 10%"><?= $solicitacao->local_evento ?></td>
							<td style="width: 5%"><?= $solicitacao->data_disparo ?></td>
							<td style="width: 5%"><?= $solicitacao->data_inicial ?></td>
							<td style="width: 5%"><?= $solicitacao->data_final ?></td>
							<td style="width: 3%; word-break:break-all"><?= $solicitacao->filial ?></td>
							<td style="width: 5%"><?= $solicitacao->meses_q ?></td>
							<td style="width: 5%"><?= $solicitacao->meses_aq ?></td>
							<td style="width: 11.5%; word-break:break-all"><?= $solicitacao->celulares_adicionais ?></td>
							<td style="width: 22%"><?= $solicitacao->fraseologia ?></td>
						</tr>
					<?php } ?>
				</tbody> 
			</table>
		</div>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
   		<script src="js/bootstrap.min.js"></script>	
	</body>

</html>