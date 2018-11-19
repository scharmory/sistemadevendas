<?php
	class Fornecedor{
		private $idFornecedor;
		private $nome;
		private $endereco;
		private $telefone;

		public function getIdFornecedor(){
			return $this->idFornecedor;
		}
		public function setIdFornecedor($idFornecedor){
			$this->idFornecedor = $idFornecedor;
		}

		
		public function getNome(){
			return $this->nome;
		}
		public function setNome($nome){
			$this->nome = $nome;
		}

		public function getEndereco(){
			return $this->endereco;
		}
		public function setEndereco($endereco){
			$this->endereco = $endereco;
		}
		
		public function getTelefone(){
			return $this->telefone;
		}
		public function setTelefone($telefone){
			$this->telefone = $telefone;
		}


	}
?>