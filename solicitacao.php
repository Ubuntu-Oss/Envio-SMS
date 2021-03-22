<?php
	class Solicitacao{
		private $id_solicitacao;
		private $funcional_funcionario;
		private $nome_evento;
		private $local_evento;
		private $data_disparo;
		private $data_inicial;
		private $data_final;
		private $filial;
		private $meses_q;
		private $meses_aq;
		private $celulares_adicionais;
		private $fraseologia;

		public function __get($atributo){
			return $this->$atributo;

		}
		public function __set($atributo, $valor){
			$this->$atributo = $valor;
		}
	}

?>