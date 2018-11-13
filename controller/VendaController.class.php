<?php
	include_once("model/Venda.class.php");
	include_once("dao/DaoVenda.class.php");
	include_once("dao/DaoProduto.class.php");
	include_once("dao/DaoCliente.class.php");

	class VendaController{
		public function salvarVendaNoBanco($dadosDoFormulario){
			
			$dao = new DaoVenda();
			$dao->salvarVendaNoBanco($dadosDoFormulario);

		}
		public function cadastrar($dadosDoFormulario){
			$dao = new DaoUsuario();
			$dao->salvarUsuarioNoBanco($dadosDoFormulario);
			return "Venda cadastrada com sucesso!";
		}

		public function listarProdutos(){
			$dao = new DaoProduto();
			return $dao->listarProdutos();
			
		}

		public function listarClientes(){
			$dao = new DaoCliente();
			return $dao->listarClientes();
			
		}

		function buscarVendaPorIdNoBanco($id)
		{
			$dao = new DaoVenda ();
			return $dao ->buscarVendaPorIdNoBanco($id);
		}
		
		public function excluir($id)
		{
			$dao = new DaoVenda ();
			$dao ->excluir($id);
		}

		public function listarVendas(){
			$dao = new DaoVenda();
			return $dao ->listarVendas();
		}
	}

?>