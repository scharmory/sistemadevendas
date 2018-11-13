<?php	
	class Venda{
		private $idVenda;
		private $produto;
		private $quantVendida;
		private $desconto;
		private $valorTotal;
		private $valorFinal;
		private $cliente;

		public function getIdVenda(){
			return $this->idVenda;
		}
		public function setIdVenda($idVenda){
			$this->idVenda = $idVenda;
		}

		public function getProduto(){
			return $this->produto;
		}
		public function setProduto($produto){
			$this->produto = $produto;
		}

		public function getQuantVendida(){
			return $this->quantVendida;
		}
		public function setQuantVendida($quantVendida){
			$this->quantVendida = $quantVendida;
		}

		public function getDesconto(){
			return $this->desconto;
		}
		public function setDesconto($desconto){
			$this->desconto = $desconto;
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
		public function getCliente(){
			return $this->cliente;
		}
		public function setCliente($cliente){
			$this->cliente = $cliente;
		}
		
		
	}
?>