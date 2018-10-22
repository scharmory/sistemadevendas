<?php

	include_once("model/Cliente.class.php");
	include_once("includes/Conexao.class.php");	

	class DaoCliente {

		public function listarClientes () {
			$sql = "SELECT * FROM tb_cliente";
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
			
			$cliente = new Cliente();
			$cliente->setIdCliente($dadosDoBanco['id_cliente']);
			$cliente->setNome($dadosDoBanco['nome']);
			$cliente->setEndereco($dadosDoBanco['endereco']);
			$cliente->setCelular($dadosDoBanco['celular']);
			$cliente->setTelefone($dadosDoBanco['telefone']);

 			return $cliente;
		
		}
		public function salvarClienteNoBanco($dadosDoFormulario){
			$sql = "INSERT INTO tb_cliente (id_cliente, nome, endereco, celular, telefone) VALUES (NULL, :nome, :endereco, :celular, :telefone);";
			$sqlPreparado = Conexao::meDeAConexao()->prepare($sql);
			$sqlPreparado->bindValue(":nome",$dadosDoFormulario['nomec']);
			$sqlPreparado->bindValue(":endereco",$dadosDoFormulario['enderecoc']);
			$sqlPreparado->bindValue(":celular",$dadosDoFormulario['celularc']);
			$sqlPreparado->bindValue(":telefone",$dadosDoFormulario['telefonec']);
			$resposta = $sqlPreparado->execute();
			//var_dump($sqlPreparado->errorInfo());
			
		}

		public function excluir($id){
			$sql = "DELETE  FROM tb_cliente WHERE id_cliente=:id";
			$sqlPreparado = Conexao::meDeAConexao()->prepare($sql);
			$sqlPreparado->bindValue(":id",$id);
			$resposta = $sqlPreparado->execute();
		}

	}

?>