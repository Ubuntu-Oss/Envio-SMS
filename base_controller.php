<?php
 	
 	require '../../Projeto-SMS/conexao.php';
 	require '../../Projeto-SMS/base_model.php';
 	require '../../Projeto-SMS/base_service.php';

 	
 	$conexao = new Conexao();
 	$conexao1 = $conexao->conectar();
 	$query = "SELECT * from bd_formulario_sms.tb_solicitacoes where id_solicitacao = :id";
 	$stm = $conexao1->prepare($query);
 	$stm->bindValue(':id', $_POST['Id']);
 	$stm->execute();
 	$lista = $stm->fetchAll(PDO::FETCH_ASSOC);
 	$erro = 0;
 	$erro_msg = "";
 	$query = "SELECT DISTINCT filial FROM bd_formulario_sms.tb_producao";
 	$stm = $conexao1->prepare($query);
 	$stm->execute();
 	$ls_filiais = $stm->fetchAll(PDO::FETCH_ASSOC);


 	$filial = explode(",",$lista[0]['filial']);


	for($i=0; $i<count($filial); $i++){
		for($i2=0; $i2<count($ls_filiais); $i2++){
			if($filial[$i] == $ls_filiais[$i2]['filial']){
			 	$erro=0;
			 	break;
			} else{	
			 	$erro=1;
			  }
		}
		if($erro==1){
			$erro_msg .= $filial[$i].",";
		}
	}
	$erro_msg = substr($erro_msg, 0, -1);

	if ($erro_msg == ""){
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
	} else {
		header('location: solicitacoes.php?erro_f='.$erro_msg);
	}

?>