<?php

	include_once("model/Produto.class.php");
	include_once("includes/Conexao.class.php");	

	class DaoProduto {

		public function listarProdutos () {
			$sql = "SELECT * FROM tb_produto";
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
			$produto = new Produto();
			$produto->setIdProduto($dadosDoBanco['id_produto']);
			$produto->setNome($dadosDoBanco['nome']);
			$produto->setPrecoc($dadosDoBanco['precoc']);
			$produto->setPrecov($dadosDoBanco['precov']);
			$produto->setEstoque($dadosDoBanco['estoque']);

 			return $produto;
		
		}
		public function salvarProdutoNoBanco($dadosDoFormulario){
			$sql = "INSERT INTO tb_produto (id_produto, nome, precoc, precov, estoque) VALUES (NULL, :nome, :precoc, :precov, :estoque);";
			$sqlPreparado = Conexao::meDeAConexao()->prepare($sql);
			$sqlPreparado->bindValue(":nome",$dadosDoFormulario['cnomepro']);
			$sqlPreparado->bindValue(":precoc",$dadosDoFormulario['cprecoc']);
			$sqlPreparado->bindValue(":precov",$dadosDoFormulario['cprecov']);
			$sqlPreparado->bindValue(":estoque",$dadosDoFormulario['cestoque']);
			$resposta = $sqlPreparado->execute();
			//var_dump($sqlPreparado->errorInfo());
			
		}
		public function buscarProdutoPorIdNoBanco($id){
			$sql = "SELECT * FROM tb_produto WHERE id_produto=:id";
			$sqlPreparado = Conexao::meDeAConexao()->prepare($sql);
			$sqlPreparado->bindValue(":id",$id);
			$resposta = $sqlPreparado->execute();
			$produto = $this->transformaDadosDoBancoEmObjeto($sqlPreparado->fetch(PDO::FETCH_ASSOC));
			return $produto;
			
		}
		public function atualizar($post){
			$sql = "UPDATE 
					tb_produto 
					SET 
					nome=:nome,
					precoc=:precoc,
					precov=:precov,
					estoque=:estoque
					WHERE id_produto=:id";
			$sqlPreparado = Conexao::meDeAConexao()->prepare($sql);
			$sqlPreparado->bindValue(":id",$post['codigo']);
			$sqlPreparado->bindValue(":nome",$post['nome']);
			$sqlPreparado->bindValue(":precoc",$post['precoc']);
			$sqlPreparado->bindValue(":precov",$post['precov']);
			$sqlPreparado->bindValue(":estoque",$post['estoque']);
			$resposta = $sqlPreparado->execute();
			
			
		}

		public function excluir($id){
			$sql = "DELETE  FROM tb_produto WHERE id_produto=:id";
			$sqlPreparado = Conexao::meDeAConexao()->prepare($sql);
			$sqlPreparado->bindValue(":id",$id);
			$resposta = $sqlPreparado->execute();
		}

	}

?>