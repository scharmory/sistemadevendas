<?php
	class Produto{
		private $idProduto;
		private $nome;
		private $estoque;
		private $precoc;
		private $precov;

		public function getIdProduto(){
			return $this->idProduto;
		}
		public function setIdProduto($idProduto){
			$this->idProduto = $idProduto;
		}

		
		public function getNome(){
			return $this->nome;
		}
		public function setNome($nome){
			$this->nome = $nome;
		}

		public function getestoque(){
			return $this->estoque;
		}
		public function setestoque($estoque){
			$this->estoque = $estoque;
		}

		public function getPrecoc(){
			return $this->precoc;
		}
		public function setPrecoc($precoc){
			$this->precoc = $precoc;
		}

		public function getPrecov(){
			return $this->precov;
		}
		public function setPrecov($precov){
			$this->precov = $precov;
		}

	}
?>