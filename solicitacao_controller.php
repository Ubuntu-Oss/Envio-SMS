<?php
	session_start();
 
	require "../../Projeto-SMS/solicitacao_model.php";
	require "../../Projeto-SMS/conexao.php";
	require "../../Projeto-SMS/solicitacao_service.php";

	$acao = isset($_GET['acao'])? $_GET['acao'] : $acao;

	$conexao = new Conexao();

	if($acao == 'inserir'){
	
		$nome = ucfirst($_POST['NomeEvento']);
		$local = ucfirst($_POST['LocalEvento']);
		$solicitacao = new Solicitacao();
		$solicitacao->__set('funcional_funcionario', $_SESSION['funcional']);
		$solicitacao->__set('nome_evento', $nome);
		$solicitacao->__set('local_evento', $local);
		$solicitacao->__set('data_disparo', $_POST['DataDisparo']);
		$solicitacao->__set('data_inicial', $_POST['DataEventoI']);
		$solicitacao->__set('data_final', $_POST['DataEventoF']);
		$solicitacao->__set('codigo_filial', $_POST['CodigoFilial']);
		$solicitacao->__set('meses_q', $_POST['MesesQ']);
		$solicitacao->__set('meses_aq', $_POST['MesesAq']);
		$solicitacao->__set('celulares_adicionais', $_POST['CelularesAdicionais']);
		$fraseologia="";
		$data_i=$_POST['DataEventoI'];
		$data_f=$_POST['DataEventoF'];
		$data_ni=$data_i[8].$data_i[9]."/".$data_i[5].$data_i[6];
		$data_nf=$data_f[8].$data_f[9]."/".$data_f[5].$data_f[6];
		if($data_i == $data_f){
			$fraseologia="Bradesco Financiamentos: Confira nossas condições no(a) " .$nome. ", dia " .$data_ni. " no(a) " .$local. ". P/ cancelar envie 1";
		}else{
			$fraseologia="Bradesco Financiamentos: Confira nossas condições no(a) " .$nome. ", de " .$data_ni. " a " .$data_nf. " no(a) " .$local. ". P/ cancelar envie 1";
		}
		$solicitacao->__set('fraseologia', $fraseologia);

		$service = new SolicitacaoService($conexao, $solicitacao);
		$service->inserir();

		header('location: formulario.php?inclusao=1');

	} else if($acao == 'recuperar'){
		$solicitacao = new Solicitacao();
		$service = new SolicitacaoService($conexao, $solicitacao);
		$solicitacoes = $service->recuperar();

	}

?>