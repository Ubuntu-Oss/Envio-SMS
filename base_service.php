<?php
	class BaseService{
		private $conexao;
		private $base;

		public function __construct(Conexao $conexao, Base $base){
			$this->conexao = $conexao->conectar();
			$this->base = $base;
		}

		public function criar(){
			$query="CREATE TABLE if not exists evento_".$this->base->__get('id_solicitacao')." as select celular from bd_formulario_sms.tb_producao where filial in (".$this->base->__get('filial').") and data_contrato between '".$this->base->__get('data_fq')."' and '".$this->base->__get('data_faq')."'";
		 	$stm = $this->conexao->prepare($query);
		 	$stm->execute();
			$query="UPDATE bd_formulario_sms.tb_solicitacoes set feito = 'sim' where id_solicitacao = ".$this->base->__get('id_solicitacao');
		 	$stm= $this->conexao->prepare($query);
		 	$stm->execute();

		 	if($this->base->__get('celulares_adicionais') != ""){
			 	$cel = explode(",",$this->base->__get('celulares_adicionais'));
			 	$resposta = "(";

			 	for($i=0;$i<count($cel);$i++){

			 		$resposta .= $cel[$i];
			 		$resposta .= "),(";
			 	}
			 	$resposta= substr($resposta, 0, -2);

				$query = "INSERT into bd_formulario_sms.evento_".$this->base->__get('id_solicitacao')."(celular) values ".$resposta;
				$stm = $this->conexao->prepare($query);
				$stm->execute();	
			}
		}	
	}
?>