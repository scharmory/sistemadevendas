<?php
	class Venda{
		private $idVenda;
		private $cliente;
		private $valorTotal;
		private $valorFinal;
		private $desconto;

		public function getIdVenda(){
			return $this->idVenda;
		}
		public function setIdVenda($idVenda){
			$this->idVenda = $idVenda;
		}

		
		public function getCliente(){
			return $this->cliente;
		}
		public function setCliente($cliente){
			$this->cliente = $cliente;
		}

		public function getValorTotal(){
			return $this->valorTotal;
		}
		public function setValorTotal($valorTotal){
			$this->valorTotal = $valorTotal;
		}

		public function getValorFinal(){
			return $this->valorFinal;
		}
		public function setValorFinal($valorFinal){
			$this->valorFinal = $valorFinal;
		}

		public function getDesconto(){
			return $this->desconto;
		}
		public function setDesconto($desconto){
			$this->desconto = $desconto;
		}
	}
?>