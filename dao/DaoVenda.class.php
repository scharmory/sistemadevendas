<?php

	//include_once("model/Venda.class.php");
	include_once("includes/Conexao.class.php");	

	class DaoVenda {

		public function listarVendas () {
			$sql = "SELECT * FROM tb_venda";
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

 			return $venda;
		
		}
		public function salvarVendaNoBanco($dadosDoFormulario){
			$sql = "INSERT INTO 
						tb_venda 
						(id_venda, cliente, valor_final, valor_total, desconto) 
					VALUES 
						(NULL, :cliente, :valorf, :valort, :desconto)";
			$sqlPreparado = Conexao::meDeAConexao()->prepare($sql);
			$sqlPreparado->bindValue(":cliente",$dadosDoFormulario['cliente']);
			$sqlPreparado->bindValue(":valorf",$dadosDoFormulario['valorf']);
			$sqlPreparado->bindValue(":valort",$dadosDoFormulario['valort']);
			$sqlPreparado->bindValue(":desconto",$dadosDoFormulario['desconto']);
			$resposta = $sqlPreparado->execute();


			$idVenda = Conexao::meDeAConexao()->lastInsertId($sql);

			//salvar os itens dela
			$sql = "INSERT INTO 
						tb_itens_vendas 
						(id_item_venda, id_venda, id_produto, quantidade) 
					VALUES 
						(NULL, :venda, :produto, :quantidade)";
			$sqlPreparado = Conexao::meDeAConexao()->prepare($sql);

			$sqlPreparado->bindValue(":venda",$idVenda);
			$sqlPreparado->bindValue(":produto",$dadosDoFormulario['produto']);
			$sqlPreparado->bindValue(":quantidade",$dadosDoFormulario['quantvenda']);
			$resposta = $sqlPreparado->execute();
			var_dump($sqlPreparado->errorInfo());
		}
		
		public function excluir($id){
			$sql = "DELETE  FROM tb_venda WHERE id_venda=:id";
			$sqlPreparado = Conexao::meDeAConexao()->prepare($sql);
			$sqlPreparado->bindValue(":id",$id);
			$resposta = $sqlPreparado->execute();
		}

	}

?>