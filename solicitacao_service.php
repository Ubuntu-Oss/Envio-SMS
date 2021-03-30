<?php
	class SolicitacaoService{
		private $conexao;
		private $solicitacao;

		public function __construct(Conexao $conexao, Solicitacao $solicitacao){
			$this->conexao = $conexao->conectar();
			$this->solicitacao = $solicitacao;
		}

		public function inserir(){
			$query = "insert into tb_solicitacoes(funcional_funcionario, nome_evento, local_evento, data_disparo, data_inicial, data_final, filial, meses_q, meses_aq, celulares_adicionais, fraseologia) VALUES (:funcional,:nome,:local,:datad,:datai,:dataf,:filial,:mesesq,:mesesaq,:celular,:frase);";
			$stm =$this->conexao->prepare($query);
			$stm->bindValue(':funcional', $this->solicitacao->__get('funcional_funcionario'));
			$stm->bindValue(':nome', $this->solicitacao->__get('nome_evento'));
			$stm->bindValue(':local', $this->solicitacao->__get('local_evento'));
			$stm->bindValue(':datad', $this->solicitacao->__get('data_disparo'));
			$stm->bindValue(':datai', $this->solicitacao->__get('data_inicial'));
			$stm->bindValue(':dataf', $this->solicitacao->__get('data_final'));
			$stm->bindValue(':filial', $this->solicitacao->__get('codigo_filial'));
			$stm->bindValue(':mesesq', $this->solicitacao->__get('meses_q'));
			$stm->bindValue(':mesesaq', $this->solicitacao->__get('meses_aq'));
			$stm->bindValue(':celular', $this->solicitacao->__get('celulares_adicionais'));
			$stm->bindValue(':frase', $this->solicitacao->__get('fraseologia'));
			$stm->execute();
		}

		public function recuperar(){
			$query = "select 
						t1.id_solicitacao, t1.feito, t2.nome_funcionario, t1.nome_evento, t1.local_evento,
						t1.data_disparo, t1.data_inicial, t1.data_final, t1.filial, t1.meses_q, t1.meses_aq, 
						t1.celulares_adicionais, t1.fraseologia
					  from 
					  	tb_solicitacoes as t1
					  	left join tb_acessos_funcionarios as t2 on (t1.funcional_funcionario = t2.funcional)";
			$stm=$this->conexao->prepare($query);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}

	}
?>