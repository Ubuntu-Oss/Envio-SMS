<?php
 	
 	require '../../Projeto-SMS/conexao.php';
 	require '../../Projeto-SMS/base_model.php';
 	require '../../Projeto-SMS/base_service.php';

 	
 	$conexao = new Conexao();
 	$conexao1 = $conexao->conectar();
 	$query = "select * from bd_formulario_sms.tb_solicitacoes where id_solicitacao = :id";
 	$stm = $conexao1->prepare($query);
 	$stm->bindValue(':id', $_POST['Id']);
 	$stm->execute();
 	$lista = $stm->fetchAll(PDO::FETCH_ASSOC);

 	if($lista[0]['feito'] == "nao"){
 		$base = new Base();
	 	$base->__set('id_solicitacao', $lista[0]['id_solicitacao']);
	 	$base->__set('filial', $lista[0]['filial']);
	 	$data_q = $lista[0]['meses_q'];
	 	$data_aq = $lista[0]['meses_aq'];
	 	$data_q = date('Y-m-d', strtotime('-'.$data_q.' month'));
	 	$data_aq= date('Y-m-d', strtotime('+'.$data_aq.' month'));
	 	$base->__set('data_fq', $data_q);
	 	$base->__set('data_faq', $data_aq);
	 	$base->__set('celulares_adicionais', $lista[0]['celulares_adicionais']);
	 	$base->__set('fraseologia', $lista[0]['fraseologia']);

	 	$service = new BaseService($conexao, $base);
	 	$service->criar();
	 	
	 	header('location: solicitacoes.php?execucao=1');
	
	} else {
		header('location: solicitacoes.php?erro=1');
	  }

?>