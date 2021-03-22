<?php
	class Conexao{
		private $host = 'localhost';
		private $dbname ='bd_formulario_sms';
		private $ususario = 'root';
		private $senha = '';

		public function conectar(){
			try{
				$conexao = new PDO("mysql:host=$this->host;dbname=$this->dbname",
								   "$this->ususario",
								   "$this->senha"
								  );

				return $conexao;	

			} catch(PDOException $e){
			echo('Erro: ' .$e->getErro() .' Mensagem: ' .$e->getMessage());
			  }
		}
	}
?>