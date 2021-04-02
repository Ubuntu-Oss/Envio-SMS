<?php
	session_start();
	require_once('../../Projeto-SMS/conexao.php');
	
		$conexao =  new Conexao();
		$conexao = $conexao->conectar();
		$query = "SELECT * from bd_formulario_sms.tb_acessos_funcionarios where funcional = :funcional" ;
		$stmt = $conexao->prepare($query);
		$stmt->bindValue(':funcional', $_POST['funcional']);
		$stmt->execute();
		$lista = $stmt->fetchAll(PDO::FETCH_ASSOC);

		if(!empty($lista)){
			$_SESSION['autenticado'] = 'SIM';
			$_SESSION['funcional'] = $lista[0]['funcional'];
			$_SESSION['nome'] = $lista[0]['nome_funcionario'];
			$_SESSION['email'] = $lista[0]['email_funcionario'];
			$_SESSION['permissao'] = $lista[0]['permissao'];

			header ('location: formulario.php');
		} else{
			$_SESSION['autenticado'] = 'NAO';
			header('location: index.php?login=erro');
		   }  



?>