<?php

	//include_once("model/Venda.class.php");
	include_once("includes/Conexao.class.php");	

	class DaoVenda {

		public function listarVendas () {
			$sql = "SELECT tv.id_venda, tp.nome as produto, tv.quantidade, tv.desconto, tv.valor_total, tv.valor_final, tc.nome as cliente FROM tb_venda tv INNER JOIN tb_cliente tc ON (tv.cliente = tc.id_cliente) INNER JOIN tb_produto tp ON (tv.produto = tp.id_produto)";
			$sqlPreparado = Conexao::meDeAConexao()->prepare($sql);
			$resposta = $sqlPreparado->execute();
			$lista = $sqlPreparado->fetchAll(PDO::FETCH_ASSOC);
			

			$vetorDeObjetos = array();
			foreach ($lista as $linha) {
					$vetorDeObjetos [] = $this ->transformaDadosDoBancoEmObjeto ($linha);
 			} 
			
			return $vetorDeObjetos;

		}

		/*
			SELECT tc.nome, tv.valor_final, tp.nome FROM `tb_venda` tv 
			INNER JOIN tb_itens_vendas ti ON (ti.id_venda = tv.id_venda) 
			INNER JOIN tb_cliente tc ON (tv.cliente = tc.id_cliente)
			INNER JOIN tb_produto tp ON (ti.id_produto = tp.id_produto) 
		*/
		
		public function transformaDadosDoBancoEmObjeto($dadosDoBanco)
		{
			$venda = new Venda();
			$venda->setIdVenda($dadosDoBanco['id_venda']);
			$venda->setCliente($dadosDoBanco['cliente']);
			$venda->setValorFinal($dadosDoBanco['valor_final']);
			$venda->setValorTotal($dadosDoBanco['valor_total']);
			$venda->setDesconto($dadosDoBanco['desconto']);
			$venda->setQuantVendida($dadosDoBanco['quantidade']);
			$venda->setProduto($dadosDoBanco['produto']);
			
			//$venda = new Venda();
 			
 			return $venda;
		
		}
		public function salvarVendaNoBanco($dadosDoFormulario){
			$sql = "INSERT INTO 
						tb_venda 
						(id_venda, cliente, valor_final, valor_total, desconto, quantidade, produto) 
					VALUES 
						(NULL, :cliente, :valorf, :valort, :desconto, :quantidade, :produto)";
			$sqlPreparado = Conexao::meDeAConexao()->prepare($sql);
			$sqlPreparado->errorInfo();
			$sqlPreparado->bindValue(":cliente",$dadosDoFormulario['cliente']);
			$sqlPreparado->bindValue(":valorf",$dadosDoFormulario['valorf']);
			$sqlPreparado->bindValue(":valort",$dadosDoFormulario['valort']);
			$sqlPreparado->bindValue(":desconto",$dadosDoFormulario['desconto']);
			$sqlPreparado->bindValue(":quantidade",$dadosDoFormulario['quantvenda']);
			$sqlPreparado->bindValue(":produto",$dadosDoFormulario['produto']);
			$resposta = $sqlPreparado->execute();
		}
		
		public function atualizaEstoque(){

		}

		public function buscarVendaPorIdNoBanco($id){
			$sql = "SELECT tv.id_venda, tp.nome as produto, tv.quantidade, tv.desconto, tv.valor_total, tv.valor_final, tc.nome as cliente FROM tb_venda tv INNER JOIN tb_cliente tc ON (tv.cliente = tc.id_cliente) INNER JOIN tb_produto tp ON (tv.produto = tp.id_produto) WHERE id_venda=:id";
			$sqlPreparado = Conexao::meDeAConexao()->prepare($sql);
			$sqlPreparado->bindValue(":id",$id);
			$resposta = $sqlPreparado->execute();
			$produto = $this->transformaDadosDoBancoEmObjeto($sqlPreparado->fetch(PDO::FETCH_ASSOC));
			return $produto;	
		}

		public function excluir($id){
			$sql = "DELETE  FROM tb_venda WHERE id_venda=:id";
			$sqlPreparado = Conexao::meDeAConexao()->prepare($sql);
			$sqlPreparado->bindValue(":id",$id);
			$resposta = $sqlPreparado->execute();
			return $sqlPreparado->rowCount();
		}

	}

?>