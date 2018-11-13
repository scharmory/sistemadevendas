<?php
	include_once("model/Funcionario.class.php");
	include_once("dao/DaoFuncionario.class.php");
	class FuncionarioController{
		public function salvarFuncionarioNoBanco($dadosDoFormulario){
			$dao = new DaoFuncionario();
			$dao->salvarFuncionarioNoBanco($dadosDoFormulario);
		}

		function excluir($id)
		{
			$dao = new DaoFuncionario ();
			$dao ->excluir($id);
		}

		public function listarFuncionarios(){
			$dao = new DaoFuncionario();
			return $dao ->listarFuncionarios();
		}
	
		function buscarFuncionarioPorIdNoBanco($id)
			{
				$dao = new DaoFuncionario ();
				return $dao ->buscarFuncionarioPorIdNoBanco($id);
			}

		function atualizarFuncionario($post){
			$dao = new DaoFuncionario();
			$dao -> atualizar($post);
		}
	}

?>