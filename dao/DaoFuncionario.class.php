<?php

	//include_once("model/Funcionario.class.php");
	include_once("includes/Conexao.class.php");	

	class DaoFuncionario {

		public function listarFuncionarios () {
			$sql = "SELECT * FROM tb_funcionario";
			$sqlPreparado = Conexao::meDeAConexao()->prepare($sql);
			$resposta = $sqlPreparado->execute();
			$lista = $sqlPreparado->fetchAll(PDO::FETCH_ASSOC);
			//var_dump($lista);

			$vetorDeObjetos = array();
			foreach ($lista as $linha) {
					$vetorDeObjetos [] = $this ->transformaDadosDoBancoEmObjeto ($linha);
 			} 
			
			return $vetorDeObjetos;

		}
		
		public function transformaDadosDoBancoEmObjeto($dadosDoBanco)
		{
			
			$funcionario = new Funcionario();
			$funcionario->setIdFuncionario($dadosDoBanco['id_funcionario']);
			$funcionario->setNome($dadosDoBanco['nome']);
			$funcionario->setEndereco($dadosDoBanco['endereco']);
			$funcionario->setTelefone($dadosDoBanco['telefone']);
			$funcionario->setSalario($dadosDoBanco['salario']);

 			return $funcionario;
		
		}
		public function salvarFuncionarioNoBanco($dadosDoFormulario){
			$sql = "INSERT INTO tb_funcionario (id_funcionario, nome, endereco, telefone, salario) VALUES (NULL, :nome, :endereco, :telefone, :salario);";
			$sqlPreparado = Conexao::meDeAConexao()->prepare($sql);
			$sqlPreparado->bindValue(":nome",$dadosDoFormulario['nomef']);
			$sqlPreparado->bindValue(":endereco",$dadosDoFormulario['enderecof']);
			$sqlPreparado->bindValue(":telefone",$dadosDoFormulario['telefonef']);
			$sqlPreparado->bindValue(":salario",$dadosDoFormulario['salariof']);
			$resposta = $sqlPreparado->execute();
			//var_dump($sqlPreparado->errorInfo());
			
		}

		public function excluir($id){
			$sql = "DELETE  FROM tb_funcionario WHERE id_funcionario=:id";
			$sqlPreparado = Conexao::meDeAConexao()->prepare($sql);
			$sqlPreparado->bindValue(":id",$id);
			$resposta = $sqlPreparado->execute();
		}

	}

?>