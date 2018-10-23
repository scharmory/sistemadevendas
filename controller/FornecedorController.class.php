<?php
	include_once("model/Fornecedor.class.php");
	include_once("dao/DaoFornecedor.class.php");
	class FornecedorController{
		public function salvarFornecedorNoBanco($dadosDoFormulario){
			$dao = new DaoFornecedor();
			$dao->salvarFornecedorNoBanco($dadosDoFormulario);
		}

		function excluir($id)
		{
			$dao = new DaoFornecedor ();
			$dao ->excluir($id);
		}

		public function listarFornecedores(){
			$dao = new DaoFornecedor();
			return $dao ->listarFornecedores();
		}
	}

?>