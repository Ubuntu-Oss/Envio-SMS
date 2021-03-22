<?php

	session_start();
	if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM'){
	header('location: index.php?login=erro2');
	}
	require_once('../../Projeto-SMS/solicitacao.php');
	require_once('../../Projeto-SMS/solicitacao_service.php');
	require_once('../../Projeto-SMS/conexao.php');

?>