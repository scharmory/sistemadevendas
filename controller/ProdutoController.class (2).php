<?php
	include_once("model/Produto.class.php");
	include_once("dao/DaoProduto.class.php");
	class ProdutoController{
		public function salvarProdutoNoBanco($dadosDoFormulario){
			
			$dao = new DaoProduto();
			$dao->salvarProdutoNoBanco($dadosDoFormulario);

		}
		public function cadastrar($dadosDoFormulario){
			$dao = new DaoUsuario();
			$dao->salvarUsuarioNoBanco($dadosDoFormulario);
			return "Produto cadastrado com sucesso!";
		}
		
		public function excluir($id)
		{
			$dao = new DaoProduto ();
			$dao ->excluir($id);
		}

		public function listarProdutos(){
			$dao = new DaoProduto();
			return $dao ->listarProdutos();
		}

		function buscarProdutoPorIdNoBanco($id)
		{
			$dao = new DaoProduto ();
			return $dao ->buscarProdutoPorIdNoBanco($id);
		}

		function atualizarProduto($post){
			$dao = new DaoProduto();
			$dao -> atualizar($post);
		}
	}

?>