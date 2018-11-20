<?php
	class Funcionario{
		private $idFuncionario;
		private $nome;
		private $endereco;
		private $telefone;

		public function getIdFuncionario(){
			return $this->idFuncionario;
		}
		public function setIdFuncionario($idFuncionario){
			$this->idFuncionario = $idFuncionario;
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

		public function getSalario(){
			return $this->salario;
		}
		public function setSalario($salario){
			$this->salario = $salario;
		}


	}
?>