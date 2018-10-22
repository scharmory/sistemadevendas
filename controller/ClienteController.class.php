<?php
	include_once("model/Cliente.class.php");
	include_once("dao/DaoCliente.class.php");
	class ClienteController{
		public function salvarClienteNoBanco($dadosDoFormulario){
			$dao = new DaoCliente();
			$dao->salvarClienteNoBanco($dadosDoFormulario);
		}

		function excluir($id)
		{
			$dao = new DaoCliente ();
			$dao ->excluir($id);
		}
		
		public function listarClientes(){
			$dao = new DaoCliente();
			return $dao ->listarClientes();
		}
	}

?>