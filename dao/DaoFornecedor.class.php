<?php

	//include_once("model/Fornecedor.class.php");
	include_once("includes/Conexao.class.php");	

	class DaoFornecedor {

		public function listarFornecedores () {
			$sql = "SELECT * FROM tb_fornecedor";
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
			
			$fornecedor = new Fornecedor();
			$fornecedor->setIdFornecedor($dadosDoBanco['id_fornecedor']);
			$fornecedor->setNome($dadosDoBanco['nome']);
			$fornecedor->setEndereco($dadosDoBanco['endereco']);
			$fornecedor->setTelefone($dadosDoBanco['telefone']);

 			return $fornecedor;
		
		}
		public function salvarFornecedorNoBanco($dadosDoFormulario){
			$sql = "INSERT INTO tb_fornecedor (id_fornecedor, nome, endereco, telefone) VALUES (NULL, :nome, :endereco, :telefone);";
			$sqlPreparado = Conexao::meDeAConexao()->prepare($sql);
			$sqlPreparado->bindValue(":nome",$dadosDoFormulario['nomef']);
			$sqlPreparado->bindValue(":endereco",$dadosDoFormulario['enderecof']);
			$sqlPreparado->bindValue(":telefone",$dadosDoFormulario['telefonef']);
			$resposta = $sqlPreparado->execute();
			//var_dump($sqlPreparado->errorInfo());
			
		}

		public function buscarFornecedorPorIdNoBanco($id){
					$sql = "SELECT * FROM tb_fornecedor WHERE id_fornecedor=:id";
					$sqlPreparado = Conexao::meDeAConexao()->prepare($sql);
					$sqlPreparado->bindValue(":id",$id);
					$resposta = $sqlPreparado->execute();
					$fornecedor = $this->transformaDadosDoBancoEmObjeto($sqlPreparado->fetch(PDO::FETCH_ASSOC));
					return $fornecedor;
				}

		public function atualizar($post){
			$sql = "UPDATE 
					tb_fornecedor 
					SET 
					nome=:nome,
					endereco=:endereco,
					telefone=:telefone
					WHERE id_fornecedor=:id";
			$sqlPreparado = Conexao::meDeAConexao()->prepare($sql);
			$sqlPreparado->bindValue(":id",$post['codigo']);
			$sqlPreparado->bindValue(":nome",$post['nomef']);
			$sqlPreparado->bindValue(":endereco",$post['enderecof']);
			$sqlPreparado->bindValue(":telefone",$post['telefonef']);
			$resposta = $sqlPreparado->execute();
		}
		
		public function excluir($id){
			$sql = "DELETE  FROM tb_fornecedor WHERE id_fornecedor=:id";
			$sqlPreparado = Conexao::meDeAConexao()->prepare($sql);
			$sqlPreparado->bindValue(":id",$id);
			$resposta = $sqlPreparado->execute();
			
			return $sqlPreparado->rowCount();
		}

	}

?>