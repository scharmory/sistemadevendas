<?php
	class Cliente{
		private $idCliente;
		private $nome;
		private $endereco;
		private $celular;
		private $telefone;

		public function getIdCliente(){
			return $this->idCliente;
		}
		public function setIdCliente($idCliente){
			$this->idCliente = $idCliente;
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
		public function getCelular(){
			return $this->celular;
		}
		public function setCelular($celular){
			$this->celular = $celular;
		}
		public function getTelefone(){
			return $this->telefone;
		}
		public function setTelefone($telefone){
			$this->telefone = $telefone;
		}


	}
?>