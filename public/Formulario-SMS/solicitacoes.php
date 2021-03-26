<?php

session_start();

if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM'){
	header('location: index.php?login=erro2');
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
					<a class="nav-link" href="">Solicitações</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="">Contato</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="logoff.php">Sair</a>
				</li>
			</ul>
		</nav>
		<h2 align="center"> Solicitações </h2>
			<div style="font-size: 12px ">
				<table align="center" border="1" width="99%" >
					<tr>
						<th style="text-align:center; width:4%">ID </th>
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
					<?php foreach($solicitacoes as $indice => $solicitacao){ ?>
						<tr>
							<td style="width: 4%"><?= $solicitacao->id_solicitacao ?></td>
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
				</table>
			</div>
			<!--<div class="">
				<form>
					<input type="number" name="ID" min="1" max="999999">
					<input type="submit" value="Executar">
				</form>
			</div>-->
	</body>

</html>