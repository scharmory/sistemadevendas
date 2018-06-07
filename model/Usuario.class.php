<?php
	class Usuario{
		private $idUsuario;
		private $nome;
		private $sobrenome;
		private $email;
		private $senha;

		public function getIdUsuario(){
			return $this->idUsuario;
		}
		public function setIdUsuario($idUsuario){
			$this->idUsuario = $idUsuario;
		}

		
		public function getNome(){
			return $this->nome;
		}
		public function setNome($nome){
			$this->nome = $nome;
		}
		public function getSobrenome(){
			return $this->sobrenome;
		}
		public function setSobrenome($nome){
			$this->sobrenome = $sobrenome;
		}

		public function getEmail(){
			return $this->email;
		}
		public function setEmail($email){
			$this->email = $email;
		}
		public function getSenha(){
			return $this->senha;
		}
		public function setSenha($senha){
			$this->senha = $senha;
		}


	}
?>