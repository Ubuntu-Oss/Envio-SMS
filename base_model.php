<?php
	class Base{
		private $id_solicitacao;
		private $filial;
		private $data_fq;
		private $data_faq;
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