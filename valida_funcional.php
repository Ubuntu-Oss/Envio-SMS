<?php
	$dns = 'mysql:localhost;dbname=bd_formulario_sms';
	$ususario = 'root';
	$senha = '';
	$acesso = false;

	try{
		$conexao = new PDO($dns,$ususario,$senha);
		$query = 'select * from bd_formulario_sms.tb_acessos_funcionarios';
		$stmt = $conexao->query($query);
		$lista = $stmt->fetchAll();

		foreach ($lista as $funcionario) {
			if($funcionario['funcional'] == $_POST['funcional']){
				$acesso = true;
			}
		}

		if ($acesso){
			echo ('entrou');
		} else{
			header('location: index.php?login=erro');
		   }  

	}catch(PDOException $e){
		echo('Erro: ' .$e->getErro() .' Mensagem: ' .$e->getMessage());
	}
?>