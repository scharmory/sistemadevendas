<?php
	include_once("dao/DaoCliente.class.php");
	class ClienteController{
		public function salvarClienteNoBanco($dadosDoFormulario){
			$dao = new DaoCliente();
			$dao->salvarClienteNoBanco($dadosDoFormulario);
		}

		function excluir($id)
		{
			$dao = new DaoCliente ();
			return $dao ->excluir($id);
		}
		
		public function listarClientes(){
			$dao = new DaoCliente();
			return $dao ->listarClientes();
		}
		function buscarClientePorIdNoBanco($id)
			{
				$dao = new DaoCliente ();
				return $dao ->buscarClientePorIdNoBanco($id);
			}
		function atualizarCliente($post){
			$dao = new DaoCliente();
			 $dao -> atualizar($post);
		}
	}

?>